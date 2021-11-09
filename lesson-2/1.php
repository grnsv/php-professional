<?php

abstract class Product
{
    private static $basePrice;
    public static function setBasePrice(float $price): void
    {
        self::$basePrice = $price;
    }
    public static function getBasePrice(): ?float
    {
        return self::$basePrice;
    }
    abstract public function getPrice();
}

class ItemProduct extends Product
{
    public function getPrice(): ?float
    {
        return self::getBasePrice();
    }
}

class DigitalProduct extends Product
{
    public function getPrice(): ?float
    {
        return self::getBasePrice() / 2;
    }
}

class WeightProduct extends Product
{
    public $weight;
    function __construct(float $weight)
    {
        $this->weight = $weight;
    }

    public function getPrice(): ?float
    {
        return self::getBasePrice() * $this->weight;
    }
}

Product::setBasePrice(rand(0, 100));
echo ('ItemProduct: ' . (new ItemProduct())->getPrice() . PHP_EOL);
echo ('DigitalProduct: ' . (new DigitalProduct())->getPrice() . PHP_EOL);
echo ('WeightProduct: ' . (new WeightProduct(5))->getPrice() . PHP_EOL);
