<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Film;
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
        $test = $this->getDoctrine()->getManager()->getRepository(Film::class)->getLastsFilms();
        $data = [];

        foreach ($test as $item) {
            $seances = [];
            foreach($item->getSeances() as $seance) {
                $seances[] = [
                    'Id' => $seance->getId(),
                    'Date' => $seance->getDate(),
                ];
            }
            $data[] = [
                'Id' => $item->getId(),
                'Titre' => $item->getTitre(),
                'Synopsis' => $item->getSynopsis(),
                'Durée' => $item->getDuree(),
                'Teaser' => $item->getBandeAnnonce(),
                'Sortie' => $item->getDateDeSortie(),
                'Seances' => $seances,
            ];
        }

        return new JsonResponse($data);
    }

    /**
     * @Route("/Reservation", name="apiResa")
     */
    public function Reservation(Request $request)
    {
        $recu = $_POST['film'];
        // $reservation = new Reservations();
        // $reservation->setMail('mail');
        // $reservation->setNom('nom');
        // $reservation->setPrenom('prénom');
        // $reservation->setSeanceFk('seance');
        // $reservation->setNotation('notation');
        // $entityManager = $this->getDoctrine()->getManager();
        // $entityManager->persist($reservation);
        // $entityManager->flush();

        return new JsonResponse($recu);
    }   
}
