<?php

namespace Etna\SocialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Statut
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Statut
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
     * @ORM\ManyToOne(targetEntity="Membre", inversedBy="statut")
     * @ORM\JoinColumn(name="membre_id", referencedColumnName="id")
     */
    protected $membre;

    /**
     * @ORM\OneToMany(targetEntity="Commentaire_statut", mappedBy="statut")
     */
    private $commentaires;

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
     * @return Statut
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
     * @return Statut
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
     * @param \Etna\SocialBundle\Entity\Membre $membre
     * @return Statut
     */
    public function setMembre(\Etna\SocialBundle\Entity\Membre $membre = null)
    {
        $this->membre = $membre;
    
        return $this;
    }

    /**
     * Get membre
     *
     * @return \Etna\SocialBundle\Entity\Membre 
     */
    public function getMembre()
    {
        return $this->membre;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->commentaires = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add commentaires
     *
     * @param \Etna\SocialBundle\Entity\Commentaire_statut $commentaires
     * @return Statut
     */
    public function addCommentaire(\Etna\SocialBundle\Entity\Commentaire_statut $commentaires)
    {
        $this->commentaires[] = $commentaires;
    
        return $this;
    }

    /**
     * Remove commentaires
     *
     * @param \Etna\SocialBundle\Entity\Commentaire_statut $commentaires
     */
    public function removeCommentaire(\Etna\SocialBundle\Entity\Commentaire_statut $commentaires)
    {
        $this->commentaires->removeElement($commentaires);
    }

    /**
     * Get commentaires
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCommentaires()
    {
        return $this->commentaires;
    }
}