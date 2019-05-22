<?php

namespace App\Form;

use App\Entity\Séance;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SeanceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Date', DateType::class, [
                'format' => 'yyyy MM dd',
            ])
            ->add('Heure', TimeType::class, [
                'input'  => 'datetime',
                'widget' => 'choice',
            ])
            ->add('Salle_fk')
            ->add('Film_fk');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Séance::class,
        ]);
    }
}
