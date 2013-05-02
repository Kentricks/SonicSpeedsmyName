<?php

namespace Etna\SocialBundle\Controller;
use Etna\SocialBundle\Form\Type\ComPhotoFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Etna\SocialBundle\Entity\CommentairePhoto;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\Response;

use FOS\UserBundle\FOSUserEvents;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Cookie;

class ComPhotoController extends Controller
{
    public function addComAction($username, $albumname, $photoid)
    {
        $user = $this->container->get('fos_user.user_manager')->loadUserByUsername($username);
        $id = $user->getId();
        $album_doctrine = $this->getDoctrine()
            ->getRepository('EtnaSocialBundle:Membre')
            ->find($id);
        $album = $album_doctrine->getAlbumFrom($albumname);
        $photo = $album->getPhotoById($photoid);
        $commentaire = new CommentairePhoto();
        $form = $this->createForm(new ComPhotoFormType(), $commentaire);
        $form->setData($commentaire);

        if ($this->getRequest()->isMethod('POST'))
        {
            $form->bind($this->getRequest());
            if ($form->isValid())
            {
                $em = $this->getDoctrine()->getManager();
                $commentaire->setDateCreation(new \DateTime('now'));
                $user_exp = $this->container->get('security.context')->getToken()->getUser();
                $commentaire->setExpediteur($user_exp);
                $commentaire->setPhoto($photo);

                $em->persist($commentaire);

                $photo->addCommentaire($commentaire);
                $em->flush();
            }
            return $this->redirect($this->generateUrl('etna_social_display_photo',array('username'=> $username, 'albumname' => $albumname, 'photoid' => $photoid)));
        }
        return $this->render('EtnaSocialBundle:Elements:comPhotoForm.html.twig', array(
            'form' => $form->createView(),
            'username'=> $username, 'albumname' => $albumname, 'photoid' => $photoid
        ));
    }
}