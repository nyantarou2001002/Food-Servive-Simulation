<?php

namespace FoodItems;

class CheeseBurger extends FoodItem{
    public function __construct() {
        parent::__construct("Cheese Burger","Classic burger with delicious cheese.",5,10);
    }

    public static function getCategory(): string
    {
        return CheeseBurger::class;
    }
}