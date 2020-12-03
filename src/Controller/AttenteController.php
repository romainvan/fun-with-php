<?php

namespace App\Controller;

use App\Entity\Attente;
use App\Form\AttenteType;
use App\Repository\AttenteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/attente")
 */
class AttenteController extends AbstractController
{
    /**
     * @Route("/", name="attente_index", methods={"GET"})
     */
    public function index(AttenteRepository $attenteRepository): Response
    {
        return $this->render('attente/index.html.twig', [
            'attentes' => $attenteRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="attente_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $attente = new Attente();
        $form = $this->createForm(AttenteType::class, $attente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($attente);
            $entityManager->flush();

            return $this->redirectToRoute('attente_index');
        }

        return $this->render('attente/new.html.twig', [
            'attente' => $attente,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="attente_show", methods={"GET"})
     */
    public function show(Attente $attente): Response
    {
        return $this->render('attente/show.html.twig', [
            'attente' => $attente,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="attente_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Attente $attente): Response
    {
        $form = $this->createForm(AttenteType::class, $attente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('attente_index');
        }

        return $this->render('attente/edit.html.twig', [
            'attente' => $attente,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="attente_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Attente $attente): Response
    {
        if ($this->isCsrfTokenValid('delete'.$attente->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($attente);
            $entityManager->flush();
        }

        return $this->redirectToRoute('attente_index');
    }
}
