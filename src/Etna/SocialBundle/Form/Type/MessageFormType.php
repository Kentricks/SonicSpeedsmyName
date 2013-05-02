<?php

namespace Etna\SocialBundle\Form\Type;

use Symfony\Component\Form\AbstractType as Base;
use Symfony\Component\Form\FormBuilderInterface;


class MessageFormType extends Base
{
    public function getDefaultOptions(array $options)
    {
        return array(
            'virtual' => true,
            'data_class' => 'Etna\SocialBundle\Entity\Membre',

        );
    }


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
//        if($options['choices'])
  //      {
        $builder->add('objet', 'text',  array('attr' => array('placeholder' => 'Objet'), 'label' => false))
            ->add('contenu', 'textarea', array(
            'attr' => array('rows' => 2, 'class' => '', 'placeholder' => 'Ecrire'), 'label' => false))
            ->add('myFriends', new MessageFormType(), array(
                'data_class' => 'Etna\SocialBundle\Entity\Membre'));

        /*
        else
        {
           $builder->add('objet', 'text',  array('attr' => array('placeholder' => 'Objet'), 'label' => false))
        ->add('contenu', 'textarea', array(
            'attr' => array('rows' => 2, 'class' => '', 'placeholder' => 'Ecrire'), 'label' => false));
        } */
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