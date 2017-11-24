<?php
/**
 * Created by PhpStorm.
 * User: alexis
 * Date: 24/11/17
 * Time: 14:27
 */

namespace App\Form\Pet;

use App\Entity\Pet\PetType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PetTypeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PetType::class,
        ]);
    }
}