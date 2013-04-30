<?php

namespace Etna\SocialBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Etna\SocialBundle\Entity\Album;
use Symfony\Component\HttpFoundation\Response;
use Etna\SocialBundle\Form\Type\CreateAlbumFormType;

class AlbumController extends Controller {
    public function getAlbumAction($username)
    {
        $user = $this->container->get('fos_user.user_manager')->loadUserByUsername($username);
        $id = $user->getId();
        $album_doctrine = $this->getDoctrine()
            ->getRepository('EtnaSocialBundle:Membre')
            ->find($id);
        $all_album = $album_doctrine->getAlbums();
        if (count($all_album) == 0) {
            $noalbum = false;
            $allalbums = false;
        }
        foreach($all_album as $album)
        {
            $id_album = $album->getId();
            $info_album['nom'] = $album->getNom();
            $info_album['photos'] = $album->getPhotos();
            if (isset($info_album['photos'][0])) {
                $info_album['cover'] = $info_album['photos'][0];
                $info_album['cover'] = $info_album['cover']->getUrl();
            }
            else {
                $info_album['cover'] = "/2sn/web/img/inco.png";
            }
            $allalbums[$id_album] = $info_album;
            $info_album = array();
            $noalbum = true;
        }
        return $this->render('EtnaSocialBundle:Albums:albums.html.twig', array(
            'username' => $username,
            'id' => $id,
            'allalbums' => $allalbums,
            'noalbum' => $noalbum
        ));
    }

    public function addAlbumAction($username)
    {
        $user = $this->container->get('fos_user.user_manager')->loadUserByUsername($username);
        $id = $user->getId();
        $user = $this->getDoctrine()
            ->getRepository('EtnaSocialBundle:Membre')
            ->find($id);
        $album = new Album();
        $form = $this->createForm(new CreateAlbumFormType(), $album);
        $form->setData($album);

        if ($this->getRequest()->isMethod('POST'))
        {
            $form->bind($this->getRequest());
            if ($form->isValid())
            {
                $em = $this->getDoctrine()->getManager();
                $album->setDateCreation(new \DateTime('now'));
                $album->setMembre($user);

                $em->persist($album);

                $user->addAlbum($album);
                $em->flush();
            }
            return $this->redirect($this->generateUrl('etna_social_get_albums',array('username'=> $username)));
        }
        return $this->render('EtnaSocialBundle:Albums:addalbum.html.twig', array(
            'username' => $username,
            'form' => $form->createView()
        ));
    }

    public function removeAlbumAction($username, $albumname)
    {
        $user = $this->container->get('fos_user.user_manager')->loadUserByUsername($username);
        $id = $user->getId();
        $album = $user->getAlbumFrom($albumname);
        $album_id = $album->getId();

        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('EtnaSocialBundle:Membre')->find($id);
        $album = $em->getRepository('EtnaSocialBundle:Album')->find($album_id);
        $user->removeAlbum($album);
        $album->setMembre(null);
        $em->flush();
        return $this->redirect($this->generateUrl('etna_social_get_albums',array('username'=> $username, 'albumname' => $albumname)));    }
}