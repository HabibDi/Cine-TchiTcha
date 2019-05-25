<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\NewsletterType;
use App\Entity\NewsletterAbo;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="homePage")
     */
    public function index()
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    /**
     * @Route("/newsletter", name="newsletter")
     */
    public function newsletter(Request $request, \Swift_Mailer $mailer)
    {
    	$form = $this->createForm(NewsletterType::class);
    	$form->handleRequest($request);
    	if ($form->isSubmitted()) {
    		$list = [];
    		$all = $this->getDoctrine()->getManager()->getRepository(NewsletterAbo::class)->findAll();
    		foreach ($all as $item) {
    			$list[] = $item->getEmail();
    		}
    		$message = (new \Swift_Message('Subject'))
    			->setFrom('NoReply@Noreply.com')
    			->setTo($list)
    			->setSubject($request->request->get('newsletter')['Title'])
    			->setBody($request->request->get('newsletter')['Message']);
    		$mailer->send($message);
    	}
    	return $this->render('main/newsletter.html.twig', [
    			'form' => $form->createView(),
    	]);
    	
    }
}
