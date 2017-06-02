<?php

namespace NO\GestionnaireBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use NO\GestionnaireBundle\Form\TacheType;
use NO\GestionnaireBundle\Form\TacheEditType;
use NO\GestionnaireBundle\Entity\Tache;

class TacheController extends Controller
{
	public function ajoutTachesAction(Request $request, $id)
	{
		$em = $this->getDoctrine()->getManager();

		$tache = new Tache();

		$projet = $em->getRepository('NOGestionnaireBundle:Projet')->find($id);
		$id = $projet->getId();
		$listeTaches = $em->getRepository('NOGestionnaireBundle:Tache')->findBy(array('projet' => $id), array('niveau' => 'ASC','tacheMeres' => 'ASC','ordre' => 'ASC'));

		$formTache = $this->get('form.factory')->create(TacheType::class, $tache);
		$tache->setProjet($projet);
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
	public function modificationTacheAction($idTache, Request $request)
	{
		$em = $this->getDoctrine()->getManager();

		$tache = $em->getRepository('NOGestionnaireBundle:Tache')->find($idTache);

		$form = $this->get('form.factory')->create(TacheEditType::class, $tache);

		if($request->isMethod('POST') && $form->handleRequest($request)->isSubmitted())
		{
			$em->flush();

			return $this->redirectToRoute('no_gestionnaire_suivi', array('id' => $tache->getProjet()->getId()));
		}

		return $this->render('NOGestionnaireBundle:Projet:modif.html.twig', array(
			'tache' => $tache,
			'form' => $form->createView()
		));
	}
}
