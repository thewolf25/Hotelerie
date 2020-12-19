<?php

namespace UserBundle\Controller;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request ;
use Symfony\Component\HttpFoundation\Response;
use UserBundle\Entity\Client;
class DefaultController extends Controller
{
    protected $container;

    public function indexAction()
    {
        return $this->render('UserBundle:Default:index.html.twig');
    }


    public function signupAction(Request $request,ObjectManager $manager){


        $user = new Client();
        $user->setNom($request->request->get('nom'));
        $user->setPrenom($request->request->get('prenom'));
        $user->setEmail($request->request->get('email'));
        $user->setUsername($request->request->get('username'));
        $encoder = $this->container->get('security.password_encoder');
        $password = $encoder->encodePassword($user, $request->request->get('password'));
        $user->setPassword($password);
        $user->setTelephone($request->request->get('telephone') );
        $user->setIdentity($request->request->get('identity'));



        // 4) save the User!
        $manager = $this->getDoctrine()->getManager();
        $manager->persist($user);
        $manager->flush();


        $response = new Response(
            'Content',
            Response::HTTP_OK,
            ['content-type' => 'text/html']
        );


        $response->setContent($request->request->get('nom'));
        return $response;
    }
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
}
