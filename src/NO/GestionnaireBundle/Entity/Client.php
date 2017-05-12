<?php

namespace NO\GestionnaireBundle\Entity;

/**
 * Client
 */
class Client
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $nomClient;


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
     * Set nomClient
     *
     * @param string $nomClient
     *
     * @return Client
     */
    public function setNomClient($nomClient)
    {
        $this->nomClient = $nomClient;

        return $this;
    }

    /**
     * Get nomClient
     *
     * @return string
     */
    public function getNomClient()
    {
        return $this->nomClient;
    }
    
}
