<?php


namespace ReservationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 */

class Hosting
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
    private $label;

    /**
     * @ORM\Column (type="float",nullable=false)
     */
    private $price;


    /**
     * @ORM\OneToMany(targetEntity="ReservationBundle\Entity\Reservation", mappedBy="hosting")
     */
    private $reservation;

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
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param mixed $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

}