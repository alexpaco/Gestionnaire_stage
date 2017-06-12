<?php

namespace NO\GestionnaireBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MenuController extends Controller
{
	public function menuAction(){

		$em = $this->getDoctrine()->getManager();

		$projets = $em->getRepository('NOGestionnaireBundle:Projet')->findBy(array(), array('nomProjet' => 'asc'));

        return $this->render('NOGestionnaireBundle:Projet:menu.html.twig', array(
        	'projets' => $projets,
        ));
	}
}
