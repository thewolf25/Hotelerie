<?php
namespace UserBundle\DataFixtures\ORM;



use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use UserBundle\Entity\Client;

class LoadUserData implements ORMFixtureInterface, ContainerAwareInterface {

    private $container;

    public function load(ObjectManager $manager)
    {
        $user = new Client();
        $user->setUsername('admin');
        $user->setEmail('admin@admin.com');
        $user->setNom('admin');
        $user->setPrenom('admin');

        $user->setTelephone('56464872' );
        $user->setIdentity('45564');
        $encoder = $this->container->get('security.password_encoder');
        $password = $encoder->encodePassword($user, 'pass');
        $user->setPassword($password);

        $manager->persist($user);
        $manager->flush();
    }

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
}