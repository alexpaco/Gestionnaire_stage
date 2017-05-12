<?php

namespace NO\GestionnaireBundle\Entity;

/**
 * Profil
 */
class Profil
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $nomProfil;


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
     * Set nomProfil
     *
     * @param string $nomProfil
     *
     * @return Profil
     */
    public function setNomProfil($nomProfil)
    {
        $this->nomProfil = $nomProfil;

        return $this;
    }

    /**
     * Get nomProfil
     *
     * @return string
     */
    public function getNomProfil()
    {
        return $this->nomProfil;
    }
}
