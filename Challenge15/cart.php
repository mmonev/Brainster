<?php

class Cart {
    private $cartItems;
    
    public function __construct() {
        $this->cartItems = [];
    }
    
    public function addToCart($item) {
        $this->cartItems[] = $item;
    }
    
    public function isEmpty() {
        return empty($this->cartItems);
    }
    
    public function printReceipt() {
        foreach ($this->cartItems as $item) {
            $amount = $item['amount'];
            $product = $item['item'];
            $totalPrice = $amount * $product->getPrice();
            
            echo $product->getName() . " | ";
            
            if ($product->isSoldByKg()) {
                echo $amount . " kgs | ";
            } else {
                echo $amount . " gunny sacks | ";
            }
            
            echo "total= " . $totalPrice . " denars<br>";
        }
        
        $finalPrice = $this->calculateFinalPrice();
        echo "Final price amount: " . $finalPrice . " denars";
    }
    
    private function calculateFinalPrice() {
        $finalPrice = 0;
        
        foreach ($this->cartItems as $item) {
            $amount = $item['amount'];
            $product = $item['item'];
            $totalPrice = $amount * $product->getPrice();
            $finalPrice += $totalPrice;
        }
        
        return $finalPrice;
    }
}

?>