<?php

namespace App\Controller;

use App\Entity\Seance;
use App\Entity\Salle;
use App\Form\SeanceType;
use App\Repository\SéanceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/seance")
 */
class SeanceController extends AbstractController
{
    /**
     * @Route("/", name="seance_index", methods={"GET"})
     */
    public function index(SéanceRepository $séanceRepository): Response
    {
        $seance = $this->getDoctrine()->getManager()->getRepository(Seance::class)->findAll();
        foreach ($seance as $item) {
            $resa = $item->getReservations();
            foreach ($resa as $reitem) {
                dump($reitem);
            }
        }
        return $this->render('séance/index.html.twig', [
            's_ances' => $séanceRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="seance_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $seance = new Seance();
        $form = $this->createForm(SeanceType::class, $seance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $salle = $seance->getSalleFk();
            //$entityManager->getRepository(Salle::class)->find($request->request->get('seance')['Salle_fk']);
            $seance->setPlacesDisponibles($salle->getPlaces());
            $entityManager->persist($seance);
            $entityManager->flush();

            return $this->redirectToRoute('seance_index');
        }

        return $this->render('séance/new.html.twig', [
            's_ance' => $seance,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="seance_show", methods={"GET"})
     */
    public function show(Seance $seance): Response
    {
        return $this->render('séance/show.html.twig', [
            's_ance' => $seance,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="seance_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Seance $seance): Response
    {
        $form = $this->createForm(SeanceType::class, $seance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('seance_index', [
                'id' => $seance->getId(),
            ]);
        }
        return $this->render('séance/edit.html.twig', [
            's_ance' => $seance,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="seance_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Seance $séance): Response
    {
        if ($this->isCsrfTokenValid('delete'.$séance->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $reservations = $séance->getReservations();
            foreach ($reservations as $reservation) {
                $entityManager->remove($reservation);
            }
            $entityManager->remove($séance);
            $entityManager->flush();
        }

        return $this->redirectToRoute('seance_index');
    }
}
