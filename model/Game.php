<?php
namespace Model;
require "Player.php";
class Game
{
    public $player1;
    public $player2;

    function __construct($player1,$player2)
    {
        $this->player1=$player1;
        $this->player2=$player2;
    }

    function probaPlayer1()
    {
        $exposant = ($this->getPlayer2()->getLevel()
                -$this->getPlayer1()->getLevel())/400;
        $division = 1+(10**$exposant);
        return 1/$division;

    }

    function probaPlayer2()
    {
        $exposant = ($this->getPlayer1()->getLevel()
                -$this->getPlayer2()->getLevel())/400;
        $division = 1+(10**$exposant);
        return 1/$division;
    }

    /**
     * @return Player
     */
    public function getPlayer1()
    {
        return $this->player1;
    }

    /**
     * @param Player $player1
     */
    public function setPlayer1($player1)
    {
        $this->player1 = $player1;
    }

    /**
     * @return Player
     */
    public function getPlayer2()
    {
        return $this->player2;
    }

    /**
     * @param Player $player2
     */
    public function setPlayer2($player2)
    {
        $this->player2 = $player2;
    }


}