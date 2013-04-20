<?php

namespace Etna\SocialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentaire_statut
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Commentaire_statut
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @ORM\ManyToOne(targetEntity="Statut", inversedBy="commentaires")
     * @ORM\JoinColumn(name="statut_id", referencedColumnName="id")
     */
    protected $statut;

    /**
     * Set contenu
     *
     * @param string $contenu
     * @return Commentaire_statut
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
     * @return Commentaire_statut
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
     * Set statut
     *
     * @param \Etna\SocialBundle\Entity\Statut $statut
     * @return Commentaire_statut
     */
    public function setStatut(\Etna\SocialBundle\Entity\Statut $statut = null)
    {
        $this->statut = $statut;
    
        return $this;
    }

    /**
     * Get statut
     *
     * @return \Etna\SocialBundle\Entity\Statut 
     */
    public function getStatut()
    {
        return $this->statut;
    }
}