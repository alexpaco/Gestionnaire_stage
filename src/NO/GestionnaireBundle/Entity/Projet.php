<?php

namespace NO\GestionnaireBundle\Entity;


use Doctrine\Common\Collections\ArrayCollection;

/**
 * Projet
 */
class Projet
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $nomProjet;

    /**
     * @var \Date
     */
    private $dateDebut;

    /**
     * @var \Date
     */
    private $dateFin;

    /**
     * @var ArrayCollection
    */
    private $users;

    /**
     * @var \NO\GestionnaireBundle\Entity\Client
     */
    private $clients;

    /**
     * @var \NO\GestionnaireBundle\Entity\Pole
     */
    private $poles;

    /**
     * @var \NO\GestionnaireBundle\Entity\Typologie
     */
    private $typologies;
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nomProjet
     *
     * @param string $nomProjet
     *
     * @return Projet
     */
    public function setNomProjet($nomProjet)
    {
        $this->nomProjet = $nomProjet;

        return $this;
    }

    /**
     * Get nomProjet
     *
     * @return string
     */
    public function getNomProjet()
    {
        return $this->nomProjet;
    }

    /**
     * Set dateDebut
     *
     * @param \Date $dateDebut
     *
     * @return Projet
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return \Date
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set dateFin
     *
     * @param \Date $dateFin
     *
     * @return Projet
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \Date
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    /**
     * Add user
     *
     * @param \NO\GestionnaireBundle\Entity\User $user
     *
     * @return Projet
     */
    public function addUser(\NO\GestionnaireBundle\Entity\User $user)
    {
        $this->users[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \NO\GestionnaireBundle\Entity\User $user
     */
    public function removeUser(\NO\GestionnaireBundle\Entity\User $user)
    {
        $this->users->removeElement($user);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Set clients
     *
     * @param \NO\GestionnaireBundle\Entity\Client $clients
     *
     * @return Projet
     */
    public function setClients(\NO\GestionnaireBundle\Entity\Client $clients = null)
    {
        $this->clients = $clients;

        return $this;
    }

    /**
     * Get clients
     *
     * @return \NO\GestionnaireBundle\Entity\Client
     */
    public function getClients()
    {
        return $this->clients;
    }

    /**
     * Set poles
     *
     * @param \NO\GestionnaireBundle\Entity\Pole $poles
     *
     * @return Projet
     */
    public function setPoles(\NO\GestionnaireBundle\Entity\Pole $poles = null)
    {
        $this->poles = $poles;

        return $this;
    }

    /**
     * Get poles
     *
     * @return \NO\GestionnaireBundle\Entity\Pole
     */
    public function getPoles()
    {
        return $this->poles;
    }

    /**
     * Set typologies
     *
     * @param \NO\GestionnaireBundle\Entity\Typologie $typologies
     *
     * @return Projet
     */
    public function setTypologies(\NO\GestionnaireBundle\Entity\Typologie $typologies = null)
    {
        $this->typologies = $typologies;

        return $this;
    }

    /**
     * Get typologies
     *
     * @return \NO\GestionnaireBundle\Entity\Typologie
     */
    public function getTypologies()
    {
        return $this->typologies;
    }
}
