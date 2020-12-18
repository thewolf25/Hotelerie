<?php

namespace ChambreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function listchambresAction()
    {

        $em = $this->container->get('doctrine')->getEntityManager();
        $chambres = $em->getRepository('ChambreBundle:Chambre')->findAll();


        return $this->render("@Chambre/Default/chambre.html.twig",array(
            'chambres' =>  $chambres
        ));


    }
}
