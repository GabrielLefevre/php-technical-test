<?php

namespace App\Form;

use App\Entity\Running;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\GreaterThan;

class RunningType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('start')
            ->add('duration', TimeType::class, [
                'label' => 'Duration (hours, minutes)',
               /* 'constraints' => [
                    new GreaterThan([
                        'value' => '00:00',
                        'message' => 'This value should be greater than 00:00'])
                ]*/
            ])
            ->add('distance', NumberType::class, [
                'label' => 'Distance (km)'
            ])
            ->add('comment')
            ->add('type')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Running::class,
        ]);
    }
}
