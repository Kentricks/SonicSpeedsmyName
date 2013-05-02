<?php

namespace Etna\SocialBundle\Controller;

use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\FilterUserResponseEvent;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\Model\UserInterface;
use FOS\UserBundle\Model\UserManager;
use Symfony\Component\HttpFoundation\Request;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Etna\SocialBundle\Entity\Membre;
use Etna\SocialBundle\Entity\Message;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Cookie;
use Etna\SocialBundle\Form\Type\MessageFormType;

class MessageController extends Controller
{
    public function indexAction($username)
    {
        return $this->render('EtnaSocialBundle:Pages:message.html.twig', array('username'=> $username

        ));
    }

    public function newAction(Request $request)
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

        $mess = new Message();

        $mess->setDateCreation(new \DateTime('now'));
        $mess->setExpediteur($user_exp);

        $form = $this->createForm(new MessageFormType(), $mess);

        if ($request->getMethod() == 'POST') {

            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($mess);
                $em->flush();
                return $this->redirect($this->generateUrl('etna_social_profile',array('username'=> $name_dest)));
            }
        }

        return $this->render('EtnaSocialBundle:Elements:messageForm.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
