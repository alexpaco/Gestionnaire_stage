<?php

namespace NO\GestionnaireBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use NO\GestionnaireBundle\Entity\Client;
use NO\GestionnaireBundle\Entity\Pole;
use NO\GestionnaireBundle\Form\PoleType;

class DefaultController extends Controller
{
    public function indexAction()
    {
    	return $this->render('NOGestionnaireBundle:Default:index.html.twig');
    }
}