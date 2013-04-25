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

class FriendController extends Controller
{
    public function getFriendAction($username)
    {
      $user = $this->container->get('fos_user.user_manager')->loadUserByUsername($username);
      $id = $user->getId();
      $nom = $user->getNom();
      $prenom = $user->getPrenom();
      $genre = $user->getGenre();
      $img = $user->getUrlPhoto();
      /* To get all friends  */
      $friend_doctrine = $this->getDoctrine()
	->getRepository('EtnaSocialBundle:Membre')
	->find($id);
      $all_friend = $friend_doctrine->getMyfriends();
      foreach($all_friend as $friend)
	{
	  $id_friend = $friend->getId();
	  $username_friend = $friend->getNom();
	  $prenom_friend = $friend->getPrenom();
	  $img_friend = $friend->getUrlPhoto();
	  $info_friend['nom'] = $username_friend;
	  $info_friend['prenom'] = $prenom_friend;
	  $info_friend['image'] = $img_friend;
	  $test[$id_friend] = $info_friend;
	  //$test[$id_friend] = $id_friend;
	  $info_friend = array();
	}
      //print_r($test);
      return $this->render('EtnaSocialBundle:Pages:friend.html.twig', array(
									    'username' => $username,
									    'nom' => $nom,
									    'prenom' => $prenom,
									    'genre' => $genre,
									    'img' => $img,
									    'id' => $id,
									    'friend' => $friend,
									    'test' => $test
									    ));
    }
}
?>