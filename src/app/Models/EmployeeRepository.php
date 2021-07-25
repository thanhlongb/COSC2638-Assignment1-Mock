<?php

namespace App\Models;

use Google\Cloud\BigQuery\BigQueryClient;
use Google\Cloud\Storage\StorageClient;
use Google\Cloud\Core\ExponentialBackoff;
use Exception;

/**
 * Repository for Employee instances.
 *
 * @author  thanhlongb
 */
class EmployeeRepository
{
    /**
     * @var array   Array of Employee instances.
     */
    private $employees = array();

    /**
     * @var Google\Cloud\Storage\Bucket
     */
    private $bucket = null;

    /**
     * @var Google\Cloud\BigQuery\BigQueryClient
     */
    private $bigQuery = null;

    /**
     * Create new EmployeeRepository instance. \
     * The instance will connect to Google Cloud Storage service. \
     * Then, try to read `employees.csv` file
     * and populate @var employees array.
     *
     * @return void
     */
    public function __construct()
    {
        $this->connectStorage();
        $this->load();
    }

    /**
     * Try establish a connection to Google Cloud Storage service.
     *
     * @return void
     */
    private function connectStorage() {
        if ($this->bucket) return;  // avoid connect multiple times
        $storage = new StorageClient([
            'projectId' => env("CLOUD_PROJECT_ID", "rmit-gc"),
            'keyFilePath' => env("CLOUD_KEY_FILE", "../key.json")
        ]);
        $storage->registerStreamWrapper();
        $this->bucket = $storage->bucket(env("CLOUD_BUCKET_ID", "rmit-gc-week2b"));
    }

    /**
     * Try establish a connection to Google Big Query service.
     *
     * @return void
     */
    private function connectBigQuery() {
        if ($this->bigQuery) return;    // avoid connect multiple times
        $this->bigQuery = new BigQueryClient([
            'projectId' => env("CLOUD_PROJECT_ID", "rmit-gc"),
            'keyFilePath' => env("CLOUD_KEY_FILE", "../key.json")
        ]);
    }

    /**
     * Read `employees.csv` file and populate @var employees array. \
     * This method will try to download the file to local folder and
     * then read each line from the downloaded file to employee's infomation.
     *
     * @return void
     */
    private function load() {
        $object = $this->bucket->object(env("CLOUD_DATA_FILE", "employees.csv"));
        if ($object->exists()) {
            $object->downloadToFile(env("LOCAL_DATA_FILE", "../employees.csv"));
            $contents = file_get_contents(env("LOCAL_DATA_FILE", "../employees.csv"));
            $employeeRows = explode(PHP_EOL, $contents);
            foreach ($employeeRows as $row) {
                try {
                    if (!empty(trim($row))) {
                        $employee = Employee::fromString($row);
                        array_push($this->employees, $employee);
                    }
                } catch (Exception $e) {
                    continue;
                }
            }
        }
    }

    /**
     * Save employees information. \
     * This method attempt to convert @var employees to
     * an array of string and save then to a local
     * `employees.csv` file before uploading it to
     * Google Cloud Storage.
     *
     * @return void
     */
    private function save() {
        try {
            $csvData = implode(PHP_EOL, array_map(
                function ($x) { return $x->__toString(); },
                $this->employees));
            file_put_contents(env("LOCAL_DATA_FILE", "../employees.csv"), $csvData);
            $file = fopen(env("LOCAL_DATA_FILE", "../employees.csv"), 'r');
            $this->bucket->upload($file, [
                'name' => env("CLOUD_DATA_FILE", "employees.csv")
            ]);
            return true;
        } catch (Exception $e) {
            // so what? lol.
        }
        return false;
    }

    /**
     * Check if an employee with the same `id` exists.
     *
     * @param   int     $employeeId The employee id to be checked.
     * @return  bool    `true` if employee id exists. Otherwise, `false`.
     */
    private function isExistEmployee($employeeId) {
        foreach ($this->employees as $employee) {
            if ($employee->id == $employeeId) {
                return true;
            }
        }
        return false;
    }

    /**
     * Add a new employee information.
     *
     * @param   Employee    $employee   An employee instance storing employee information.
     * @param   bool        $autoSave   Save this information to data file.
     * @return  bool        `true` if operation success. Otherwise, `false`.
     * @throws  Exception   Employee is duplicated.
     */
    public function create($employee, $autoSave = true) {
        if (!trim($employee->id)) throw new Exception("Employee ID can't be empty.");
        if ($this->isExistEmployee($employee->id)) {
            throw new Exception("Duplicated employee ID.");
        }
        array_push($this->employees, $employee);
        if ($autoSave) {
            return $this->save();
        }
        return true;
    }

    /**
     * Read an employee information from id.
     *
     * @param   int     $id An employee's id.
     * @return  Employee|null
     */
    public function read($employeeID) {
        foreach ($this->employees as $employee) {
            if ($employee->id == $employeeID) {
                return $employee;
            }
        }
        return null;
    }

