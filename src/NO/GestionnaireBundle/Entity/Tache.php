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
    private $projet;
    
    /**
     * @var \NO\GestionnaireBundle\Entity\Tache
     */
    private $tacheMeres;
    
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
    public function setProjet(\NO\GestionnaireBundle\Entity\Projet $projet = null)
    {
        $this->projet = $projet;

        return $this;
    }

    /**
     * Get projets
     *
     * @return \NO\GestionnaireBundle\Entity\Projet
     */
    public function getProjet()
    {
        return $this->projet;
    }


    /**
     * Set tacheMeres
     *
     * @param \NO\GestionnaireBundle\Entity\Tache $tacheMeres
     *
     * @return Tache
     */
    public function setTacheMeres(\NO\GestionnaireBundle\Entity\Tache $tacheMeres = null)
    {
        $this->tacheMeres = $tacheMeres;

        return $this;
    }

    /**
     * Get tacheMeres
     *
     * @return \NO\GestionnaireBundle\Entity\Tache
     */
    public function getTacheMeres()
    {
        return $this->tacheMeres;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $joursVendus;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->joursVendus = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add joursVendus
     *
     * @param \NO\GestionnaireBundle\Entity\NbJourVendus $joursVendus
     *
     * @return Tache
     */
    public function addJoursVendus(\NO\GestionnaireBundle\Entity\NbJourVendus $joursVendus)
    {
        $this->joursVendus[] = $joursVendus;

        return $this;
    }

    /**
     * Remove joursVendus
     *
     * @param \NO\GestionnaireBundle\Entity\NbJourVendus $joursVendus
     */
    public function removeJoursVendus(\NO\GestionnaireBundle\Entity\NbJourVendus $joursVendus)
    {
        $this->joursVendus->removeElement($joursVendus);
    }

    /**
     * Get joursVendus
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getJoursVendus()
    {
        return $this->joursVendus;
    }

    public function nbJoursVendus()
    {
        $somme = 0;

        foreach ($this->getJoursVendus() as $jourVendus) {
            $somme += $jourVendus->getJoursVendus();
        }
        return $somme;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $tacheEnfants;


    /**
     * Add tacheEnfant
     *
     * @param \NO\GestionnaireBundle\Entity\Tache $tacheEnfant
     *
     * @return Tache
     */
    public function addTacheEnfant(\NO\GestionnaireBundle\Entity\Tache $tacheEnfant)
    {
        $this->tacheEnfants[] = $tacheEnfant;

        return $this;
    }

    /**
     * Remove tacheEnfant
     *
     * @param \NO\GestionnaireBundle\Entity\Tache $tacheEnfant
     */
    public function removeTacheEnfant(\NO\GestionnaireBundle\Entity\Tache $tacheEnfant)
    {
        $this->tacheEnfants->removeElement($tacheEnfant);
    }

    /**
     * Get tacheEnfants
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTacheEnfants()
    {
        return $this->tacheEnfants;
    }

    public function sommeTachesEnfants()
    {
        $somme = 0;

        foreach ($this->getTacheEnfants() as $tache) {
            $somme += $tache->nbJoursVendus();
        }
        return $somme;
    }
}
