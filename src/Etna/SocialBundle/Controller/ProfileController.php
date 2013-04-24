<?php

namespace Etna\SocialBundle\Controller;

use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\FilterUserResponseEvent;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\Model\UserInterface;
use FOS\UserBundle\Model\UserManager;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Etna\SocialBundle\Entity\Membre;

class ProfileController extends Controller
{
    public function indexAction($username)
    {

        $user = $this->container->get('fos_user.user_manager')->loadUserByUsername($username);
        //$userManager = $this->loadUserByUsername($userManage);
        //$user = $this->loadUserByUsername($userManager);
        //$user = UserManager->findUserByUsername($username);
        //$user = $this->container->get('security.context')->getToken()->getUser();
        $nom = $user->getNom();
        $prenom = $user->getPrenom();
        $genre = $user->getGenre();
        $img = $user->getUrlPhoto();
        return $this->render('EtnaSocialBundle:Pages:profile.html.twig', array(
            'username' => $username,
            'nom' => $nom,
            'prenom' => $prenom,
            'genre' => $genre,
            'img' => $img
        ));
    }
}
?>