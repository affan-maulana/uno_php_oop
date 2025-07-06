<?php
require "Card.php";

class Deck {
    public $cards = [];
    private $currentCard;

    public function __construct() {
        $colours = Card::COLOR;
        $suits = Card::SUIT;
        for ($i=0; $i < 2; $i++) { 
            foreach ($colours as $color) {
                foreach ($suits as $suit) {
                    $this->cards[] = new Card($color, $suit);
                }
            }
        }
    }

    public function getOneRandomCard() {
        echo "Deck Card Left: ".count($this->cards).PHP_EOL;
        $randIndex = array_rand($this->cards);
        $getRandCard = $this->cards[$randIndex];
        unset($this->cards[$randIndex]);
        return $getRandCard;
    }

    public function getTotalDeck() {
        return count($this->cards);
    }

    public function getDeckCard() {
        return $this->currentCard;
    }

    public function setDeckCard($card) {
        $this->currentCard = $card;
    }

}