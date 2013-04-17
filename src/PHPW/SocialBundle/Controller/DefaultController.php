<?php

namespace PHPW\SocialBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('PHPWSocialBundle:Default:index.html.twig', array('name' => $name));
    }
}
