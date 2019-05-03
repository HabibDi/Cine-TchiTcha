<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Salle;

use Symfony\Component\HttpFoundation\JsonResponse;

header("Acces-Control-Allow-Origin: http://localhost:3000");

class ApiController extends AbstractController
{
    /**
     * @Route("/api", name="api")
     */
    public function index()
    {
        $test = $this->getDoctrine()->getManager()->getRepository(Salle::class)->findAll();
        $data = [];

        foreach ($test as $item) {
            $data[] =[$item->getNumeros(), $item->getPlaces()];
        }

        return new JsonResponse($data);
       // return $this->render('api/index.html.twig', [
            //'controller_name' => 'ApiController',
        //]);
    }
}
