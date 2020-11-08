<?php

namespace Main;
use Model\Player;
use Model\Game;

require_once '../model/Game.php';
require_once '../model/Player.php';
    $player1 = new Player("A");
    $player2 = new Player("B");
    $player1->setLevel(1700);
    $player2->setLevel(2500);
    $game = new Game($player1,$player2);

    echo $game->probaPlayer1();
?>