<?php

namespace NO\GestionnaireBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use NO\GestionnaireBundle\Form\ClientType;
use NO\GestionnaireBundle\Form\PoleType;
use NO\GestionnaireBundle\Form\PoleEditType;
use NO\GestionnaireBundle\Form\ProjetType;
use NO\GestionnaireBundle\Form\TacheType;
use NO\GestionnaireBundle\Form\TypologieType;
use NO\GestionnaireBundle\Form\UserType;
use NO\GestionnaireBundle\Entity\Client;
use NO\GestionnaireBundle\Entity\Pole;
use NO\GestionnaireBundle\Entity\Projet;
use NO\GestionnaireBundle\Entity\Tache;
use NO\GestionnaireBundle\Entity\Typologie;
use NO\GestionnaireBundle\Entity\User;
class ProjetController extends Controller
{
	public function suiviAction($id, Request $request)
	{	
		$em = $this->getDoctrine()->getManager();

		$projet = $em->getRepository('NOGestionnaireBundle:Projet')->find($id);
		$tache = $em->getRepository('NOGestionnaireBundle:Tache')->findBy(array('projets' => $id), array());

		return $this->render('NOGestionnaireBundle:Projet:suivi.html.twig', array(
			'projets' => $projet,
			'taches' => $tache,
		));
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

			return $this->redirectToRoute('no_gestionnaire_suvi', array('id' => $projet->getId()));
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

	public function ajoutTachesAction(Request $request, $id)
	{
		$em = $this->getDoctrine()->getManager();

		$tache = new Tache();

		$projet = $em->getRepository('NOGestionnaireBundle:Projet')->find($id);
		$id = $projet->getId();
		$listeTaches = $em->getRepository('NOGestionnaireBundle:Tache')->findBy(array(), array());

		$formTache = $this->get('form.factory')->create(TacheType::class, $tache);
		$tache->setProjets($projet);
		if($request->isMethod('POST') && $formTache->handleRequest($request)->isSubmitted())
		{
			$em->persist($tache);
			$em->flush();

			return $this->redirectToRoute('no_gestionnaire_ajout_taches', array('id' => $projet->getId()));
		}
		return $this->render('NOGestionnaireBundle:Projet:ajoutTaches.html.twig', array(
			'formTache' => $formTache->createView(),
			'taches' => $listeTaches,
			'projet' => $projet,
		));
	}

	public function adminAction(Request $request)
	{
		$em = $this->getDoctrine()->getManager();

		$client = new Client();
		$pole = new Pole();
		$typologie = new Typologie();
		$user = new User();

		$formClient = $this->get('form.factory')->create(ClientType::class, $client);
    	$formPole = $this->get('form.factory')->create(PoleType::class, $pole);
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

		return $this->render('NOGestionnaireBundle:Projet:admin.html.twig', array(
        	'formPole' =>$formPole->createView(),
        	'formTypologie' => $formTypologie->createView(),
        	'formClient' => $formClient->createView(),
        	'formUser' =>$formUser->createView()
        ));
	}

	public function menuAction(){

		$em = $this->getDoctrine()->getManager();

		$projets = $em->getRepository('NOGestionnaireBundle:Projet')->findBy(array(), array('nomProjet' => 'asc'));

    	$poles = $em->getRepository('NOGestionnaireBundle:Pole')->findBy(array(), array('nomPole' => 'asc'));

        return $this->render('NOGestionnaireBundle:Projet:menu.html.twig', array(
        	'poles' => $poles,
        	'projets' => $projets,
        ));
	}	
}