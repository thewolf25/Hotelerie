<?php


namespace ChambreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 */

class Category
{
    /**
     * @ORM\GeneratedValue
     * @ORM\Id
     * @ORM\Column(type="integer")
     *
     */
    private $id;

    /**
     * @ORM\Column (type="float")
     */
    private $prix_base;

    /**
     * @ORM\Column (type="string", nullable=false)
     */
    private $libelle;

    /**
     * @ORM\OneToMany(targetEntity="ChambreBundle\Entity\Chambre", mappedBy="category")
     */
    private $chambre;

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
     * @return mixed
     */
    public function getPrixBase()
    {
        return $this->prix_base;
    }

    /**
     * @param mixed $prix_base
     */
    public function setPrixBase($prix_base)
    {
        $this->prix_base = $prix_base;
    }

    /**
     * @return mixed
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @param mixed $libelle
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }

    /**
     * @return mixed
     */
    public function getChambre()
    {
        return $this->chambre;
    }

    /**
     * @param mixed $chambre
     */
    public function setChambre($chambre)
    {
        $this->chambre = $chambre;
    }

}