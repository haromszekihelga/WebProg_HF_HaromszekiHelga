<?php


class CartItem
{
    private Product $product;
    private int $quantity;

    // TODO Generate constructor with all properties of the class
    public function __construct(Product $product, int $quantity)
    {
        $this->product = $product;
        $this->quantity = $quantity;
    }

    // TODO Generate getters and setters of properties
    public function getProduct(): Product
    {
        return $this->product;
    }

    public function setProduct(Product $product): void
    {
        $this->product = $product;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function increaseQuantity()
    {
        $availableQuantity = $this->product->getAvailableQuantity();
        if ($this->quantity < $availableQuantity) {
            $this->quantity++;
        }
    }

    public function decreaseQuantity()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }

    public function getTotalPrice(): float
    {
        return $this->product->getPrice() * $this->quantity;
    }
}