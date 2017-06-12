<?php
	
namespace NO\GestionnaireBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * User
 */
class User
{
	/**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $nomUser;

    /**
     * @var string
     */
    private $password;

    /**
     * @var \NO\GestionnaireBundle\Entity\Pole
     */
    private $poles;
    
    /**
     * @var ArrayCollection
    */
    private $roles;

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
     * Set nomUser
     *
     * @param string $nomUser
     *
     * @return User
     */
    public function setNomUser($nomUser)
    {
        $this->nomUser = $nomUser;

        return $this;
    }

    /**
     * Get nomUser
     *
     * @return string
     */
    public function getNomUser()
    {
        return $this->nomUser;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->roles = new ArrayCollection();
    }

    /**
     * Add role
     *
     * @param \NO\GestionnaireBundle\Entity\Role $role
     *
     * @return User
     */
    public function addRole(\NO\GestionnaireBundle\Entity\Role $role)
    {
        $this->roles[] = $role;

        return $this;
    }

    /**
     * Remove role
     *
     * @param \NO\GestionnaireBundle\Entity\Role $role
     */
    public function removeRole(\NO\GestionnaireBundle\Entity\Role $role)
    {
        $this->roles->removeElement($role);
    }

    /**
     * Get roles
     *
     * @return Collection
     */
    public function getRoles()
    {
        return $this->roles;
    }


    /**
     * Set poles
     *
     * @param \NO\GestionnaireBundle\Entity\Pole $poles
     *
     * @return User
     */
    public function setPoles(\NO\GestionnaireBundle\Entity\Pole $poles = null)
    {
        $this->poles = $poles;

        return $this;
    }

    /**
     * Get poles
     *
     * @return \NO\GestionnaireBundle\Entity\Pole
     */
    public function getPoles()
    {
        return $this->poles;
    }
}
