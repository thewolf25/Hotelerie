<?php


namespace ChambreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 */
class Season
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column (type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $dateStart;
    /**
     * @ORM\Column  (type="date")
     */
    private $dateEnd;
    /**
     * @ORM\Column (type="float")
     */
    private $addition;
    /**
     * @ORM\Column (type="float")
     */
    private $lowering;


}