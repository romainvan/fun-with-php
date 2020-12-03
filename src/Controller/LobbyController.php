<?php

namespace App\Controller;

use App\Entity\Lobby;
use App\Form\LobbyType;
use App\Repository\LobbyRepository;
use App\Repository\PlayerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/lobby")
 */
class LobbyController extends AbstractController
{
    /**
     * @Route("", name="lobby_index")
     */
    public function index(LobbyRepository $lobbyRepository): Response
    {
        $lobby = $lobbyRepository->findAll()[0];
        return $this->render('lobby/index.html.twig', [
            'lobby' => $lobby,
        ]);
    }

    /**
     * @Route("/add", name="lobby_add")
     */
    public function add(PlayerRepository $playerRepository,LobbyRepository $lobbyRepository) : Response
    {
        $playsession =  $this->get('session')->get('user');
        $id = $playsession->getId();
        $player = $playerRepository->find($id);
        $lobby = $lobbyRepository->findAll()[0];
        if(!in_array($player,$lobby->getAllPlayers()))
        {
            $lobby->addPlayer($player);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($lobby);
            $entityManager->flush();
        }
        return $this->render('lobby/index.html.twig', [
            'lobby' => $lobby,
        ]);
    }

    /**
     * @Route("/remove", name="remove")
     */
    public function remove (PlayerRepository $playerRepository,LobbyRepository $lobbyRepository) : Response
    {
        $playsession =  $this->get('session')->get('user');
        $id = $playsession->getId();
        $player = $playerRepository->find($id);
        $lobby = $lobbyRepository->findAll()[0];
        if(in_array($player,$lobby->getAllPlayers()))
        {
            $lobby->removePlayer($player);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($lobby);
            $entityManager->flush();
        }
        return $this->render('home_page/index.html.twig', [
        ]);
    }

    /**
     * @Route("/play", name="play")
     */
    public function playGame(LobbyRepository $lobbyRepository) : Response
    {
        $lobby = $lobbyRepository->findAll()[0];
        $allPlayers = $lobby->getAllPlayers();
        $pas = 100;
        $size = sizeof($allPlayers);
        for($i=0;$i<$size;$i++){
            for($j=0;$j<$size;$j++){
                if($allPlayers[i] != $allPlayers[j] &&  ){

                }
            }
        }
    }


}
