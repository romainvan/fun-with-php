<?php

namespace App\Entity;

use App\Repository\LobbyRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LobbyRepository::class)
 */
class Lobby
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(name="all_players", type="array", nullable=true)
     */
    private $allPlayers;

    public function getId(): ?int
    {
        return $this->id;
    }
    /**
     * @return mixed
     */
    public function getAllPlayers()
    {
        return $this->allPlayers;
    }/**
     * @param mixed $allPlayers
     */
    public function setAllPlayers($allPlayers): void
    {
        $this->allPlayers = $allPlayers;
    }

    public function addPlayer($player):void
    {
        array_push($this->allPlayers,$player);
    }


}
