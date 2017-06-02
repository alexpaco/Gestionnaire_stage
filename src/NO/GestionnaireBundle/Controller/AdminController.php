<?php

namespace NO\GestionnaireBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use NO\GestionnaireBundle\Form\ClientType;
use NO\GestionnaireBundle\Form\PoleType;
use NO\GestionnaireBundle\Form\ProfilType;
use NO\GestionnaireBundle\Form\TypologieType;
use NO\GestionnaireBundle\Form\UserType;
use NO\GestionnaireBundle\Entity\Client;
use NO\GestionnaireBundle\Entity\Pole;
use NO\GestionnaireBundle\Entity\Profil;
use NO\GestionnaireBundle\Entity\Typologie;
use NO\GestionnaireBundle\Entity\User;

class AdminController extends Controller
{
	public function adminAction(Request $request)
	{
		$em = $this->getDoctrine()->getManager();

		$client = new Client();
		$pole = new Pole();
		$profil = new Profil();
		$typologie = new Typologie();
		$user = new User();

		$formClient = $this->get('form.factory')->create(ClientType::class, $client);
    	$formPole = $this->get('form.factory')->create(PoleType::class, $pole);
    	$formProfil = $this->get('form.factory')->create(ProfilType::class, $profil);
    	$formTypologie = $this->get('form.factory')->create(TypologieType::class, $typologie);
    	$formUser = $this->get('form.factory')->create(UserType::class, $user);

    	if($request->isMethod('POST') && $formClient->handleRequest($request)->isSubmitted())
    	{
    		$em->persist($client);
    		$em->flush();

    		return $this->redirectToRoute('no_gestionnaire_admin');
    	}

    	if($request->isMethod('POST') && $formPole->handleRequest($request)->isSubmitted())
    	{
    		$em->persist($pole);
    		$em->flush();

    		return $this->redirectToRoute('no_gestionnaire_admin');
		}
		if($request->isMethod('POST') && $formTypologie->handleRequest($request)->isSubmitted())
		{
			$em->persist($typologie);
			$em->flush();

			return $this->redirectToRoute('no_gestionnaire_admin');
		}
		if($request->isMethod('POST') && $formUser->handleRequest($request)->isSubmitted())
		{
			$em->persist($user);
			$em->flush();

			return $this->redirectToRoute('no_gestionnaire_admin');
		}
		if($request->isMethod('POST') && $formProfil->handleRequest($request)->isSubmitted())
		{
			$em->persist($profil);
			$em->flush();

			return $this->redirectToRoute('no_gestionnaire_admin');
		}

		return $this->render('NOGestionnaireBundle:Projet:admin.html.twig', array(
        	'formPole' =>$formPole->createView(),
        	'formTypologie' => $formTypologie->createView(),
        	'formClient' => $formClient->createView(),
        	'formUser' => $formUser->createView(),
        	'formProfil' => $formProfil->createView(),
        ));
	}
}
