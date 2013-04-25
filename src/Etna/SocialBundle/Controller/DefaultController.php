<?php

namespace Etna\SocialBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Etna\SocialBundle\Entity\Membre;
use FOS\UserBundle\Controller\RegistrationController as SonicController;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('EtnaSocialBundle:Default:index.html.twig', array('name' => $name));
    }
}