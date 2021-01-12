<?php

namespace ReservationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {


        $em = $this->container->get('doctrine')->getEntityManager();
        $chambres = $em->getRepository('ChambreBundle:Chambre')->findAll();


        return $this->render("@Reservation/Default/reservation.html.twig",array(
            'chambres' =>  $chambres
        ));
    }
}
