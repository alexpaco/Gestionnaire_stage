<?php

namespace NO\GestionnaireBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use NO\GestionnaireBundle\Form\NbJourVendusType;
use NO\GestionnaireBundle\Entity\NbJourVendus;

class FormJoursVendusController extends Controller
{
	public function joursVendusAction($idProjet, Request $request)
	{
		$em = $this->getDoctrine()->getManager();

		$projet = $em->getRepository('NOGestionnaireBundle:Projet')->find($idProjet);
		$profilsProjet = $em->getRepository('NOGestionnaireBundle:GrilleTarif')->findBy(array('projet' => $idProjet), array());
		$listeTaches = $em->getRepository('NOGestionnaireBundle:Tache')->findBy(array('projet' => $idProjet), array('niveau' => 'ASC','tacheMeres' => 'ASC','ordre' => 'ASC'));

		return $this->render('NOGestionnaireBundle:Projet:joursVendus.html.twig', array(
    		'projet' => $projet,
    		'profilsProjets' => $profilsProjet,
    		'taches' => $listeTaches,
    	));
	}

	public function joursVendusEditAction($idProjet, $joursVendusId, Request $request)
	{
		$em = $this->getDoctrine()->getManager();

		$joursVendus = $em->getRepository('NOGestionnaireBundle:NbJourVendus')->findOneBy(array('id' => $joursVendusId));

		$formJoursVendus = $this->createEditFormNbJoursVendusTypeAction($joursVendus, $idProjet);

		if($request->isMethod('POST') && $formJoursVendus->handleRequest($request)->isSubmitted())	
		{
			$em->flush();
			// die;
		}

		return $this->redirectToRoute('no_gestionnaire_jours_vendus', array('idProjet' => $idProjet));
	}

	public function joursVendusCreateAction($idProjet, Request $request)
	{
		$em = $this->getDoctrine()->getManager();

		$joursVendus = new NbJourVendus();

		$formJoursVendus = $this->createCreateFormNbJoursVendusTypeAction($joursVendus, $idProjet);

		if($request->isMethod('POST') && $formJoursVendus->handleRequest($request)->isSubmitted())
		{
			$em->persist($joursVendus);
			$em->flush();
			// die;
		}

		return $this->redirectToRoute('no_gestionnaire_jours_vendus', array('idProjet' => $idProjet));
	}

	public function createCreateFormNbJoursVendusTypeAction($joursVendus, $idProjet)
	{
		return $this->get('form.factory')
					->createNamedBuilder('no_gestionnairebundle_nbjourvendus_create',
						NbJourVendusType::class,
						$joursVendus
					 )
					->setAction($this->generateUrl('no_gestionnaire_jours_vendus_create', array('idProjet' => $idProjet)))
					->getForm();
	}

	public function createEditFormNbJoursVendusTypeAction($joursVendus, $idProjet)
		{
			return $this->get('form.factory')
						->createNamedBuilder('no_gestionnairebundle_nbjourvendus_edit',
							NbJourVendusType::class,
							$joursVendus
						)
						->setAction($this->generateUrl('no_gestionnaire_jours_vendus_edit', array('idProjet' => $idProjet, 'joursVendusId' => $joursVendus->getId() )))
						->getForm();
		}

	public function createFormAction($tacheId, $profilId, $idProjet)
	{

		$nbJoursVendus = 0;

		$em = $this->getDoctrine()->getManager();
		
		$joursVendus = $em->getRepository('NOGestionnaireBundle:NbJourVendus')
							->findOneBy(array('tache' => $tacheId, 'profil' => $profilId))
							;

		if ($joursVendus) {

			$nbJoursVendus = $joursVendus->getJoursVendus();
			$form = $this->createEditFormNbJoursVendusTypeAction($joursVendus, $idProjet);
		}
		else{
			$tache = $em->getRepository('NOGestionnaireBundle:Tache')->findOneBy(array('id' => $tacheId));
			$profil = $em->getRepository('NOGestionnaireBundle:Profil')->findOneBy(array('id' => $profilId));
			$joursVendus = new NbJourVendus();
			$joursVendus->setTache($tache);
			$joursVendus->setProfil($profil);
			$form = $this->createCreateFormNbJoursVendusTypeAction($joursVendus, $idProjet);
		}
		

		return $this->render('NOGestionnaireBundle:Projet:formJoursVendus.html.twig', array(
			'formJoursVendus' => $form->createView(),
			'tacheId' => $tacheId,
			'profilId' => $profilId,
			'nbJoursVendus' => $nbJoursVendus,
		));
	}

}
