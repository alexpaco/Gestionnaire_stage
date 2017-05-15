<?php

namespace NO\GestionnaireBundle\Entity;

/**
 * Tache
 */
class Tache
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $nomTache;

    /**
     * @var int
     */
    private $niveau;

    /**
     * @var int
     */
    private $ordre;

    /**
     * @var string
     */
    private $joursRealises;

    /**
     * @var string
     */
    private $raf;

    /**
     * @var \NO\GestionnaireBundle\Entity\Projet
     */
    private $projets;


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
     * Set nomTache
     *
     * @param string $nomTache
     *
     * @return Tache
     */
    public function setNomTache($nomTache)
    {
        $this->nomTache = $nomTache;

        return $this;
    }

    /**
     * Get nomTache
     *
     * @return string
     */
    public function getNomTache()
    {
        return $this->nomTache;
    }

    /**
     * Set niveau
     *
     * @param integer $niveau
     *
     * @return Tache
     */
    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;

        return $this;
    }

    /**
     * Get niveau
     *
     * @return int
     */
    public function getNiveau()
    {
        return $this->niveau;
    }

    /**
     * Set ordre
     *
     * @param integer $ordre
     *
     * @return Tache
     */
    public function setOrdre($ordre)
    {
        $this->ordre = $ordre;

        return $this;
    }

    /**
     * Get ordre
     *
     * @return int
     */
    public function getOrdre()
    {
        return $this->ordre;
    }

    /**
     * Set joursRealises
     *
     * @param string $joursRealises
     *
     * @return Tache
     */
    public function setJoursRealises($joursRealises)
    {
        $this->joursRealises = $joursRealises;

        return $this;
    }

    /**
     * Get joursRealises
     *
     * @return string
     */
    public function getJoursRealises()
    {
        return $this->joursRealises;
    }

    /**
     * Set raf
     *
     * @param string $raf
     *
     * @return Tache
     */
    public function setRaf($raf)
    {
        $this->raf = $raf;

        return $this;
    }

    /**
     * Get raf
     *
     * @return string
     */
    public function getRaf()
    {
        return $this->raf;
    }

    /**
     * Set projets
     *
     * @param \NO\GestionnaireBundle\Entity\Projet $projets
     *
     * @return Tache
     */
    public function setProjets(\NO\GestionnaireBundle\Entity\Projet $projets = null)
    {
        $this->projets = $projets;

        return $this;
    }

    /**
     * Get projets
     *
     * @return \NO\GestionnaireBundle\Entity\Projet
     */
    public function getProjets()
    {
        return $this->projets;
    }
}
