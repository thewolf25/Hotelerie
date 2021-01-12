<?php


namespace UserBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * @ORM\Entity
 *
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="roles", type="string")
 * @ORM\DiscriminatorMap({"ADMIN"="Admin", "CLIENT"="Client","AGENT"="Agent"})
 * @UniqueEntity(
 *     fields={"email"},
 *     errorPath="email",
 *     message="l'email est déja utilisé."
 * )
 * @UniqueEntity(
 *     fields={"telephone"},
 *     errorPath="telephone",
 *     message="le telephone est déja utilisé.")
 *
 *
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
     * @Assert\Email(
     *     message = "l'email non valide."
     * )
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
     * @Assert\Length(min="8",minMessage="Votre mot de passe doit contenir au moins 8 caractére")
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
     * @Assert\EqualTo(propertyPath="password",message="les mots de passe ne sont pas identiques")
     */
    private $confirmPassword;

    /**
     * @return mixed
     */
    public function getConfirmPassword()
    {
        return $this->confirmPassword;
    }

    /**
     * @param mixed $confirmPassword
     */
    public function setConfirmPassword($confirmPassword)
    {
        $this->confirmPassword = $confirmPassword;
    }


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
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
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
        return ['CLIENT'];
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