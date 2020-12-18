<?php


namespace UserBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 */

class Client extends User
{

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

    /**
     * Client constructor.
     */
    public function __construct($nom, $prenom, $email, $telephone, $username, $password, $identity)
    {
        parent::__construct($nom, $prenom, $email, $telephone, $username, $password, $identity);
    }

}