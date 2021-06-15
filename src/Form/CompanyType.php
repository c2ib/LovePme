<?php

namespace App\Form;

use App\Entity\Company;
use App\Entity\FormeLegale;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompanyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('telephone')
            ->add('adresse')
            ->add('code_postal')
            ->add('city')
//            ->add('logo')
                ->add('forme_legale',EntityType::class,[
                    'class'=> FormeLegale::class,
                    'choice_label'=> 'name'
            ])
            ->add('rcs')
            ->add('siret')
//            ->add('formLegal')
//            ->add('isActive')
            ->add('valeurNominal')
            ->add('codeValeur')
            ->add('siteweb')
//            ->add('motDuPresident')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Company::class,
        ]);
    }
}
