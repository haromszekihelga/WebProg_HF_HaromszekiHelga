<?php


class Cart
{
    /**
     * @var CartItem[]
     */
    private array $items = [];

    // TODO Generate getters and setters of properties

    public function getItems(): array
    {
        return $this->items;
    }

    public function setItems(array $items): void
    {
        $this->items = $items;
    }

    /**
     * Add Product $product into cart. If product already exists inside cart
     * it must update quantity.
     * This must create CartItem and return CartItem from method
     * Bonus: $quantity must not become more than whatever
     * is $availableQuantity of the Product
     *
     * @param Product $product
     * @param int $quantity
     * @return CartItem
     */
    public function addProduct(Product $product, int $quantity): CartItem
    {
        //TODO Implement method
        foreach ($this->items as $cartItem) {
            if ($cartItem->getProduct() === $product) {
                $currentQuantity = $cartItem->getQuantity();
                $availableQuantity = $product->getAvailableQuantity();
                // Update quantity, but make sure it doesn't exceed available quantity
                $newQuantity = min($currentQuantity + $quantity, $availableQuantity);
                $cartItem->setQuantity($newQuantity);
                return $cartItem;
            }
        }

        $newCartItem = new CartItem($product, $quantity);
        $this->items[] = $newCartItem;
        return $newCartItem;
    }

    /**
     * Remove product from cart
     *
     * @param Product $product
     */
    public function removeProduct(Product $product)
    {
        //TODO Implement method
        foreach ($this->items as $key => $cartItem) {
            if ($cartItem->getProduct() === $product) {
                unset($this->items[$key]);
                break; // Stop after the first matching product is removed
            }
        }
    }

    /**
     * This returns total number of products added in cart
     *
     * @return int
     */
    public function getTotalQuantity(): int
    {
        //TODO Implement method
        $totalQuantity = 0;
        foreach ($this->items as $cartItem) {
         $totalQuantity += $cartItem->getQuantity();
        }
        return $totalQuantity;
    }

    /**
     * This returns total price of products added in cart
     *
     * @return float
     */
    public function getTotalSum(): float
    {
        //TODO Implement method
        $totalSum = 0.0;
        foreach ($this->items as $cartItem) {
            $totalSum += $cartItem->getTotalPrice();
        }
        return $totalSum;
    }
}