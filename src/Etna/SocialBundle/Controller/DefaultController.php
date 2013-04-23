<?php

namespace Etna\SocialBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Etna\SocialBundle\Entity\Membre;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('EtnaSocialBundle:Default:index.html.twig', array('name' => $name));
    }
    public function ajouterAction()
    {
    	$membre = new Membre();

    	$formBuilder = $this->createFormBuilder($membre);
    	$formBuilder
    		->add('nom', 'text')
    		->add('prenom', 'text')
    		->add('genre', 'choice', array(
    'choices'   => array('m' => 'Homme', 'f' => 'Femme'),
    ))
    		->add('email', 'email')
    		->add('password', 'password');
		$form = $formBuilder->getForm();
		return $this->render('EtnaSocialBundle:Default:newcompte.html.twig', array('form' => $form->createView(),
			));
    }
}