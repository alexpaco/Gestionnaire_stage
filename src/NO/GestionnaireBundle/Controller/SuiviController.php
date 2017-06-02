<?php

namespace NO\GestionnaireBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SuiviController extends Controller
{
	public function suiviAction($id, Request $request)
	{	
		$em = $this->getDoctrine()->getManager();

		$projet = $em->getRepository('NOGestionnaireBundle:Projet')->find($id);
		$sommeJoursVendus = $em->getRepository('NOGestionnaireBundle:NbJourVendus')->sommeJoursVendus($id);
		$sommeRaf = $em->getRepository('NOGestionnaireBundle:Tache')->sommeRaf($id);
		$sommeTotaleJoursVendus = $em->getRepository('NOGestionnaireBundle:NbJourVendus')->sommeTotaleJoursVendus($id);

		// dump($sommeJoursVendus);
		// dump($sommeRaf);
		// dump($sommeTotaleJoursVendus);
		// die;

		return $this->render('NOGestionnaireBundle:Projet:suivi.html.twig', array(
			'projet' => $projet,
			'sommes' => $sommeJoursVendus,
			'sommeRaf' => $sommeRaf,
			'sommeTotaleJoursVendus' => $sommeTotaleJoursVendus,
		));
	}
}
