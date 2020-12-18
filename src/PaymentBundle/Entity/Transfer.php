<?php


namespace PaymentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**

 * @ORM\Entity
 */
class Transfer extends Payment
{
    /**
     * @ORM\Column (type="string", length=14)
     */
    private $codeCompte;

    /**
     * @return mixed
     */
    public function getCodeCompte()
    {
        return $this->codeCompte;
    }

    /**
     * @param mixed $codeCompte
     */
    public function setCodeCompte($codeCompte)
    {
        $this->codeCompte = $codeCompte;
    }
}