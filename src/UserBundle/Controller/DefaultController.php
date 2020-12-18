<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request ;
use Symfony\Component\HttpFoundation\Response;
use UserBundle\Entity\Client;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('UserBundle:Default:index.html.twig');
    }


    public function signupAction(Request $request,UserPasswordEncoderInterface $encoder){


        $user = new Client($request->request->get('nom'), $request->request->get('prenom'),$request->request->get('email'), $request->request->get('telephone') ,$request->request->get('username'), $request->request->get('password'), $request->request->get('identity'));

        $user->setPassword($encoder->encodePassword($user1,"ddd"));



        $em = $this->container->get('doctrine')->getEnityManager();
        $em->persist($user);

        $em->flush();


        $response = new Response(
            'Content',
            Response::HTTP_OK,
            ['content-type' => 'text/html']
        );


        $response->setContent($request->request->get('nom'));
        return $response;
    }
}
