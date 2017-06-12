<?php

namespace NO\GestionnaireBundle\Entity;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * UserFos
 */
class UserFos extends BaseUser
{
    /**
     * @var int
     */
    protected $id;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}

