<?php

namespace NO\GestionnaireBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use NO\GestionnaireBundle\Form\GrilleTarifType;
use NO\GestionnaireBundle\Entity\GrilleTarif;

class TarifController extends Controller
{
	public function ajoutTarifAction($id, Request $request)
	{
		$em = $this->getDoctrine()->getManager();

		$tarif = new GrilleTarif();

		$projet = $em->getRepository('NOGestionnaireBundle:Projet')->find($id);
		$listeTarif = $em->getRepository('NOGestionnaireBundle:GrilleTarif')->findBy(array('projet' => $id), array());


		$formTarif = $this->get('form.factory')->create(GrilleTarifType::class, $tarif);
		$tarif->setProjet($projet);
		if($request->isMethod('POST') && $formTarif->handleRequest($request)->isSubmitted())
    	{
    		$em->persist($tarif);
    		$em->flush();

    		return $this->redirectToRoute('no_gestionnaire_tarif', array('id' => $projet->getId()));
    	}

    	return $this->render('NOGestionnaireBundle:Projet:tarif.html.twig', array(
    		'formTarif' => $formTarif->createView(),
    		'projet' => $projet,
    		'tarifs' => $listeTarif,
    	));
	}
}
