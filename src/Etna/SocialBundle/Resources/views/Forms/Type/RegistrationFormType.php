<?php
namespace Etna\SocialBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationFormType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder->add('name')
            ->add('nom', 'text')
            ->add('prenom', 'text')
            ->add('genre', 'choice', array(
                'choices'   => array('m' => 'Homme', 'f' => 'Femme'),
            ));
    }
    public function getName()
    {
        return 'etna_user_registration';
    }

}

?>