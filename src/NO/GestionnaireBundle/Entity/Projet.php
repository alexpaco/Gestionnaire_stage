<?php

namespace NO\GestionnaireBundle\Entity;

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

    private $users;

    private $clients;

    private $poles;

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
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
        $this->clients = new \Doctrine\Common\Collections\ArrayCollection();
        $this->poles = new \Doctrine\Common\Collections\ArrayCollection();
        $this->typologies = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add client
     *
     * @param \NO\GestionnaireBundle\Entity\Client $client
     *
     * @return Projet
     */
    public function addClient(\NO\GestionnaireBundle\Entity\Client $client)
    {
        $this->clients[] = $client;

        return $this;
    }

    /**
     * Remove client
     *
     * @param \NO\GestionnaireBundle\Entity\Client $client
     */
    public function removeClient(\NO\GestionnaireBundle\Entity\Client $client)
    {
        $this->clients->removeElement($client);
    }

    /**
     * Get clients
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getClients()
    {
        return $this->clients;
    }

    /**
     * Add pole
     *
     * @param \NO\GestionnaireBundle\Entity\Pole $pole
     *
     * @return Projet
     */
    public function addPole(\NO\GestionnaireBundle\Entity\Pole $pole)
    {
        $this->poles[] = $pole;

        return $this;
    }

    /**
     * Remove pole
     *
     * @param \NO\GestionnaireBundle\Entity\Pole $pole
     */
    public function removePole(\NO\GestionnaireBundle\Entity\Pole $pole)
    {
        $this->poles->removeElement($pole);
    }

    /**
     * Get poles
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPoles()
    {
        return $this->poles;
    }

    /**
     * Add typology
     *
     * @param \NO\GestionnaireBundle\Entity\Typologie $typology
     *
     * @return Projet
     */
    public function addTypology(\NO\GestionnaireBundle\Entity\Typologie $typology)
    {
        $this->typologies[] = $typology;

        return $this;
    }

    /**
     * Remove typology
     *
     * @param \NO\GestionnaireBundle\Entity\Typologie $typology
     */
    public function removeTypology(\NO\GestionnaireBundle\Entity\Typologie $typology)
    {
        $this->typologies->removeElement($typology);
    }

    /**
     * Get typologies
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTypologies()
    {
        return $this->typologies;
    }
}
