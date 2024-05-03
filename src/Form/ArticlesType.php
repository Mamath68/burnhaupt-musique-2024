<?php

namespace App\Form;

use App\Entity\Articles;
use App\Entity\Instruments;
use App\Entity\Providers;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticlesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('stock')
            ->add('price')
            ->add('provider', EntityType::class, [
                'class' => Providers::class,
                'choice_label' => 'id',
            ])
            ->add('instruments', EntityType::class, [
                'class' => Instruments::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Articles::class,
        ]);
    }
}
