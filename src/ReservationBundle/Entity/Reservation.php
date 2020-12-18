<?php


namespace ReservationBundle\Entity;


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
     * @ORM\Column (type="date",nullable=false)
     */
    private $dateStart;
    /**
     * @ORM\Column (type="date",nullable=false)
     */
    private $dateEnd;


    /**
     * @ORM\ManyToOne(targetEntity="ReservationBundle\Entity\Hosting", inversedBy="reservation")
     */
    private $hosting;


    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User", inversedBy="reservation")
     */
    private $client;

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