<?php


namespace UserBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="roles", type="string")
 * @ORM\DiscriminatorMap({"ADMIN"="Admin", "CLIENT"="Client","AGENT"="Agent"})
 *
 */


abstract class User implements UserInterface
{
    /**
     * @ORM\GeneratedValue
     * @ORM\Id
     * @ORM\Column(type="integer")
     *
     */
    private $id;

    /**
     * @ORM\Column (type="string",nullable=false)
     */
    private $nom;

    /**
     * @ORM\Column (type="string",nullable=false)
     */
    private $prenom;

    /**
     * @ORM\Column (type="string",unique=true)
     */
    private $email;

    /**
     * @ORM\Column (type="string",unique=true)
     *
     */
    private $telephone;

    /**
     * @ORM\Column (type="string",unique=true,nullable=false)
     *
     */
    private $username;

    /**
     * @ORM\Column (type="string",unique=false,nullable=false)
     *
     */
    private $password;

    /**
     * @ORM\Column (type="string",unique=true,nullable=false)
     *
     */
    private $identity;

    /**
     * @ORM\OneToMany(targetEntity="ReservationBundle\Entity\Reservation", mappedBy="client")
     */
    private $reservation;

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param mixed $telephone
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    /**
     * @return mixed
     */
    public function getIdentity()
    {
        return $this->identity;
    }

    /**
     * @param mixed $identity
     */
    public function setIdentity($identity)
    {
        $this->identity = $identity;
    }




    public function getRoles()
    {
        return $this->roles;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getSalt()
    {
        return null;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function eraseCredentials()
    {
    }
}