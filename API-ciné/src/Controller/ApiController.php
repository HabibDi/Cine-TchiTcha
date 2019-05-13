<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Salle;
use App\Entity\Reservations;

use Symfony\Component\HttpFoundation\JsonResponse;

header("Acces-Control-Allow-Origin: http://localhost:3000");

/**
 * @Route("/api", name="api")
 */
class ApiController extends AbstractController
{
    /**
     * @Route("/", name="apiIndex")
     */
    public function index()
    {
        $test = $this->getDoctrine()->getManager()->getRepository(Salle::class)->findAll();
        $data = [];

        foreach ($test as $item) {
            $data[] =[$item->getNumeros(), $item->getPlaces()];
        }

        return new JsonResponse($data);
    }

    /**
     * @Route("/Reservation", name="apiResa")
     */
    public function Reservation()
    {
        $reservation = new Reservations();
        $reservation->setMail('mail');
        $reservation->setNom('nom');
        $reservation->setPrenom('prénom');
        $reservation->setSeanceFk('seance');
        $reservation->setNotation('notation');
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($reservation);
        $entityManager->flush();

        return $this->redirectToRoute('salle_index');
    }   
}
