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
    private $id;
    /**
     * @ORM\Column (type="integer",unique=true)
     */
    private $numChambre;

    /**
     * @ORM\Column (type="integer",unique=true,nullable=true)
     */
    private $telephoneChambre;

    /**
     * @ORM\Column (type="integer",nullable=false)
     */
    private $etage;
    /**
     * @ORM\Column (type="integer",nullable=false)
     */
    private $nombreLit;


    /**
     * @ORM\OneToMany(targetEntity="ChambreBundle\Entity\Media", mappedBy="chambre_id")
     */
    private $image;


    /**
     * @ORM\ManyToOne(targetEntity="ChambreBundle\Entity\Category", inversedBy="chambre")
     */
    private $category;

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

}