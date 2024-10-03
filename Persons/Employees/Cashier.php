<?php

namespace Persons\Employees;

use FoodOrders\FoodOrder;
use Persons\Employees\Employee;
use Restaurants\Restaurant;
use Invoices\Invoice;

class Cashier extends Employee{
    public function __construct(string $name, int $age, string $address, int $employeeId, float $salary) {
        parent::__construct($name, $age, $address, $employeeId, $salary);
    }

    // categories [string foodName]の連想配列 string[]
    // ["cheeseBurger", "cheeseBurger"];

    // orderList = [FoodItem foodItem] FoodItem[] 数をどうやって計算するか,array_count_values()
    // new FoodItemをする必要がある
    public function generateOrder(array $categories, Restaurant $restaurant):FoodOrder{
        $outputText = $this->getName() . " received the order.";
        print($outputText . "\n");

        $items = [];
        $menu = $restaurant->getMenu();

        for($i = 0; $i < count($categories); $i++){
            $className = "\\FoodItems\\" . $categories[$i];
            array_push($items,  new $className());
        }

        return new FoodOrder($items);
    }

    // 受け取ったfoodOrderのinvoiceを作成する
    public function generateInvoice(FoodOrder $foodOrder) : Invoice {
        $finalPrice = $this->returnFinalPrice($foodOrder->getItems());
        $orderTime = $foodOrder->getOrderTime();
        $estimatedTimeInMinutes = $this->returnEstimatedCookTime($foodOrder);

        print($this->getName() . " made the invoice." . "\n");
        return new Invoice($finalPrice, $orderTime, $estimatedTimeInMinutes);
    }

    public function returnFinalPrice(array $items) : float {
        $finalPrice = 0;

        for($i = 0; $i < count($items); $i++){
            $item = $items[$i];
            $finalPrice += $item->getPrice();
        }

        return $finalPrice;
    }

    public function returnEstimatedCookTime(FoodOrder $foodOrder) : int {
        $estimatedTimeInMinutes = 0;
        $items = $foodOrder->getItems();

        for($i = 0; $i < count($items); $i++){
            $foodItem = $items[$i];
            $estimatedTimeInMinutes += $foodItem->getCookTime();
        }

        return $estimatedTimeInMinutes;
    }

}