<?php
require_once "Data/Player.php";
require_once "Data/Deck.php";

class Play {

    public function __construct() {
        echo "======= Start =======".PHP_EOL;    
    }

    public function start(){
        $deck = new Deck;
        shuffle($deck->cards);
        $playerOne = new Player("Affan");
        $playerTwo = new Player("Luli");

        $cards1 = [];
        $cards2 = [];
        for ($i=0; $i < 14; $i++) { 
            if ($i % 2) {
                $cards1[] = $deck->cards[$i];
            }else{
                $cards2[] = $deck->cards[$i];
            }
        }
        $playerOne->setCard($cards1);
        $playerTwo->setCard($cards2);

        $randomCard = $deck->getOneRandomCard();
        echo $randomCard.PHP_EOL;
        $deck->setDeckCard($randomCard);
        $loop = 0;
        while ($playerOne->getCardLeft() > 0 && $playerTwo->getCardLeft() > 0) {
            $playerOne->getShowCards();
            $playerOne->turn($deck);
            $playerTwo->getShowCards();
            $playerTwo->turn($deck);
            $loop++;
        }

        if ($playerOne->getCardLeft() == 0) {
            echo 'WINNER: '.$playerOne.PHP_EOL;
        }else{
            echo 'WINNER: '.$playerTwo.PHP_EOL;
        }
        echo 'Total Turn: '.$loop.PHP_EOL;
        echo "======= End =======".PHP_EOL;}
}


$play = new Play;
$play->start();