<?php


namespace UserBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({"ADMIN"="Admin", "CLIENT"="Client","AGENT"="Agent"})
 *
 */


abstract class User
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