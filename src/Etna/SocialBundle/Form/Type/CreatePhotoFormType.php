<?php
namespace Etna\SocialBundle\Form\Type;

use Symfony\Component\Form\AbstractType as Base;
use Symfony\Component\Form\FormBuilderInterface;

class CreatePhotoFormType extends Base
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', 'text')
            ->add('file', 'file');
    }

    public function getName()
    {
        return 'etna_social_add_photo';
    }
}

?>