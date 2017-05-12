<?php

namespace NO\GestionnaireBundle\Entity;

class GrilleTarif
{
	/**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $tarif;

    private $profil;

    private $projet;

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
     * Set tarif
     *
     * @param integer $tarif
     *
     * @return GrilleTarif
     */
    public function setTarif($tarif)
    {
        $this->tarif = $tarif;

        return $this;
    }

    /**
     * Get tarif
     *
     * @return integer
     */
    public function getTarif()
    {
        return $this->tarif;
    }

    /**
     * Set profil
     *
     * @param \NO\GestionnaireBundle\Entity\Profil $profil
     *
     * @return GrilleTarif
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

    /**
     * Set projet
     *
     * @param \NO\GestionnaireBundle\Entity\Projet $projet
     *
     * @return GrilleTarif
     */
    public function setProjet(\NO\GestionnaireBundle\Entity\Projet $projet = null)
    {
        $this->projet = $projet;

        return $this;
    }

    /**
     * Get projet
     *
     * @return \NO\GestionnaireBundle\Entity\Projet
     */
    public function getProjet()
    {
        return $this->projet;
    }
}
