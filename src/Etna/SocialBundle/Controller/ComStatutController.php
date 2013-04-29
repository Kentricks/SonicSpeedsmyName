<?php
namespace Etna\SocialBundle\Controller;
use Etna\SocialBundle\Form\Type\ComStatutFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Etna\SocialBundle\Entity\Statut;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\Response;

use FOS\UserBundle\FOSUserEvents;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Cookie;
use Etna\SocialBundle\Entity\CommentaireStatut;

class ComStatutController extends Controller
{

    public function newAction(Request $request)
    {
        if ($request->getMethod() == 'GET') {
            $statut = $request->attributes->get('statut');
            $url = $request->attributes->get('url');
            $response = new Response($url);
            $response->headers->setCookie(new Cookie('url',$url));
            $response->sendHeaders();

        }

        if ($request->getMethod() == 'POST') {
            $url = $request->cookies->get('url');
            $statut = $request->get('statut');
        }

        $name_dest = substr($url ,1);

        $user_exp = $this->container->get('security.context')->getToken()->getUser();

        $com = new CommentaireStatut();
        $com->setDateCreation(new \DateTime('now'));

        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('EtnaSocialBundle:Statut');

        $stat = $repository->find($statut);

        $com->setStatut($stat);
        $com->setExpediteur($user_exp);

        $form = $this->createForm(new ComStatutFormType(), $com);
        if ($request->getMethod() == 'POST') {

            $form->bind($request);


                $em = $this->getDoctrine()->getManager();
                $em->persist($com);
                $em->flush();
                return $this->redirect($this->generateUrl('etna_social_profile',array('username'=> $name_dest)));

        }

        return $this->render('EtnaSocialBundle:Elements:comStatutForm.html.twig', array(
            'form' => $form->createView(), 'statut' => $statut
        ));

    }


    public function showAction(Request $request, $url='default', $statut='default')
    {
        $statut = $request->attributes->get('statut');

        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('EtnaSocialBundle:CommentaireStatut');
        $coms = $repository->findBy(array('statut' => $statut));

        return $this->render('EtnaSocialBundle:Elements:comStatut.html.twig', array(
            'coms' => $coms,
        ));
    }
}
