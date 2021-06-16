<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            ->add('roles')
            ->add('password')
            ->add('isVerified')
            ->add('created')
            ->add('modified')
            ->add('lastLoginDate')
            ->add('birthDate')
            ->add('lastName')
            ->add('firstName')
            ->add('phone')
            ->add('adresse')
            ->add('zip_code')
            ->add('city')
            ->add('actions')
            ->add('civilite')
            ->add('type')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
