<?php

namespace Etna\SocialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Membre
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Membre
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="genre", type="string", length=255)
     */
    private $genre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_naissance", type="date")
     */
    private $date_naissance;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;

    /**
     * @var integer
     *
     * @ORM\Column(name="code_postale", type="integer")
     */
    private $code_postale;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255)
     */
    private $ville;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_inscription", type="date")
     */
    private $date_inscription;

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
     * @ORM\OneToMany(targetEntity="Album", mappedBy="membre")
     */
    private $albums;

    /**
     * @ORM\OneToMany(targetEntity="Statut", mappedBy="membre")
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
     * Set date_naissance
     *
     * @param \DateTime $dateNaissance
     * @return Membre
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->date_naissance = $dateNaissance;
    
        return $this;
    }

    /**
     * Get date_naissance
     *
     * @return \DateTime 
     */
    public function getDateNaissance()
    {
        return $this->date_naissance;
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
     * Set code_postale
     *
     * @param integer $codePostale
     * @return Membre
     */
    public function setCodePostale($codePostale)
    {
        $this->code_postale = $codePostale;
    
        return $this;
    }

    /**
     * Get code_postale
     *
     * @return integer 
     */
    public function getCodePostale()
    {
        return $this->code_postale;
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
     * Set date_inscription
     *
     * @param \DateTime $dateInscription
     * @return Membre
     */
    public function setDateInscription($dateInscription)
    {
        $this->date_inscription = $dateInscription;
    
        return $this;
    }

    /**
     * Get date_inscription
     *
     * @return \DateTime 
     */
    public function getDateInscription()
    {
        return $this->date_inscription;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->friendsWithMe = new \Doctrine\Common\Collections\ArrayCollection();
        $this->myFriends = new \Doctrine\Common\Collections\ArrayCollection();
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
}