    /**
     * Update an employee information.
     *
     * @param   Employee    $updatedEmployee   An employee instance.
     * @param   bool        $autoSave   Save this information to data file.
     * @return  bool        `true` if operation success. Otherwise, `false`.
     */
    public function update($updatedEmployee, $autoSave = true) {
        foreach ($this->employees as $i => $employee) {
            if ($employee->id == $updatedEmployee->id) {
                $this->employees[$i] = $updatedEmployee;
                if ($autoSave) {
                    return $this->save();
                }
                return true;
            }
        }
        return false;
    }

    /**
     * Delete an employee information.
     *
     * @param   int     $id An employee's id.
     * @param   bool    $autoSave   Save this information to data file.
     * @return  bool    `true` if operation success. Otherwise, `false`.
     */
    public function delete($employeeID, $autoSave = true) {
        foreach ($this->employees as $i => $employee) {
            if ($employee->id == $employeeID) {
                unset($this->employees[$i]);
                if ($autoSave) {
                    return $this->save();
                }
                return true;
            }
        }
        return false;
    }

    /**
     * Get information of all employees that can be filtered
     * by name, gender, age.
     *
     * @param   string|null $search         Filter employees which name matchs this.
     * @param   string|null $gender         Filter employees which gender is this.
     * @param   int|null    $ageLessThan    Filter employees which age less than this.
     * @param   int|null    $ageGreaterThan Filter employees which age more than this.
     * @param   bool        $addNameFrequency Add employees first and last name frequency.
     */
    public function getAll($search = null,
                           $gender = null,
                           $ageLessThan = null,
                           $ageGreaterThan = null,
                           $addNameFrequency = false) {
        $employeeArrays = array();
        foreach ($this->employees as $employee) {
            if ($this->isMatchesName($employee, $search) &&
                $this->isMatchesGender($employee, $gender) &&
                $this->isBetweenAgeRange($employee, $ageLessThan, $ageGreaterThan))
            {
                $returnEmployee = $employee->__toArray();
                if ($addNameFrequency) {
                    $returnEmployee["firstNameFrequency"] = $this->getNameFrequency($employee->firstName);
                    $returnEmployee["lastNameFrequency"] = $this->getNameFrequency($employee->lastName);
                }
                array_push($employeeArrays, $returnEmployee);
            }
        }
        return $employeeArrays;
    }

    /**
     * Check if an employee's name matches a name.
     *
     * @param   Employee    $employee   An employee instance.
     * @param   string      $name       A name.
     * @return  bool        `true` if names match. Otherwise, `false`.
     */
    private function isMatchesName($employee, $name) {
        if ($name &&
            !str_contains($employee->getFullname(), $name))
        {
            return false;
        }
        return true;
    }

    /**
     * Check if an employee's gender is a specific gender.
     *
     * @param   Employee    $employee   An employee instance.
     * @param   string      $gender     A gender.
     * @return  bool        `true` if is correct gender. Otherwise, `false`.
     */
    private function isMatchesGender($employee, $gender) {
        if ($gender &&
        in_array($gender, ["male", "female", "other"]) &&
        $employee->gender != $gender)
        {
            return false;
        }
        return true;
    }

    /**
     * Check if an employee's age is between a range.
     *
     * @param   Employee    $employee       An employee instance.
     * @param   int         $ageLessThan    Upper age limit.
     * @param   int         $ageGreaterThan Bottom age limit.
     * @return  bool        `true` if age within the range. Otherwise, `false`.
     */
    private function isBetweenAgeRange($employee, $ageLessThan, $ageGreaterThan) {
        if ($ageLessThan &&
            $employee->age >= $ageLessThan)
            {
                return false;
        }
        if ($ageGreaterThan &&
        $employee->age <= $ageGreaterThan)
        {
            return false;
        }
        return true;
    }

    /**
     * Get a name's frequency from Big Query service.
     *
     * @param   string  The name to check for frequency.
     * @return  int     The name's frequency.
     */
    private function getNameFrequency($name) {
        $this->connectBigQuery();
        if (!$name) return 0;

        $query =   "SELECT name,
                        sum(frequency) as totalFrequency
                    FROM `rmit-gc.baby.names`
                    WHERE lower(name) = lower('{$name}')
                    GROUP BY name
                    LIMIT 1";
        $jobConfig = $this->bigQuery->query($query);
        $job = $this->bigQuery->startQuery($jobConfig);
        $backoff = new ExponentialBackoff(10);
        $backoff->execute(function () use ($job) { $job->reload(); });
        $queryResults = $job->queryResults();
        if (!$queryResults->info()["totalRows"]) {
            return 0;
        }
        return iterator_to_array($queryResults->rows())[0]['totalFrequency'];
    }
}
