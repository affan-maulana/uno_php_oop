<?php
require_once "Deck.php";

class Player {
    private $name;
    private $cards;

    public function __construct($name) {
        $this->name = $name;
        $this->cards = array();
    }

    public function __toString() {
        return $this->name . " Card left: " . count($this->cards);
    }

    // Setter
    public function setCard($card) {
        $this->cards = $card;
    }

    // Getter
    public function getCards() {
        return $this->cards;
    }

    public function getShowCards() {
        echo $this->name.": => ";
        foreach ($this->cards as $myCard) {
            echo $myCard.'|';
        }
        echo PHP_EOL;
    }

    public function getCardLeft() {
        return count($this->cards);
    }

    public function turn(Deck $deck) {
        $isExist = false;
        $currentCard = $deck->getDeckCard();
        foreach ($this->cards as $key => $myCard) {
            if ($currentCard->getNumber() == $myCard->getNumber() || $currentCard->getColor() == $myCard->getColor()) {
                unset($this->cards[$key]);  
                $deck->setDeckCard($myCard);
                $isExist = true;
                echo $myCard.PHP_EOL;
                break;
            }
        }

        if (!$isExist) {
            echo "SKIP ===>>>".PHP_EOL;
            $this->cards[] = $deck->getOneRandomCard();
        }   
        return;
    }

}