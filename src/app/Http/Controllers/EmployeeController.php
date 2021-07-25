<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeeRepository;
use Illuminate\Http\Request;
use Exception;

/**
 * Main controller of this website.
 *
 * @author  thanhlongb
 */
class EmployeeController extends Controller
{
    /**
     * @var EmployeeRepository|null
     */
    private $employees;

    /**
     * Create a new controller instance.
     * On initialization, create an EmployeeRepository object
     * and store at $employees.
     *
     * @return void
     */
    public function __construct()
    {
        $this->employees = new EmployeeRepository();
    }

    /**
     * Return rendered home page on GET method.
     *
     * @param   Illuminate\Http\Request $request    HTTP request information.
     * @param   bool    $showFrequency  Include the first & last name frequency columns
     *                                  retrieved from baby name dataset via BigQuery.
     * @return  Illuminate\View\View
     */
    public function getHomePage(Request $request, $showFrequency = false) {
        $search = ($request->input("search")) ?: null;
        $gender = ($request->input("gender")) ?: null;
        $ageLessThan = ($request->input("ageLessThan")) ?: null;
        $ageGreaterThan = ($request->input("ageGreaterThan")) ?: null;
        $fields = ['id', 'firstName', 'lastName', 'gender', 'age', 'address', 'phone'];
        if ($showFrequency) {
            array_push($fields, "firstNameFrequency", "lastNameFrequency");
        }
        return view('home', [
            'fields' => $fields,
            'records' => $this->employees->getAll($search, $gender,
                                                  $ageLessThan, $ageGreaterThan,
                                                  $showFrequency),
            'search' => $search,
            'gender' => $gender,
            'ageLessThan' => $ageLessThan,
            'ageGreaterThan' => $ageGreaterThan,
            'showFrequency' => $showFrequency
            ]);
    }

    /**
     * Return rendered home page on GET method.
     *
     * @param   Illuminate\Http\Request $request    HTTP request information.
     * @return  Illuminate\View\View
     */
    public function getHomePageWithNameFrequency(Request $request) {
        return $this->getHomePage($request, true);
    }

    /**
     * Return rendered details page on GET method.
     *
     * @param   int $id id of the employee to be viewed.
     * @return  Illuminate\View\View
     */
    public function getUpdatePage($id) {
        $employee = $this->employees->read($id);
        if ($employee) {
            return view('update', ['employee' => $employee]);
        }
        return view('update');
    }

    /**
     * Return rendered details page on POST method.
     *
     * @param   Illuminate\Http\Request $request    HTTP request information.
     * @return  Illuminate\View\View
     */
    public function postUpdatePage(Request $request) {
        $employee = Employee::fromAttributes(
            $request->input('id'),
            $request->input('firstName'),
            $request->input('lastName'),
            $request->input('gender'),
            $request->input('age'),
            $request->input('address'),
            $request->input('phone')
        );
        try {
            if ($this->employees->update($employee)) {
                return view('update',
                    ['alert' => 'success',
                     'alertMessage' => 'Employee "'.$employee->getFullName().'" has been updated.',
                     'employee' => $employee
                    ]);
            } else {
                return view('update',
                    ['alert' => 'warning',
                     'alertMessage' => 'Something went wrong. Please try again!',
                     'employee' => $employee
                    ]);
            }
        } catch (Exception $e) {
            return view('update',
                ['alert' => 'danger',
                 'alertMessage' => $e->getMessage(),
                 'employee' => $employee
                ]);
        }
    }

    /**
     * Return rendered add employee page on GET method.
     *
     * @return  Illuminate\View\View
     */
    public function getCreatePage() {
        return view('create');
    }

    /**
     * Return rendered add employee page on POST method.
     *
     * @param   Illuminate\Http\Request $request    HTTP request information.
     * @return  Illuminate\View\View
     */
    public function postCreatePage(Request $request) {
        $employee = Employee::fromAttributes(
            $request->input('id'),
            $request->input('firstName'), $request->input('lastName'),
            $request->input('gender'), $request->input('age'),
            $request->input('address'), $request->input('phone')
        );
        try {
            if ($this->employees->create($employee)) {
                return view('create',
                    ['alert' => 'success',
                     'alertMessage' => 'Employee "'.$employee->getFullName().'" has been added to database.'
                    ]);
            } else {
                return view('create',
                    ['alert' => 'warning',
                     'alertMessage' => 'Something went wrong. Please try again!',
                     'employee' => $employee
                    ]);
            }
        } catch (Exception $e) {
            return view('create',
                ['alert' => 'danger',
                 'alertMessage' => $e->getMessage(),
                 'employee' => $employee
                ]);
        }
    }

    /**
     * Return rendered delete employee page on GET method.
     *
     * @param   int $id id of employee to be deleted.
     * @return  Illuminate\View\View
     */
    public function getDeletePage($id) {
        $employee = $this->employees->read($id);
        if (!$employee) {
            return view('delete',
                ['alert' => 'danger',
                 'alertMessage' => 'Employee not exists!'
                ]);
        }
        return view('delete', ['employee' => $employee]);
    }

    /**
     * Return rendered delete page on POST method.
     *
     * @param   int $id id of the employee to be viewed.
     * @return  Illuminate\View\View
     */
    public function postDeletePage($id) {
        $employee = $this->employees->read($id);
        if (!$employee) {
            return view('delete',
                ['alert' => 'danger',
                 'alertMessage' => 'Employee not exists!'
                ]);
        }
        $employee = $this->employees->read($id);
        if ($this->employees->delete($id)) {
            return view('delete',
                ['alert' => 'success',
                 'alertMessage' => 'Employee information successfully deleted.'
                ]);
        } else {
            return view('delete',
                ['alert' => 'warning',
                 'alertMessage' => 'Something went wrong. Please try again!',
                 'employee' => $employee
                ]);
        }
        return "lmao";
    }
}
