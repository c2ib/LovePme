<?php

namespace App\Form;

use App\Entity\Registre;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use App\Entity\RegistreTitre;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('quantity')
            ->add('prix_unitaire')
          //  ->add('created_at',DateType::class)
            ->add('action')
            ->add('stocholder')
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
            'data_class' => Registre::class,
            'data_class' => RegistreTitre::class,
        ]);
    }
}
