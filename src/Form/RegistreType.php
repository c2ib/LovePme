<?php

namespace App\Form;

<<<<<<< HEAD
use App\Entity\Registre;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
=======
use App\Entity\RegistreTitre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
>>>>>>> 5bb005555c74dfbed583bc7762ecd99d32228700
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('quantity')
<<<<<<< HEAD
            ->add('prix_unitaire')
          //  ->add('created_at',DateType::class)
            ->add('action')
            ->add('stocholder')
=======
            //->add('created_at')
            ->add('prix_unitaire')
            ->add('action')
            ->add('user')
            ->add('auteur')
            ->add('valider',SubmitType::class)
>>>>>>> 5bb005555c74dfbed583bc7762ecd99d32228700
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
<<<<<<< HEAD
            'data_class' => Registre::class,
=======
            'data_class' => RegistreTitre::class,
>>>>>>> 5bb005555c74dfbed583bc7762ecd99d32228700
        ]);
    }
}
