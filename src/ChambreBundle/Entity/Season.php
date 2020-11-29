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
     */
    private $id;

    /**
     * @Column (type=date)
     */
    private $dateStart;
    /**
     * @Column (type=date)
     */
    private $dateEnd;
    /**
     * @ORM\Column (type=float)
     */
    private $addition;
    /**
     * @ORM\Column (type=float)
     */
    private $lowering;


}