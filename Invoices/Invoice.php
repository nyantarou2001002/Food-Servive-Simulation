<?php

namespace Invoices;

class Invoice{
    private float $finalPrice;
    private string $orderTime;
    private int $estimatedTimeInMinutes;

    public function __construct(float $finalPrice, string $orderTime ,int $estimatedTimeInMinutes) {
        $this->finalPrice = $finalPrice;
        $this->orderTime = $orderTime;
        $this->estimatedTimeInMinutes = $estimatedTimeInMinutes;
    }

    public function printInvoice() : void {
        print("--------------------------------------" . "\n");
        print("Date: " . $this->orderTime . "\n");
        print("Final Price: $" . (string)$this->finalPrice . "\n");
        print("--------------------------------------" . "\n");
    }

}