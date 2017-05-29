<?php

namespace NO\GestionnaireBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use NO\GestionnaireBundle\Form\ClientType;
use NO\GestionnaireBundle\Form\GrilleTarifType;
use NO\GestionnaireBundle\Form\NbJourVendusType;
use NO\GestionnaireBundle\Form\PoleType;
use NO\GestionnaireBundle\Form\PoleEditType;
use NO\GestionnaireBundle\Form\ProfilType;
use NO\GestionnaireBundle\Form\ProjetType;
use NO\GestionnaireBundle\Form\TacheType;
use NO\GestionnaireBundle\Form\TypologieType;
use NO\GestionnaireBundle\Form\UserType;
use NO\GestionnaireBundle\Entity\Client;
use NO\GestionnaireBundle\Entity\GrilleTarif;
use NO\GestionnaireBundle\Entity\NbJourVendus;
use NO\GestionnaireBundle\Entity\Pole;
use NO\GestionnaireBundle\Entity\Profil;
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
		$sommeJoursVendus = $em->getRepository('NOGestionnaireBundle:NbJourVendus')->sommeJoursVendus($id);

		return $this->render('NOGestionnaireBundle:Projet:suivi.html.twig', array(
			'projet' => $projet,
			'sommes' => $sommeJoursVendus,
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

	public function adminAction(Request $request)
	{
		$em = $this->getDoctrine()->getManager();

		$client = new Client();
		$pole = new Pole();
		$profil = new Profil();
		$typologie = new Typologie();
		$user = new User();

		$formClient = $this->get('form.factory')->create(ClientType::class, $client);
    	$formPole = $this->get('form.factory')->create(PoleType::class, $pole);
    	$formProfil = $this->get('form.factory')->create(ProfilType::class, $profil);
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
		if($request->isMethod('POST') && $formProfil->handleRequest($request)->isSubmitted())
		{
			$em->persist($profil);
			$em->flush();

			return $this->redirectToRoute('no_gestionnaire_admin');
		}

		return $this->render('NOGestionnaireBundle:Projet:admin.html.twig', array(
        	'formPole' =>$formPole->createView(),
        	'formTypologie' => $formTypologie->createView(),
        	'formClient' => $formClient->createView(),
        	'formUser' => $formUser->createView(),
        	'formProfil' => $formProfil->createView(),
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

	public function tarifAction($id, Request $request)
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