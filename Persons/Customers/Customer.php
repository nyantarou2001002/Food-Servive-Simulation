<?php

namespace Persons\Customers;

use Persons\Person;
use Restaurants\Restaurant;
use Invoices\Invoice;

class Customer extends Person{
    private array $interestedTastesMap;
    public function __construct(string $name, int $age, string $address,array $interestedTastesMap){
        parent::__construct($name, $age, $address);
        $this->interestedTastesMap = $interestedTastesMap;

        $this->printCustomerWantToEat();
    }

    public function printCustomerWantToEat(): void{
        $output = $this->getName() . " wanted to eat ";
        $keys = array_keys($this->interestedTastesMap);
        $imploded_keys = implode(", ", $keys);

        $output .= $imploded_keys . ".";
        
        print($output . "\n");
    }

    // [string foodName]を返す
    // ["cheeseBurger", "cheeseBurger"];
    public function InterestedCategories(Restaurant $restaurant) : array {
        $orderList = [];
        $menu = $restaurant->getMenu();

        foreach($this->interestedTastesMap as $category=> $number){
            $className = "\\FoodItems\\". $category;
            if(class_exists($className)){
                for($i = 0; $i < $number; $i++){
                    $orderList[] = $category;
                }
            }
        }

        return $orderList;
    }
    
    public function order(Restaurant $restaurant, array $categories): Invoice{
            $text = $this->getName() . " was looking at the menu, and ordered " ;
            $categoriesCountValues = array_count_values($categories);

            foreach($categoriesCountValues as $category => $number){
                $text .= $category . " x " . $number;
                if($number === end($categoriesCountValues)){
                    $text .= ".";
                }else{
                    $text .= ", ";
                }
            }

            print($text . "\n");

            $invoice = $restaurant->order($categories);
            return $invoice;
    }

}