<?php

namespace FoodItems;

abstract class FoodItem{
    private string $name;
    private string $description;
    private float $price;
    private int $cookTime;

    public function __construct(string $name, string $description, float $price, $cookTime) {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->cookTime = $cookTime;
    }

    public function getName() : string {
        return $this->name;
    }

    public function getDescription() : string {
        return $this->description;
    }

    public function getPrice() : float {
        return $this->price;
    }

    public function getCookTime() : float {
        return $this->cookTime;
    }

    abstract public static function getCategory(): string;
}