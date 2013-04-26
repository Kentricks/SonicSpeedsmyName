<?php

namespace Etna\SocialBundle\Controller;
use Etna\SocialBundle\Form\Type\StatutFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Etna\SocialBundle\Entity\Statut;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\Response;

use FOS\UserBundle\FOSUserEvents;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Cookie;

class StatutController extends Controller
{
    public function newAction(Request $request, $url='helo')
    {
        if ($request->getMethod() == 'GET') {
            $url = $request->attributes->get('url');
            $response = new Response($url);

            $response->headers->setCookie(new Cookie('url', $url));
            $response->sendHeaders();
        }

        if ($request->getMethod() == 'POST') {
            $url = $request->cookies->get('url');
        }

        $name_dest = substr($url ,1);

        $user_exp = $this->container->get('security.context')->getToken()->getUser();
        $user_dest = $this->container->get('fos_user.user_manager')->loadUserByUsername($name_dest);

        $statut = new Statut();

        $statut->setDateCreation(new \DateTime('now'));
        $statut->setExpediteur($user_exp);
        $statut->setDestinataire($user_dest);

        $form = $this->createForm(new StatutFormType(), $statut);

        if ($request->getMethod() == 'POST') {

            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($statut);
                $em->flush();
                return $this->redirect($this->generateUrl('etna_social_profile',array('username'=> $name_dest)));
            }
        }

        return $this->render('EtnaSocialBundle:Elements:statutForm.html.twig', array(
            'form' => $form->createView(),
        ));

    }
}