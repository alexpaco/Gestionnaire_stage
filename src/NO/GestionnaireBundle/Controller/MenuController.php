<?php

namespace NO\GestionnaireBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MenuController extends Controller
{
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
