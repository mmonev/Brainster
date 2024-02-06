<?php

class MarketStall {
    private $products;
    
    public function __construct($initialProducts = []) {
        $this->products = $initialProducts;
    }
    
    public function addProductToMarket($name, Product $product) {
        $this->products[$name] = $product;
    }
    
    public function getItem($name, $amount) {
        if (array_key_exists($name, $this->products)) {
            $item = $this->products[$name];
            return ['amount' => $amount, 'item' => $item];
        }
        return false;
    }
    
    public function getProducts() {
        return $this->products;
    }
}

?>