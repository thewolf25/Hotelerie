<?php


namespace ChambreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 */

class Chambre
{

    /**
     * @ORM\GeneratedValue
     * @ORM\Id
     * @ORM\Column(type="integer")
     *
     */
    private $idChambre;
    /**
     * @ORM\Column (type="integer",unique=true)
     */
    private $numChambre;

    /**
     * @ORM\Column (type="integer",unique=true,nullable=true)
     */
    private $telephoneChambre;

    /**
     * @ORM\Column (type="integer")
     */
    private $etage;
    /**
     * @ORM\Column (type="integer")
     */
    private $nombreLit;

}