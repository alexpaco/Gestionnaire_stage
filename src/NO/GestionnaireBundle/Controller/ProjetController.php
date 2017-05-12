<?php

namespace NO\GestionnaireBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use NO\GestionnaireBundle\Form\PoleEditType;
use NO\GestionnaireBundle\Form\PoleType;
use NO\GestionnaireBundle\Form\TypologieType;
use NO\GestionnaireBundle\Form\ClientType;
use NO\GestionnaireBundle\Form\ProjetType;
use NO\GestionnaireBundle\Entity\Typologie;
use NO\GestionnaireBundle\Entity\Pole;
use NO\GestionnaireBundle\Entity\Projet;
use NO\GestionnaireBundle\Entity\Client;
class ProjetController extends Controller
{
	public function suiviAction()
	{
		return $this->render('NOGestionnaireBundle:Projet:suivi.html.twig');
	}
	public function ajoutAction(Request $request)
	{
		$em = $this->getDoctrine()->getManager();

		$projet = new Projet();

		$formProjet = $this->get('form.factory')->create(ProjetType::class, $projet);

		if($request->isMethod('POST') && $formProjet->handleRequest($request)->isSubmitted())
		{
			$em->persist($projet);
			$em->flush();

			return $this->redirectToRoute('no_gestionnaire_homepage');
		}

		return $this->render('NOGestionnaireBundle:Projet:ajout.html.twig', array(
			'formProjet' => $formProjet->createView()
		));
	}
	public function modificationAction($id, Request $request)
	{
		$em = $this->getDoctrine()->getManager();

		$pole = $em->getRepository('NOGestionnaireBundle:Pole')->find($id);

		$form = $this->get('form.factory')->create(PoleEditType::class, $pole);

		if($request->isMethod('POST') && $form->handleRequest($request)->isSubmitted())
		{
			$em->flush();

			return $this->redirectToRoute('no_gestionnaire_homepage');
		}

		return $this->render('NOGestionnaireBundle:Projet:modif.html.twig', array(
			'pole' => $pole,
			'form' => $form->createView()
		));
	}

	public function adminAction(Request $request)
	{
		$em = $this->getDoctrine()->getManager();

		$client = new Client();
		$pole = new Pole();
		$typologie = new Typologie();

		$formClient = $this->get('form.factory')->create(ClientType::class, $client);
    	$formPole = $this->get('form.factory')->create(PoleType::class, $pole);
    	$formTypologie = $this->get('form.factory')->create(TypologieType::class, $typologie);

    	if($request->isMethod('POST') & $formClient->handleRequest($request)->isSubmitted())
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

		return $this->render('NOGestionnaireBundle:Projet:admin.html.twig', array(
        	'formPole' =>$formPole->createView(),
        	'formTypologie' => $formTypologie->createView(),
        	'formClient' => $formClient->createView()
        ));
	}

	public function menuAction(){

		$em = $this->getDoctrine()->getManager();

    	$client = $em->getRepository('NOGestionnaireBundle:Client')->findBy(array(), array('nomClient' => 'desc'));

    	$poles = $em->getRepository('NOGestionnaireBundle:Pole')->findBy(array(), array('nomPole' => 'asc'));

        return $this->render('NOGestionnaireBundle:Projet:menu.html.twig', array(
        	'clients' => $client,
        	'poles' => $poles
        ));
	}	
}