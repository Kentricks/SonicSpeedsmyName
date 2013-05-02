<?php
namespace Etna\SocialBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationFormType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder->add('nom', 'text')
            ->add('prenom', 'text')
            ->add('genre', 'choice', array(
                'choices'   => array('Homme' => 'Homme', 'Femme' => 'Femme'),
            ))
            ->add('date_naissance', 'birthday', array(
                'format' => 'dd-MM-yyyy',
                'years' => range(1950, date('Y'))
            ));
    }
    public function getName()
    {
        return 'etna_user_registration';
    }

}

?>