<?php

namespace FoodItems;

class Fettuccine extends FoodItem{
    public function __construct() {
        parent::__construct("Fettuccine","Silky, wide ribbons of Italian pasta, perfect for creamy sauces. Made from premium durum wheat semolina, it's a delightful canvas for rich flavors. Enjoy the taste of Italy!",5,5);
    }

    public static function getCategory(): string
    {
        return Fettuccine::class;
    }
}