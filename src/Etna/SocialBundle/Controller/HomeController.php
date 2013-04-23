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
		$nom = $user->getNom();
		$prenom = $user->getPrenom();
		return $this->render('EtnaSocialBundle:Pages:home.html.twig', array(
			'nom' => $nom,
			'prenom' => $prenom));
	}
}
?>