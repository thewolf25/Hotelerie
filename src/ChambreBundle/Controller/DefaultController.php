<?php

namespace ChambreBundle\Controller;
use ChambreBundle\Form\ChambreForm;
use Symfony\Component\HttpFoundation\Request ;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use ChambreBundle\Entity\Chambre;
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

    public function getSingleChambreAction($id){

        $em = $this->container->get('doctrine')->getEntityManager();
        $chambre = $em->getRepository('ChambreBundle:Chambre')->find($id);
        return $this->render("@Chambre/Default/singleChambre.html.twig",array(
            'chambre' =>  $chambre
        ));
    }


    public function updateChambreAction(Request $request,$id){
        $em = $this->getDoctrine()->getManager();
        $Chambre = $em->getRepository('ChambreBundle:Chambre')->find($id);
        $editform = $this->createForm(ChambreForm::class,$Chambre);

        $editform->handleRequest($request);
        if($editform->isSubmitted() && $editform->isValid())
        {
            $em->persist($Chambre);
            $em->flush();

            return $this->redirect(
                $this->generateUrl("chambre_homepage")
            );
        }

        return $this->render("@Chambre/Default/updateChambre.html.twig",
            array(
                'Form'=>$editform->createView()
            )
        );
    }

    public function supprimerChambreAction(Request $request,$id){
        $em = $this->getDoctrine()->getManager();
        $chambre = $em->getRepository('ChambreBundle:Chambre')->find($id);
        if($chambre !==null){
            $em->remove($chambre);
            $em->flush();

        }
        else{
            throw new NotFoundHttpException( "La chambre d'id = ".$id."n'existe pas");
        }
        return $this->redirectToRoute("chambre_homepage");

    }


    public function addChambreAction(Request $request){
        $Chambre = new Chambre();
        $form = $this->createForm(ChambreForm::class,$Chambre);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $em =$this->getDoctrine()->getManager();
            $em->persist($Chambre);
            $em->flush();

            return $this->redirect(
                $this->generateUrl("chambre_homepage")
            );
        }

        return $this->render("@Chambre/Default/addChambre.html.twig",
            array(
                'Form'=>$form->createView()
            )
        );
    }
}
