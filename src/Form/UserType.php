<?php

namespace App\Form;

use App\Entity\Civil;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
//            ->add('roles')
//            ->add('isVerified')
//            ->add('created')
//            ->add('modified')
//            ->add('lastLoginDate')
            ->add('birthDate', DateType::class,['label' => 'date de naissance', 'widget' => 'single_text'])
            ->add('lastName')
            ->add('firstName')
            ->add('password')
            ->add('phone')
            ->add('adresse')
            ->add('zip_code')
            ->add('city')
            ->add('civility', EntityType::class,[
                'class' =>Civil::class,
                'choice_label' => 'titre'
            ])
//            ->add('actions')
//            ->add('type')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
