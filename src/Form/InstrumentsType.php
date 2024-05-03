<?php

namespace App\Form;

use App\Entity\Familly;
use App\Entity\Instruments;
use App\Entity\Subfamilly;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InstrumentsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('libelle')
            ->add('type')
            ->add('img')
            ->add('familly', EntityType::class, [
                'class' => Familly::class,
                'choice_label' => 'id',
            ])
            ->add('subfamilly', EntityType::class, [
                'class' => Subfamilly::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Instruments::class,
        ]);
    }
}
