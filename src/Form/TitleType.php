<?php

namespace App\Form;

use App\Entity\Company;
use App\Entity\Title;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TitleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
//            ->add('created')
            ->add('typetitle')
            ->add('company')
//            ->add('company', EntityType::class,[
//                'class' => Company::class,
//                'choice_label'=> 'name'
//            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Title::class,
        ]);
    }
}
