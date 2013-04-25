<?php

namespace Etna\SocialBundle\Form\Type;

use Symfony\Component\Form\AbstractType as Base;
use Symfony\Component\Form\FormBuilderInterface;


class StatutFormType extends Base
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('text2', 'textarea', array(
        'attr' => array('rows' => 3)
        ));
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'etna_social_statut';
    }
}