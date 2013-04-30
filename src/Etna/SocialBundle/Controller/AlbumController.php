<?php

namespace Etna\SocialBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Etna\SocialBundle\Entity\Photo;
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

    public function addalbumAction($username)
    {
        $user = $this->container->get('fos_user.user_manager')->loadUserByUsername($username);
        $id = $user->getId();
        $user = $this->getDoctrine()
            ->getRepository('EtnaSocialBundle:Membre')
            ->find($id);
        $photo = new Photo();
        $form = $this->createForm(new CreateAlbumFormType(), $photo);
        $form->setData($photo);

        if ($this->getRequest()->isMethod('POST'))
        {
            $form->bind($this->getRequest());
            if ($form->isValid())
            {
                $em = $this->getDoctrine()->getManager();
                $photo->setUrl('/2sn/web/uploads/'.$username);
                $photo->setDateCreation(new \DateTime('now'));
                $photo->setMembre($user);
                $photo->upload($username);

                $em->persist($photo);
                $albums = $user->getAlbums();
                $isset_default = false;
                foreach ($albums as $album)
                {
                    if ($album->getNom() == 'Default')
                    {
                        $album->addPhoto($photo);
                        $isset_default = true;
                    }
                }
                if ($isset_default === false)
                {
                    $new_album = new Album();
                    $new_album->setNom('Default');
                    $new_album->setDateCreation(new \DateTime('now'));
                    $new_album->setMembre($user);
                    $new_album->addPhoto($photo);
                    $user->addAlbum($new_album);
                }
                $user->addPhoto($photo);
                $em->flush();
            }
        }
        return $this->render('EtnaSocialBundle:Albums:addalbum.html.twig', array(
            'username' => $username,
            'form' => $form->createView()
        ));
    }
}