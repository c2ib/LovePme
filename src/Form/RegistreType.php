<?php

namespace App\Form;

use App\Entity\RegistreTitre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('quantity')
            //->add('created_at')
            ->add('prix_unitaire')
            ->add('action')
            ->add('user')
            ->add('auteur')
            ->add('valider',SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RegistreTitre::class,
        ]);
    }
}
