<?php


namespace ReservationBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 */


class Reservation
{
    /**
     * @ORM\GeneratedValue
     * @ORM\Id
     * @ORM\Column(type="integer")
     *
     */
    private $id;
    /**
     * @ORM\Column (type="integer",nullable=false)
     */
    private $adulte_number;
    /**
     * @ORM\Column (type="integer",nullable=true)
     */
    private $childen_number;
    /**
     * @ORM\Column (type="float",nullable=true)
     */
    private $price;

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

    /**
     * @ORM\Column (type="date",nullable=false)
     * @Assert\GreaterThan("yesterday")
     */
    private $dateStart;
    /**
     * @ORM\Column (type="date",nullable=false)
     * @Assert\GreaterThan(propertyPath="dateStart",message="date invalide !! ")
     *
     */
    private $dateEnd;

    /**
     * @return mixed
     */
    public function getAdulteNumber()
    {
        return $this->adulte_number;
    }

    /**
     * @param mixed $adulte_number
     */
    public function setAdulteNumber($adulte_number)
    {
        $this->adulte_number = $adulte_number;
    }

    /**
     * @return mixed
     */
    public function getChildenNumber()
    {
        return $this->childen_number;
    }

    /**
     * @param mixed $childen_number
     */
    public function setChildenNumber($childen_number)
    {
        $this->childen_number = $childen_number;
    }

    /**
     * @return mixed
     */
    public function getDateStart()
    {
        return $this->dateStart;
    }

    /**
     * @param mixed $dateStart
     */
    public function setDateStart($dateStart)
    {
        $this->dateStart = $dateStart;
    }

    /**
     * @return mixed
     */
    public function getDateEnd()
    {
        return $this->dateEnd;
    }

    /**
     * @param mixed $dateEnd
     */
    public function setDateEnd($dateEnd)
    {
        $this->dateEnd = $dateEnd;
    }

    /**
     * @return mixed
     */
    public function getHosting()
    {
        return $this->hosting;
    }

    /**
     * @param mixed $hosting
     */
    public function setHosting($hosting)
    {
        $this->hosting = $hosting;
    }

    /**
     * @return mixed
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param mixed $client
     */
    public function setClient($client)
    {
        $this->client = $client;
    }


    /**
     * @ORM\ManyToOne(targetEntity="ReservationBundle\Entity\Hosting", inversedBy="reservation")
     */
    private $hosting;


    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User", inversedBy="reservation")
     */
    private $client;

    /**
     * @ORM\OneToMany(targetEntity="ChambreBundle\Entity\Chambre", mappedBy="reservation")
     */
    private $chambres;

    /**
     * @ORM\OneToOne(targetEntity="ReservationBundle\Entity\Invoices", inversedBy="reservation")
     */

    private $invoice;
    /**
     * @return mixed
     */
    public function getChambres()
    {
        return $this->chambres;
    }

    /**
     * @param mixed $chambres
     */
    public function setChambres($chambres)
    {
        $this->chambres = $chambres;
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

    public function getCurrentDate(){
        return date(Y-m-d);
    }

}