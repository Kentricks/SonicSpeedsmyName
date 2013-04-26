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
      $statuts = $user->getStatuts();
      /* To get all friends  */
      $friend_doctrine = $this->getDoctrine()
	->getRepository('EtnaSocialBundle:Membre')
	->find($id);
      $all_friend = $friend_doctrine->getMyfriends();
      if (count($all_friend) == 0) {
	$nofriend = false;
	$allfriends = false;
      }
      foreach($all_friend as $friend)
	{
	  $username_friend = $friend->getUsername();
	  $name_friend = $friend->getNom();
	  $prenom_friend = $friend->getPrenom();
	  $img_friend = $friend->getUrlPhoto();
	  $info_friend['username'] = $username_friend;
	  $info_friend['nom'] = $name_friend;
	  $info_friend['prenom'] = $prenom_friend;
	  $info_friend['img'] = $img_friend;
	  $allfriends[$username_friend] = $info_friend;
	  $info_friend = array();
	  $nofriend = true;
	}
      //print_r($test);
      return $this->render('EtnaSocialBundle:Friends:friend.html.twig', array(
									    'username' => $username,
									    'nom' => $nom,
									    'prenom' => $prenom,
									    'genre' => $genre,
									    'img' => $img,
									    'id' => $id,
									    'statuts' => $statuts,
									    'allfriends' => $allfriends,
									    'nofriend' => $nofriend
									    ));
    }

    public function findFriendAction($username)
    {
      /* To get all members  */
      $member_doctrine = $this->getDoctrine()
        ->getRepository('EtnaSocialBundle:Membre')
        ->findAll();
      foreach($member_doctrine as $member) {
	$username_member = $member->getUsername();
	if ($username_member != $username) {
	  $name_member = $member->getNom();
	  $prenom_member = $member->getPrenom();
	  $img_member = $member->getUrlPhoto();
	  $info_member['username'] = $username_member;
	  $info_member['nom'] = $name_member;
	  $info_member['prenom'] = $prenom_member;
	  $info_member['img'] = $img_member;
	  $allmembers[$username_member] = $info_member;
	  $info_member = array();
	  $nomember = true;
	}
      }
      /* To delete my friends of members  */
      $user = $this->container->get('fos_user.user_manager')->loadUserByUsername($username);
      $id = $user->getId();
      $friend_doctrine = $this->getDoctrine()
        ->getRepository('EtnaSocialBundle:Membre')
        ->find($id);
      $all_friend = $friend_doctrine->getMyfriends();
      foreach($all_friend as $friend) {
	foreach($allmembers as $key => $value)
	  {
	    if ($key == $friend)
	      unset($allmembers[$key]);
	  }
      }
      return $this->render('EtnaSocialBundle:Friends:findfriend.html.twig', array(
										  'username' => $username_member,
									    'allmembers' => $allmembers
									    ));
    }

    public function removeFriendAction($username, $username_friend)
    {
      /* To delete my friends of members  */
      $user = $this->container->get('fos_user.user_manager')->loadUserByUsername($username_friend);
      $id = $user->getId();
      $friend_doctrine = $this->getDoctrine()
        ->getRepository('EtnaSocialBundle:Membre')
        ->find($id);
      //echo $friend_doctrine;
      $friend_doctrine->removeMyFriend($friend_doctrine);
      return $this->render('EtnaSocialBundle:Friends:removefriend.html.twig', array(
										    'username' => $username,
										    'username_friend' => $username_friend
										    ));
    }

    public function addFriendAction($username, $username_friend)
    {
      /* To delete my friends of members  */
      $user = $this->container->get('fos_user.user_manager')->loadUserByUsername($username_friend);
      $id = $user->getId();
      $friend_doctrine = $this->getDoctrine()
        ->getRepository('EtnaSocialBundle:Membre')
        ->find($id);
      //echo $friend_doctrine;
      $friend_doctrine->addMyFriend($friend_doctrine);
      return $this->render('EtnaSocialBundle:Friends:addfriend.html.twig', array(
                                                                                    'username' => $username,
                                                                                    'username_friend' => $username_friend
                                                                                    ));
    }
}
?>