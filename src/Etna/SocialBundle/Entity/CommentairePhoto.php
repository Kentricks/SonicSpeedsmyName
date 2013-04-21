<?php

namespace Etna\SocialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CommentairePhoto
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class CommentairePhoto
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
     * @ORM\Column(name="contenu", type="string", length=255)
     */
    private $contenu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_creation", type="date")
     */
    private $date_creation;

    /**
     * @ORM\ManyToOne(targetEntity="Photo", inversedBy="commentaires")
     * @ORM\JoinColumn(name="photo_id", referencedColumnName="id")
     */
    protected $membre;

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
     * Set contenu
     *
     * @param string $contenu
     * @return Commentaire_photo
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
    
        return $this;
    }

    /**
     * Get contenu
     *
     * @return string 
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set date_creation
     *
     * @param \DateTime $dateCreation
     * @return Commentaire_photo
     */
    public function setDateCreation($dateCreation)
    {
        $this->date_creation = $dateCreation;
    
        return $this;
    }

    /**
     * Get date_creation
     *
     * @return \DateTime 
     */
    public function getDateCreation()
    {
        return $this->date_creation;
    }

    /**
     * Set membre
     *
     * @param \Etna\SocialBundle\Entity\Photo $membre
     * @return Commentaire_photo
     */
    public function setMembre(\Etna\SocialBundle\Entity\Photo $membre = null)
    {
        $this->membre = $membre;
    
        return $this;
    }

    /**
     * Get membre
     *
     * @return \Etna\SocialBundle\Entity\Photo 
     */
    public function getMembre()
    {
        return $this->membre;
    }
}