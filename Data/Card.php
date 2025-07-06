<?php

class Card {
    
    const COLOR = ['red', 'yellow', 'green', 'blue'];
    const SUIT = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

    private $color;
    private $number;

    public function __construct($color, $number) {
        $this->color = $color;
        $this->number = $number;
    }

    public function __toString() {
        return $this->number . " " . $this->color;
    }

    public function getColor() {
        return $this->color;
    }

    public function getNumber() {
        return $this->number;
    }

}
?>