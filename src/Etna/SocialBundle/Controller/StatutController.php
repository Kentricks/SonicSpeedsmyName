<?php

namespace Etna\SocialBundle\Controller;

use Etna\SocialBundle\Form\Type\StatutFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class StatutController extends Controller
{
    public function newAction()
    {

        $form = $this->createForm(new StatutFormType());
        return $this->render('EtnaSocialBundle:Pages:profile.html.twig', array(
            'form' => $form->createView(),
        ));

    }
}