<?php


namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 */

class Client
{
    /**
     * @ORM\GeneratedValue
     * @ORM\Id
     * @ORM\Column(type="integer")
     *
     */
    private $idClient;

    /**
     * @ORM\Column (type="string",nullable=false)
     */
    private $nomClient;

    /**
     * @ORM\Column (type="string",nullable=false)
     */
    private $prenomClient;

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
    private $identity;

}