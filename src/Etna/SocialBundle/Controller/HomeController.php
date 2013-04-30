<?php

namespace Etna\SocialBundle\Controller;

use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\FilterUserResponseEvent;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\Model\UserInterface;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Etna\SocialBundle\Entity\Membre;

class HomeController extends Controller
{
	public function indexAction()
	{
		$user = $this->container->get('security.context')->getToken()->getUser();
		$prenom = $user->getPrenom();

		//Recup amis
        $friend_doctrine = $this->getDoctrine()
        	->getRepository('EtnaSocialBundle:Membre')
        	->find($user);
        $all_friend = $friend_doctrine->getMyfriends();

        //Recup Status
        $statutRep = $this->getDoctrine()
            ->getRepository('EtnaSocialBundle:Statut');
        $coms = array();
        foreach($all_friend as $friend) {
            $coms = array_merge($coms, $statutRep->findBy(array("expediteur" => $friend)));
        }

		return $this->render('EtnaSocialBundle:Pages:home.html.twig', array(
			'prenom' => $prenom,
            'coms' => $coms
		));
	}
}
?>