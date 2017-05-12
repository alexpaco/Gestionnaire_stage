<?php
	
namespace NO\GestionnaireBundle\Entity;

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

    private $poles;

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
        $this->poles = new \Doctrine\Common\Collections\ArrayCollection();
        $this->roles = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add pole
     *
     * @param \NO\GestionnaireBundle\Entity\Pole $pole
     *
     * @return User
     */
    public function addPole(\NO\GestionnaireBundle\Entity\Pole $pole)
    {
        $this->poles[] = $pole;

        return $this;
    }

    /**
     * Remove pole
     *
     * @param \NO\GestionnaireBundle\Entity\Pole $pole
     */
    public function removePole(\NO\GestionnaireBundle\Entity\Pole $pole)
    {
        $this->poles->removeElement($pole);
    }

    /**
     * Get poles
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPoles()
    {
        return $this->poles;
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
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRoles()
    {
        return $this->roles;
    }
}
