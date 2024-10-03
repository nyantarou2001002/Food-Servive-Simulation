<?php

namespace Restaurants;

use Invoices\Invoice;
use Persons\Employees\Chef;
use Persons\Employees\Cashier;

class Restaurant{
    private array $menu;
    private array $employees; 

    public function __construct(array $menu, array $employees) {
        $this->menu = $menu;
        $this->employees = $employees;
    }

    public function getMenu(): array{
        return $this->menu;
    }

    public function getEmployees() : array {
        return $this->employees;
    }

    public function chooseChef() : Chef {
        for($i = 0; $i < count($this->employees); $i++){
            $employee = $this->employees[$i];
            if($employee::class == "Persons\Employees\Chef"){
                return $employee;
            }
        }
    }

    public function chooseCashier() :Cashier {
        for($i = 0; $i < count($this->employees); $i++){
            $employee = $this->employees[$i];
            if($employee::class == "Persons\Employees\Cashier"){
                return $employee;
            }
        }
    }

    public function order(array $categories): Invoice{
        $cashier = $this->chooseCashier();
        $foodOrder = $cashier->generateOrder($categories, $this);

        $chef = $this->chooseChef();
        $textPrepareFood = $chef->prepareFood($foodOrder);
        print($textPrepareFood);

        $invoice = $cashier->generateInvoice($foodOrder);

        return $invoice;
    }

}