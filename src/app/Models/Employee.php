<?php

namespace App\Models;

use Exception;

/**
 * Model for storing employees' data.
 *
 * Example:
 * ```
 * $employee = Employee::fromAttributes($id, $firstName, $lastName, $gender, $age, $address, $phone)
 * $employee = Employee::fromString($csvLineString);
 * ```
 *
 * @author  thanhlongb
 */
class Employee
{
    /**
     * @var string $id Employee's id.
     */
    public $id;

    /**
     * @var string|null $fistName Employee's first name.
     */
    public $firstName;

    /**
     * @var string|null $lastName Employee's lastName.
     */
    public $lastName;

    /**
     * @var string|null $gender Employee's gender.
     */
    public $gender;

    /**
     * @var int|null $age Employee's age.
     */
    public $age;

    /**
     * @var string|null $address Employee's address.
     */
    public $address;

    /**
     * @var string|null $phone Employee's phone number.
     */
    public $phone;

    /**
     * Create an Employee instance.
     */
    public function __construct() { }

    /**
     * Return an Employee instance from a csv string.
     *
     * @param  string  $rawString CSV string contains employee information.
     * @return Employee An Employee instance.
     */
    public static function fromString($rawString) {
        $data = explode(",", $rawString);
        if (count($data) != 7) {
            throw new Exception("Invalid data format.");
        }
        try {
            return Employee::fromAttributes($data[0], $data[1], $data[2],
                                            $data[3], $data[4], $data[5], $data[6]);
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Return an Employee instance from an employee's information.
     *
     * @param  string       $id         Employee's id.
     * @param  string|null  $firstName  Employee's first name.
     * @param  string|null  $lastName   Employee's last name.
     * @param  string|null  $gender     Employee's gender.
     * @param  int|null     $age        Employee's age.
     * @param  string|null  $address    Employee's address.
     * @param  string|null  $phone      Employee's phone.
     * @return Employee An Employee instance.
     */
    public static function fromAttributes($id, $firstName, $lastName, $gender, $age, $address, $phone) {
        $instance = new self();
        $instance->id        = $id;
        $instance->firstName = $firstName;
        $instance->lastName  = $lastName;
        $instance->gender    = $gender;
        $instance->age       = $age;
        $instance->address   = $address;
        $instance->phone     = $phone;
        return $instance;
    }

    /**
     * Return a string of employee's information.
     *
     * @return string
     */
    public function __toString() {
        return $this->id.','.
               $this->firstName.','.
               $this->lastName.','.
               $this->gender.','.
               $this->age.','.
               $this->address.','.
               $this->phone;
    }

    /**
     * Return an array of employee's information.
     *
     * @return array
     */
    public function __toArray() {
        return ['id'        => $this->id,
                'firstName' => $this->firstName,
                'lastName'  => $this->lastName,
                'gender'    => $this->gender,
                'age'       => $this->age,
                'address'   => $this->address,
                'phone'     => $this->phone];

    }

    /**
     * Get an employee's full name, \
     * which is "first name + last name".
     *
     * @return string
     */
    public function getFullName() {
        if (!empty($this->firstName) || !empty($this->lastName)) {
            return $this->firstName.' '.$this->lastName;
        }
        return "Unnamed Employee";
    }
}
