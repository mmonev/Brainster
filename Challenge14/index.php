<?php

interface Printable {
    public function print();
    public function sneakpeek();
    public function fullinfo();
}

class Furniture implements Printable {
    protected $width;
    private $length;
    private $height;
    private $is_for_seating;
    private $is_for_sleeping;

    public function __construct($width, $length, $height) {
        $this->width = $width;
        $this->length = $length;
        $this->height = $height;
    }

    public function setIsForSeating($isForSeating) {
        $this->is_for_seating = $isForSeating;
    }

    public function setIsForSleeping($isForSleeping) {
        $this->is_for_sleeping = $isForSleeping;
    }

    public function getIsForSeating() {
        return $this->is_for_seating;
    }

    public function getIsForSleeping() {
        return $this->is_for_sleeping;
    }

    public function area() {
        return $this->width * $this->length;
    }

    public function volume() {
        return $this->area() * $this->height;
    }

    public function print() {
        echo get_class($this) . ", " . ($this->is_for_sleeping ? "sleeping" : "sitting-only") . ", " . $this->area() . "cm2" . "<br>";
    }

    public function sneakpeek() {
        echo get_class($this);
    }

    public function fullinfo() {
        echo get_class($this) . ", " . ($this->is_for_sleeping ? "sleeping" : "sitting-only") . ", " . $this->area() . "cm2, width: " . $this->width . "cm, length: " . $this->length . "cm, height: " . $this->height . "cm" . "<br>";
    }
}

class Sofa extends Furniture {
    private $seats;
    private $armrests;
    private $length_opened;

    public function __construct($width, $length, $height) {
        parent::__construct($width, $length, $height);
    }

    public function setSeats($seats) {
        $this->seats = $seats;
    }

    public function setArmrests($armrests) {
        $this->armrests = $armrests;
    }

    public function setLengthOpened($lengthOpened) {
        $this->length_opened = $lengthOpened;
    }

    public function area_opened() {
        if ($this->getIsForSleeping()) {
            return $this->width * $this->length_opened;
        } else {
            return "This sofa is for sitting only, it has " . $this->armrests . " armrests and " . $this->seats . " seats." . "<br>";
        }
    }
}

class Bench extends Sofa {
    public function __construct($width, $length, $height) {
        parent::__construct($width, $length, $height);
    }
}

class Chair extends Furniture {
    public function __construct($width, $length, $height) {
        parent::__construct($width, $length, $height);
    }
}

$furniture = new Furniture(220, 110, 65);
$furniture->setIsForSeating(true);
$furniture->setIsForSleeping(false);
echo "Furniture Area: " . $furniture->area() . "cm2" . "<br>";
echo "Furniture Volume: " . $furniture->volume() . "cm3" . "<br>";

$sofa = new Sofa(260, 160, 75);
$sofa->setIsForSeating(true);
$sofa->setIsForSleeping(false);
$sofa->setSeats(3);
$sofa->setArmrests(2);

echo "Sofa Area: " . $sofa->area() . "cm2" . "<br>";
echo "Sofa Volume: " . $sofa->volume() . "cm3" . "<br>";
echo $sofa->area_opened();

$sofa->setIsForSleeping(true);
$sofa->setLengthOpened(200);

echo $sofa->area_opened();

$bench = new Bench(190, 90, 60);
$bench->setIsForSeating(true);
$bench->setIsForSleeping(true);
$bench->setSeats(2);
$bench->setArmrests(0);

$chair = new Chair(65, 65, 100);
$chair->setIsForSeating(true);
$chair->setIsForSleeping(false);

$furniture->print();
$sofa->print();
$bench->print();
$chair->print();

$furniture->sneakpeek();
$sofa->sneakpeek();
$bench->sneakpeek();
$chair->sneakpeek();

$furniture->fullinfo();
$sofa->fullinfo();
$bench->fullinfo();
$chair->fullinfo();