<?php

class Product
{
    private $id;
    private $title;
    private $description;
    private $price;
    private $image_id;

    function __construct($id, $title, $description, $price, $image_id)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
        $this->image_id = $image_id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;
        return $this;
    }

    public function getImageId(): ?int
    {
        return $this->image_id;
    }

    public function setImageId(?int $image_id): self
    {
        $this->image_id = $image_id;
        return $this;
    }
}

class SingleProduct extends Product {
    public function getDiscountPrice($discount): ?float
    {
        return round($this->price * $discount / 100, 2);
    }
}

class Auction extends Product {
    
}