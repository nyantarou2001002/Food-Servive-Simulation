<?php

namespace FoodItems;

class Spaghetti extends FoodItem{
    public function __construct() {
        parent::__construct("Spaghetti","Classic Italian pasta with long, slender strands. Cooks to perfection, ideal with various sauces for an authentic taste of Italy.",8,10);
    }

    public static function getCategory(): string
    {
        return Spaghetti::class;
    }
}