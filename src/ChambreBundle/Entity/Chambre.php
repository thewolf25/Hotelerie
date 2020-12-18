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
     * @return mixed
     */
    public function getNumChambre()
    {
        return $this->numChambre;
    }

    /**
     * @param mixed $numChambre
     */
    public function setNumChambre($numChambre)
    {
        $this->numChambre = $numChambre;
    }

    /**
     * @return mixed
     */
    public function getTelephoneChambre()
    {
        return $this->telephoneChambre;
    }

    /**
     * @param mixed $telephoneChambre
     */
    public function setTelephoneChambre($telephoneChambre)
    {
        $this->telephoneChambre = $telephoneChambre;
    }

    /**
     * @return mixed
     */
    public function getEtage()
    {
        return $this->etage;
    }

    /**
     * @param mixed $etage
     */
    public function setEtage($etage)
    {
        $this->etage = $etage;
    }

    /**
     * @return mixed
     */
    public function getNombreLit()
    {
        return $this->nombreLit;
    }

    /**
     * @param mixed $nombreLit
     */
    public function setNombreLit($nombreLit)
    {
        $this->nombreLit = $nombreLit;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }
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
     * @ORM\Column (type="string",nullable=true)
     */
    private $description;

    /**
     *
     * @ORM\OneToMany(targetEntity="ChambreBundle\Entity\Media", mappedBy="chambre")
     */
    private $image;

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }


    /**
     * @ORM\ManyToOne(targetEntity="ChambreBundle\Entity\Category", inversedBy="chambre")
     */
    private $category;

    /**
     * Chambre constructor.

     */

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