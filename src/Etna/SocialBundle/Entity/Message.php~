<?php

namespace Etna\SocialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Message
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Message
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
     * @ORM\Column(name="objet", type="string", length=255)
     */
    private $objet;

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
     * @ORM\ManyToOne(targetEntity="Membre")
     * @ORM\JoinColumn(name="expediteur_id", referencedColumnName="id")
     */
    private $expediteur;
    
     /**
     * @ORM\ManyToMany(targetEntity="Membre")
     * @ORM\JoinTable(name="messages_destinataires",
     *      joinColumns={@ORM\JoinColumn(name="message_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="destinataire_id", referencedColumnName="id")}
     *      )
     */
    private $destinataires;
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
     * Set objet
     *
     * @param string $objet
     * @return Message
     */
    public function setObjet($objet)
    {
        $this->objet = $objet;
    
        return $this;
    }

    /**
     * Get objet
     *
     * @return string 
     */
    public function getObjet()
    {
        return $this->objet;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     * @return Message
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
     * @return Message
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
     * Constructor
     */
    public function __construct()
    {
        $this->destinataires = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Set expediteur
     *
     * @param \Etna\SocialBundle\Entity\Membre $expediteur
     * @return Message
     */
    public function setExpediteur(\Etna\SocialBundle\Entity\Membre $expediteur = null)
    {
        $this->expediteur = $expediteur;
    
        return $this;
    }

    /**
     * Get expediteur
     *
     * @return \Etna\SocialBundle\Entity\Membre 
     */
    public function getExpediteur()
    {
        return $this->expediteur;
    }

    /**
     * Add destinataires
     *
     * @param \Etna\SocialBundle\Entity\Membre $destinataires
     * @return Message
     */
    public function addDestinataire(\Etna\SocialBundle\Entity\Membre $destinataires)
    {
        $this->destinataires[] = $destinataires;
    
        return $this;
    }

    /**
     * Remove destinataires
     *
     * @param \Etna\SocialBundle\Entity\Membre $destinataires
     */
    public function removeDestinataire(\Etna\SocialBundle\Entity\Membre $destinataires)
    {
        $this->destinataires->removeElement($destinataires);
    }

    /**
     * Get destinataires
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDestinataires()
    {
        return $this->destinataires;
    }
}