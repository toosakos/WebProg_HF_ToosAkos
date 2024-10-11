<?php


class Cart
{
    /**
     * @var CartItem[]
     */
    private array $items = [];

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
        $itemNew = new CartItem($product, $quantity);

        $this->items = [$itemNew];
        foreach ($this->items as $item) {
            if ($item->getProduct() === $itemNew->getProduct()) {
                $item->increaseQuantity();
                return $item;
            } else {
                $this->items = [$itemNew];
            }
        }
        return $itemNew;
    }

    /**
     * Remove product from cart
     *
     * @param Product $product
     */
    public function removeProduct(Product $product)
    {
        foreach ($this->items as $item) {
            if ($item->getProduct() == $product) {
                unset($this->items,$item);
            } else {
                echo "product not in cart";
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
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->getQuantity();
        }
        return $total;
    }

    /**
     * This returns total price of products added in cart
     *
     * @return float
     */
    public function getTotalSum(): float
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->getProduct()->getPrice();
        }
        return $total;
    }
}