<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request ;
use Symfony\Component\HttpFoundation\Response;
use UserBundle\Entity\Client;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use UserBundle\Form\SignupForm;
use UserBundle\Entity\User;
class DefaultController extends Controller
{

    public function indexAction()
    {
        return $this->render('UserBundle:Default:index.html.twig');
    }


    public function saveAction(Request $request,UserPasswordEncoderInterface $encoder){


        $user1 = new Client($request->request->get('nom'), $request->request->get('prenom'),$request->request->get('email'), $request->request->get('telephone') ,$request->request->get('username'), $request->request->get('password'), $request->request->get('identity'));
        $user1->setPassword($encoder->encodePassword($user1,"ddd"));
        $em = $this->container->get('doctrine')->getEnityManager();
        $em->persist($user1);

        $em->flush();


        $response = new Response(
            'Content',
            Response::HTTP_OK,
            ['content-type' => 'text/html']
        );


        $response->setContent($request->request->get('nom'));
        return $response;
    }




    public function inscriptionAction(Request $request,UserPasswordEncoderInterface $encoder){

        $user = new Client();
        $form = $this->createForm(SignupForm::class,$user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $hash = $encoder->encodePassword($user,$user->getPassword());
            $user->setPassword($hash);
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            return $this->redirectToRoute('add_reservation', array('id' => $user->getId()));
        }
        return $this->render("@User/Default/inscription.html.twig",
            array(
            'form' => $form->createView()
        ));
    }

    public function loginAction(Request $request){
        return $this->render('@User/Default/login.html.twig');
    }

    public function logoutAction(){

    }

}
