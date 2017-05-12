<?php

namespace NO\GestionnaireBundle\Entity;

/**
 * Pole
 */
class Pole
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $nomPole;


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
     * Set nomPole
     *
     * @param string $nomPole
     *
     * @return Pole
     */
    public function setNomPole($nomPole)
    {
        $this->nomPole = $nomPole;

        return $this;
    }

    /**
     * Get nomPole
     *
     * @return string
     */
    public function getNomPole()
    {
        return $this->nomPole;
    }
}
