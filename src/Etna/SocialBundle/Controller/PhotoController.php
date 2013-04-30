<?php

namespace Etna\SocialBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Etna\SocialBundle\Entity\Photo;
use Etna\SocialBundle\Entity\Album;
use Symfony\Component\HttpFoundation\Response;
use Etna\SocialBundle\Form\Type\CreatePhotoFormType;

class PhotoController extends Controller {
    public function getPhotosAction($username, $albumname)
    {
        $user = $this->container->get('fos_user.user_manager')->loadUserByUsername($username);
        $id = $user->getId();
        $album_doctrine = $this->getDoctrine()
            ->getRepository('EtnaSocialBundle:Membre')
            ->find($id);
//        $all_album = $album_doctrine->getAlbums();
//        $album = $all_album[0];
        $album = $album_doctrine->getAlbumFrom($albumname);
        $photos = $album->getPhotos();
        if (count($photos) == 0) {
            $nophoto = false;
            $allphoto = false;
        }
        foreach($photos as $photo)
        {
            $id_photo = $photo->getId();
            $info_photo['nom'] = $photo->getNom();
            $info_photo['url'] = $photo->getUrl();
            $info_photo['commentaires'] = $photo->getCommentaires();
            $allphoto[$id_photo] = $info_photo;
            $info_photo = array();
            $nophoto = true;
        }
        return $this->render('EtnaSocialBundle:Photos:photos.html.twig', array(
            'username' => $username,
            'albumname' => $albumname,
            'id' => $id,
            'allphoto' => $allphoto,
            'nophoto' => $nophoto
        ));
    }

    public function addphotoAction($username, $albumname)
    {
        $user = $this->container->get('fos_user.user_manager')->loadUserByUsername($username);
        $id = $user->getId();
        $user = $this->getDoctrine()
            ->getRepository('EtnaSocialBundle:Membre')
            ->find($id);
        $photo = new Photo();
        $form = $this->createForm(new CreatePhotoFormType(), $photo);
        $form->setData($photo);

        if ($this->getRequest()->isMethod('POST'))
        {
            $form->bind($this->getRequest());
            if ($form->isValid())
            {
                $em = $this->getDoctrine()->getManager();
                $photo->setUrl('/2sn/web/uploads/'.$username.'/'.$photo->file->getClientOriginalName());
                $photo->setDateCreation(new \DateTime('now'));
                $photo->setMembre($user);
                $photo->upload($username);

                $em->persist($photo);
                $albums = $user->getAlbums();
                $isset_default = false;
                foreach ($albums as $album)
                {
                    if ($album->getNom() == $albumname)
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
            return $this->redirect($this->generateUrl('etna_social_get_photos',array('username'=> $username, 'albumname' => $albumname)));
        }
        return $this->render('EtnaSocialBundle:Photos:addphoto.html.twig', array(
            'username' => $username,
            'albumname' => $albumname,
            'form' => $form->createView()
        ));
    }
}