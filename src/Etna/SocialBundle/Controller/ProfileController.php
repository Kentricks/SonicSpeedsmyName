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
use Etna\SocialBundle\Entity\Statut;

class ProfileController extends Controller
{
    public function indexAction($username)
    {
        $user = $this->container->get('fos_user.user_manager')->loadUserByUsername($username);

        $nom = $user->getNom();
        $prenom = $user->getPrenom();
        $genre = $user->getGenre();
        $img = $user->getUrlPhoto();

        $statuts = $user->getStatuts();

        //Statut
        return $this->render('EtnaSocialBundle:Pages:profile.html.twig', array(
            'username' => $username,
            'nom' => $nom,
            'prenom' => $prenom,
            'genre' => $genre,
            'img' => $img,
            'statuts' => $statuts
        ));
    }



}
?>