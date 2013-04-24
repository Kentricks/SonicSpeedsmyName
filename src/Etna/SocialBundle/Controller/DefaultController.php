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

    public function forgotAction()
    {
        $formBuilder = $this->createFormBuilder();
        $formBuilder
            ->add('email', 'email');
        $form = $formBuilder->getForm();
        $request = $this->get('request');

        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->flush();

                return $this->redirect($this->generateUrl('etna_social_login'));
            }
        }
        $form->bind($request);
        return $this->render('EtnaSocialBundle:Default:forgot.html.twig', array('form' => $form->createView(),
        ));
    }
}