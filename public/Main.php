<?php

namespace Main;
use Model\Player;
use Model\Game;
require_once '../model/Game.php';
require_once '../model/Player.php';

    $playerA = new Player("A");
    $playerB = new Player("B");
    $playerC = new Player("C");
    $playerD = new Player("D");

    $playerA->setLevel(1700);
    $playerB->setLevel(2500);
    $playerC->setLevel(1200);
    $playerD->setLevel(1800);

    $game1 = new Game($playerA,$playerB);
    $game2 = new Game($playerC,$playerA);
    $game3 = new Game($playerD,$playerA);

    echo 'probabilité du joueur A face au joueur B : '.$game1->probaPlayer1().PHP_EOL;
    echo 'probabilité du joueur B face au joueur A : '.$game1->probaPlayer2().PHP_EOL;
    echo 'probabilité du joueur C face au joueur A : '.$game2->probaPlayer1().PHP_EOL;
    echo 'probabilité du joueur A face au joueur C : '.$game2->probaPlayer2().PHP_EOL;
    echo 'probabilité du joueur D face au joueur A : '.$game3->probaPlayer1().PHP_EOL;
    echo 'probabilité du joueur A face au joueur D : '.$game3->probaPlayer2().PHP_EOL;

    echo 'LE JOUEUR A GAGNE CONTRE LE JOUEUR B'.PHP_EOL;;

    $playerA->correctLevel(1,$game1->probaPlayer1());
    $playerB->correctLevel(0,$game1->probaPlayer2());

    echo'Le nouveau niveau du joueur A est : ' . $playerA->getLevel().PHP_EOL;;
    echo'Le nouveau niveau du joueur B est : ' . $playerB->getLevel().PHP_EOL;;

?>