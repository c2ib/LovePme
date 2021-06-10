<?php

namespace App\Form;

use App\Entity\Company;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class NewCompanyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('description', TextType::class)
            ->add('telephone', IntergerType::class)
            ->add('adresse', TextType::class)
            ->add('code_postal', IntergerType::class)
            ->add('logo', TextType::class)
            ->add('rcs', TextType::class)
            ->add('siret', IntegerType::class)
            ->add('formLegal', TextType::class)
            ->add('isActive', IntegerType::class)
            ->add('valeurNominal', TextType::class)
            ->add('codeValeur', TextType::class)
            ->add('siteweb', TextType::class)
            ->add('motDuPresident', TextareaType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => NewCompany::class,
        ]);
    }
}