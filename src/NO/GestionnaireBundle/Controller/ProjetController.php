<?php

namespace NO\GestionnaireBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use NO\GestionnaireBundle\Form\ProjetType;
use NO\GestionnaireBundle\Entity\Projet;

class ProjetController extends Controller
{

	public function ajoutProjetAction(Request $request)
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

	public function affichageAction($id)
	{
		$em = $this->getDoctrine()->getManager();

		$listeTaches = $em->getRepository('NOGestionnaireBundle:Tache')->afficheTout($id);
		$listeProfils = $em->getRepository('NOGestionnaireBundle:GrilleTarif')->findBy(array('projet' => $id), array());

		dump($listeTaches);
		// die;
		return $this->render('NOGestionnaireBundle:Projet:affichage.html.twig', array(
			'taches' => $listeTaches,
			'profils' => $listeProfils,
		));
	}	
}