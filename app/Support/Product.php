<?php

namespace App\Support;

class Product
{
    public $name;

    public $price;

    public $quantity;

    public function __construct(String $name, float $price, int $quantity)
    {
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }

    public function total(): float
    {
        return $this->price * $this->quantity;
    }
}
