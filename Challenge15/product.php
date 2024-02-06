<?php

interface Product {
    public function getPrice();
    public function isSoldByKg();
    public function getName();
}

class Orange implements Product {
    private $name;
    private $price;
    private $sellingByKg;
    
    public function __construct() {
        $this->name = 'Orange';
        $this->price = 550;
        $this->sellingByKg = true;
    }
    
    public function getPrice() {
        return $this->price;
    }
    
    public function isSoldByKg() {
        return $this->sellingByKg;
    }
    
    public function getName() {
        return $this->name;
    }
}

class Potato implements Product {
    private $name;
    private $price;
    private $sellingByKg;
    
    public function __construct() {
        $this->name = 'Potato';
        $this->price = 360;
        $this->sellingByKg = false;
    }
    
    public function getPrice() {
        return $this->price;
    }
    
    public function isSoldByKg() {
        return $this->sellingByKg;
    }
    
    public function getName() {
        return $this->name;
    }
}

class Nuts implements Product {
    private $name;
    private $price;
    private $sellingByKg;
    
    public function __construct() {
        $this->name = 'Nuts';
        $this->price = 1050;
        $this->sellingByKg = true;
    }
    
    public function getPrice() {
        return $this->price;
    }
    
    public function isSoldByKg() {
        return $this->sellingByKg;
    }
    
    public function getName() {
        return $this->name;
    }
}

class Kiwi implements Product {
    private $name;
    private $price;
    private $sellingByKg;
    
    public function __construct() {
        $this->name = 'Kiwi';
        $this->price = 500;
        $this->sellingByKg = false;
    }
    
    public function getPrice() {
        return $this->price;
    }
    
    public function isSoldByKg() {
        return $this->sellingByKg;
    }
    
    public function getName() {
        return $this->name;
    }
}

class Pepper implements Product {
    private $name;
    private $price;
    private $sellingByKg;
    
    public function __construct() {
        $this->name = 'Pepper';
        $this->price = 280;
        $this->sellingByKg = false;
    }
    
    public function getPrice() {
        return $this->price;
    }
    
    public function isSoldByKg() {
        return $this->sellingByKg;
    }
    
    public function getName() {
        return $this->name;
    }
}

class Raspberry implements Product {
    private $name;
    private $price;
    private $sellingByKg;
    
    public function __construct() {
        $this->name = 'Raspberry';
        $this->price = 320;
        $this->sellingByKg = false;
    }
    
    public function getPrice() {
        return $this->price;
    }
    
    public function isSoldByKg() {
        return $this->sellingByKg;
    }
    
    public function getName() {
        return $this->name;
    }
}
?>