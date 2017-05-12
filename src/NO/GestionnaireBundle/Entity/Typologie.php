<?php

namespace NO\GestionnaireBundle\Entity;

/**
 * Typologie
 */
class Typologie
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $nomTypologie;


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
     * Set nomTypologie
     *
     * @param string $nomTypologie
     *
     * @return Typologie
     */
    public function setNomTypologie($nomTypologie)
    {
        $this->nomTypologie = $nomTypologie;

        return $this;
    }

    /**
     * Get nomTypologie
     *
     * @return string
     */
    public function getNomTypologie()
    {
        return $this->nomTypologie;
    }
}
