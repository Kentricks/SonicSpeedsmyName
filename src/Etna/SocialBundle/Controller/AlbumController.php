<?php

namespace Etna\SocialBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


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
            $info_album['cover'] = $info_album['photos'][0];
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
}