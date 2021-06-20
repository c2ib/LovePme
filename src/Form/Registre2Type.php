<?php

namespace App\Form;

use App\Entity\Registre2;
use Doctrine\DBAL\Types\DateTimeType;
use Doctrine\DBAL\Types\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Registre2Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('quantity')
            ->add('prix_unitaire')
            ->add('created_at',\Symfony\Component\Form\Extension\Core\Type\DateType::class,['label' => 'date de naissance', 'widget' => 'single_text'])
            ->add('action')
            ->add('stockholder')
            ->add('valider',SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Registre2::class,
        ]);
    }
}
