<?php

namespace Etna\SocialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Entity\User as BaseUser;


/**
 * Membre
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Membre extends BaseUser
{


    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="genre", type="string", length=255, nullable=true)
     */
    private $genre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateNaissance", type="date", nullable=true)
     */
    private $dateNaissance;


    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @var integer
     *
     * @ORM\Column(name="codePostale", type="integer", nullable=true)
     */
    private $codePostale;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255, nullable=true)
     */
    private $ville;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateInscription", type="date", nullable=true)
     */
    private $dateInscription;

    /**
     * @var string
     *
     * @ORM\Column(name="urlPhoto", type="string", length=255, nullable=true)
     */
    private $urlPhoto;

    /**
     * @ORM\ManyToMany(targetEntity="Membre", mappedBy="mesAmis")
     */
    private $friendsWithMe;

    /**
     * @ORM\ManyToMany(targetEntity="Membre", inversedBy="AmiAvecMoi")
     * @ORM\JoinTable(name="Amis",
     *      joinColumns={@ORM\JoinColumn(name="membre_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="ami_membre_id", referencedColumnName="id")}
     *      )
     */
    private $myFriends;

    /**
     * @ORM\ManyToMany(targetEntity="Groupe", inversedBy="membres")
     */
    private $groupes;

    /**
     * @ORM\OneToMany(targetEntity="Photo", mappedBy="membre")
     */
    private $photos;

    /**
     * @ORM\OneToMany(targetEntity="Album", mappedBy="membre", cascade="persist")
     */
    private $albums;

    /**
     * @ORM\OneToMany(targetEntity="Statut", mappedBy="destinataire")
     */
    private $statuts;
    
        
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return Membre
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    
        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Membre
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    
        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set genre
     *
     * @param string $genre
     * @return Membre
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;
    
        return $this;
    }

    /**
     * Get genre
     *
     * @return string 
     */
    public function getGenre()
    {
        return $this->genre;
    }


    /**
     * Set email
     *
     * @param string $email
     * @return Membre
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     * @return Membre
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    
        return $this;
    }

    /**
     * Get adresse
     *
     * @return string 
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set ville
     *
     * @param string $ville
     * @return Membre
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    
        return $this;
    }

    /**
     * Get ville
     *
     * @return string 
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->dateInscription = new \DateTime();
        $this->friendsWithMe = new \Doctrine\Common\Collections\ArrayCollection();
        $this->myFriends = new \Doctrine\Common\Collections\ArrayCollection();
        $this->statuts = new \Doctrine\Common\Collections\ArrayCollection();
        //parent::__construct();
    }
    
    /**
     * Add friendsWithMe
     *
     * @param \Etna\SocialBundle\Entity\Membre $friendsWithMe
     * @return Membre
     */
    public function addFriendsWithMe(\Etna\SocialBundle\Entity\Membre $friendsWithMe)
    {
        $this->friendsWithMe[] = $friendsWithMe;
    
        return $this;
    }

    /**
     * Remove friendsWithMe
     *
     * @param \Etna\SocialBundle\Entity\Membre $friendsWithMe
     */
    public function removeFriendsWithMe(\Etna\SocialBundle\Entity\Membre $friendsWithMe)
    {
        $this->friendsWithMe->removeElement($friendsWithMe);
    }

    /**
     * Get friendsWithMe
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFriendsWithMe()
    {
        return $this->friendsWithMe;
    }

    /**
     * Add myFriends
     *
     * @param \Etna\SocialBundle\Entity\Membre $myFriends
     * @return Membre
     */
    public function addMyFriend(\Etna\SocialBundle\Entity\Membre $myFriends)
    {
        $this->myFriends[] = $myFriends;
    
        return $this;
    }

    /**
     * Remove myFriends
     *
     * @param \Etna\SocialBundle\Entity\Membre $myFriends
     */
    public function removeMyFriend(\Etna\SocialBundle\Entity\Membre $myFriends)
    {
        $this->myFriends->removeElement($myFriends);
    }

    /**
     * Get myFriends
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMyFriends()
    {
        return $this->myFriends;
    }

    /**
     * Add groupes
     *
     * @param \Etna\SocialBundle\Entity\Groupe $groupes
     * @return Membre
     */
    public function addGroupe(\Etna\SocialBundle\Entity\Groupe $groupes)
    {
        $this->groupes[] = $groupes;
    
        return $this;
    }

    /**
     * Remove groupes
     *
     * @param \Etna\SocialBundle\Entity\Groupe $groupes
     */
    public function removeGroupe(\Etna\SocialBundle\Entity\Groupe $groupes)
    {
        $this->groupes->removeElement($groupes);
    }

    /**
     * Get groupes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGroupes()
    {
        return $this->groupes;
    }

    /**
     * Add photos
     *
     * @param \Etna\SocialBundle\Entity\Photo $photos
     * @return Membre
     */
    public function addPhoto(\Etna\SocialBundle\Entity\Photo $photos)
    {
        $this->photos[] = $photos;
    
        return $this;
    }

    /**
     * Remove photos
     *
     * @param \Etna\SocialBundle\Entity\Photo $photos
     */
    public function removePhoto(\Etna\SocialBundle\Entity\Photo $photos)
    {
        $this->photos->removeElement($photos);
    }

    /**
     * Get photos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPhotos()
    {
        return $this->photos;
    }

    /**
     * Add albums
     *
     * @param \Etna\SocialBundle\Entity\Album $albums
     * @return Membre
     */
    public function addAlbum(\Etna\SocialBundle\Entity\Album $albums)
    {
        $this->albums[] = $albums;
    
        return $this;
    }

    /**
     * Remove albums
     *
     * @param \Etna\SocialBundle\Entity\Album $albums
     */
    public function removeAlbum(\Etna\SocialBundle\Entity\Album $albums)
    {
        $this->albums->removeElement($albums);
    }

    /**
     * Get albums
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAlbums()
    {
        return $this->albums;
    }

    /**
     * Add statuts
     *
     * @param \Etna\SocialBundle\Entity\Statut $statuts
     * @return Membre
     */
    public function addStatut(\Etna\SocialBundle\Entity\Statut $statuts)
    {
        $this->statuts[] = $statuts;
    
        return $this;
    }

    /**
     * Remove statuts
     *
     * @param \Etna\SocialBundle\Entity\Statut $statuts
     */
    public function removeStatut(\Etna\SocialBundle\Entity\Statut $statuts)
    {
        $this->statuts->removeElement($statuts);
    }

    /**
     * Get statuts
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getStatuts()
    {
        return $this->statuts;
    }

    /**
     * Set dateNaissance
     *
     * @param \DateTime $dateNaissance
     * @return Membre
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;
    
        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return \DateTime 
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set codePostale
     *
     * @param integer $codePostale
     * @return Membre
     */
    public function setCodePostale($codePostale)
    {
        $this->codePostale = $codePostale;
    
        return $this;
    }

    /**
     * Get codePostale
     *
     * @return integer 
     */
    public function getCodePostale()
    {
        return $this->codePostale;
    }

    /**
     * Set dateInscription
     *
     * @param \DateTime $dateInscription
     * @return Membre
     */
    public function setDateInscription($dateInscription)
    {
        $this->dateInscription = $dateInscription;
    
        return $this;
    }

    /**
     * Get dateInscription
     *
     * @return \DateTime 
     */
    public function getDateInscription()
    {
        return $this->dateInscription;
    }

    /**
     * Set urlPhoto
     *
     * @param string $urlPhoto
     * @return Membre
     */
    public function setUrlPhoto($urlPhoto)
    {
        $this->urlPhoto = $urlPhoto;
    
        return $this;
    }

    /**
     * Get urlPhoto
     *
     * @return string 
     */
    public function getUrlPhoto()
    {
        return $this->urlPhoto;
    }
}