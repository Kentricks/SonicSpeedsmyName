<?php

namespace Etna\SocialBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('EtnaSocialBundle:Default:index.html.twig', array('name' => $name));
    }
}
