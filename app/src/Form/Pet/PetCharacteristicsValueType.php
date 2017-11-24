<?php
/**
 * Created by PhpStorm.
 * User: alexis
 * Date: 24/11/17
 * Time: 14:30
 */

namespace App\Form\Pet;


use App\Entity\Pet\PetCharacteristic;
use App\Entity\Pet\PetCharacteristicValue;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PetCharacteristicsValueType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('value', null, [
                'required' => false,
            ])
            ->add('characteristic', PetCharacteristicsType::class, [
                'data_class' => PetCharacteristic::class,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PetCharacteristicValue::class,
        ]);
    }
}