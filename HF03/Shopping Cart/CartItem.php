<?php



class CartItem
{
    private Product $product;
    private int $quantity;

    /**
     * @param Product $product
     * @param int $quantity
     */
    public function __construct(Product $product, int $quantity)
    {
        $this->product = $product;
        $this->quantity = $quantity;
    }

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
        if ($this->quantity + 1 <= $this->product->getAvailableQuantity()) {
            $this->quantity += 1;
        } else {
            echo "product is out of stock";
        }
    }

    public function decreaseQuantity()
    {
        //TODO $quantity must be increased by one.
        // Bonus: Quantity must not become less than 1
        if ($this->quantity - 1 != 1) {
            $this->quantity -= 1;

        } else {
            echo "cannot decrease quantity";
        }
    }
}