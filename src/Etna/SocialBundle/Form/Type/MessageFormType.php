<?php

namespace Etna\SocialBundle\Form\Type;

use Symfony\Component\Form\AbstractType as Base;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Request;
use Etna\SocialBundle\Entity\Membre;
use Doctrine\ORM\EntityRepository;

class MessageFormType extends Base
{
    /*
    private $friends;

    public function __construct($friends){
        $this->friends = $friends;
    }
      */


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //$friends = $this->friends;
        $builder->add('objet', 'text',  array('attr' => array('placeholder' => 'Objet'), 'label' => false))
            ->add('contenu', 'textarea', array(
            'attr' => array('rows' => 2, 'class' => '', 'placeholder' => 'Ecrire'), 'label' => false))
            ->add('destinataires', 'entity', array(
                'class' => 'Etna\SocialBundle\Entity\Membre',
    'query_builder' => function(EntityRepository $repository)  {
        return $repository->createQueryBuilder('q')
            ;
    }));

    }


    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'etna_social_ecrire_message';
    }

}