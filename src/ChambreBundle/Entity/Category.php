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

}