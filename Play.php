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
        $playerTwo = new Player("Maulana");
        $playerThree = new Player("Luli");

        $playerOne->setCard($deck);
        $playerTwo->setCard($deck);
        $playerThree->setCard($deck);

        $randomCard = $deck->getOneRandomCard();
        echo ">>>>>>>>>> START CARD >>>>>>>>>: ". $randomCard.PHP_EOL;
        $deck->setDeckCard($randomCard);
        $loop = 0;
        while ($playerOne->getCardLeft() > 0 && $playerTwo->getCardLeft() > 0 && $playerThree->getCardLeft() > 0) {
            $playerOne->getShowCards();
            $playerOne->turn($deck);

            $playerTwo->getShowCards();
            $playerTwo->turn($deck);

            $playerThree->getShowCards();
            $playerThree->turn($deck);

            $loop++;
        }

        echo PHP_EOL;
        if ($playerOne->getCardLeft() == 0) {
            echo 'WINNER: '.$playerOne.PHP_EOL;
        }else if ($playerTwo->getCardLeft() == 0) {
            echo 'WINNER: '.$playerTwo.PHP_EOL;
        }else {
            echo 'WINNER: '.$playerThree.PHP_EOL;
        }
        echo 'Total Turn: '.$loop.PHP_EOL;
        echo "======= End =======".PHP_EOL;}
}


$play = new Play;
$play->start();