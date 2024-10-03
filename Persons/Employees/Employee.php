<?php

namespace Persons\Employees;

use Persons\Person;

class Employee extends Person{
    private int $employeeId;
    private float $salary;

    public function __construct(string $make, int $age, string $address, int $employeeId, float $salary){
        parent::__construct($make, $age, $address);
        $this->employeeId = $employeeId;
        $this->salary = $salary;
    }

}