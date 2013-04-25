<?php

namespace Etna\SocialBundle\Controller;

use Etna\SocialBundle\Form\Type\StatutFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Etna\SocialBundle\Entity\Statut;
use Symfony\Component\BrowserKit\Request;

class StatutController extends Controller
{
    public function newAction(Request $request)
    {
        $statut = new Statut();
        $form = $this->createForm(new StatutFormType(), $statut);
          //  ->add('statut', 'text')
           // ->getForm();

        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {
                // perform some action, such as saving the task to the database

                return $this->redirect($this->generateUrl('task_success'));
            }
        }

        return $this->render('EtnaSocialBundle:Pages:profile.html.twig', array(
            'form' => $form->createView(),
        ));

    }
}