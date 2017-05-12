<?php

namespace NO\GestionnaireBundle\Entity;

class NbJourVendus
{
	/**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $joursVendus;

    private $tache;

    private $profil;

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
     * Set joursVendus
     *
     * @param string $joursVendus
     *
     * @return NbJourVendus
     */
    public function setJoursVendus($joursVendus)
    {
        $this->joursVendus = $joursVendus;

        return $this;
    }

    /**
     * Get joursVendus
     *
     * @return string
     */
    public function getJoursVendus()
    {
        return $this->joursVendus;
    }

    /**
     * Set tache
     *
     * @param \NO\GestionnaireBundle\Entity\Tache $tache
     *
     * @return NbJourVendus
     */
    public function setTache(\NO\GestionnaireBundle\Entity\Tache $tache = null)
    {
        $this->tache = $tache;

        return $this;
    }

    /**
     * Get tache
     *
     * @return \NO\GestionnaireBundle\Entity\Tache
     */
    public function getTache()
    {
        return $this->tache;
    }

    /**
     * Set profil
     *
     * @param \NO\GestionnaireBundle\Entity\Profil $profil
     *
     * @return NbJourVendus
     */
    public function setProfil(\NO\GestionnaireBundle\Entity\Profil $profil = null)
    {
        $this->profil = $profil;

        return $this;
    }

    /**
     * Get profil
     *
     * @return \NO\GestionnaireBundle\Entity\Profil
     */
    public function getProfil()
    {
        return $this->profil;
    }
}
