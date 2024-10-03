<?php

namespace FoodItems;

class HawaiianPizza extends FoodItem{
    public function __construct() {
        parent::__construct("Hawaiian Pizza","A perfect fusion of ham, pineapple, and cheese on a crispy crust, delivering a savory-sweet flavor explosion.",15,20);
    }

    public static function getCategory(): string
    {
        return HawaiianPizza::class;
    }
}