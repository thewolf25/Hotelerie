<?php

namespace ChambreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ChambreBundle:Default:index.html.twig');
    }
}
