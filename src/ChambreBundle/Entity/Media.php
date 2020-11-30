<?php


namespace ChambreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 */
class Media
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
    private $imageUrl;
}