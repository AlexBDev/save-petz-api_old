<?php
/**
 * Created by PhpStorm.
 * User: alexis
 * Date: 24/11/17
 * Time: 13:59
 */

namespace App\Form\Pet;

use App\Entity\Pet\Pet;
use App\Form\ContactType;
use App\Form\LocationType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('status')
            ->add('characteristics', CollectionType::class,[
                'entry_type' => PetCharacteristicsValueType::class,
            ])
            ->add('location', LocationType::class)
            ->add('type', PetTypeType::class)
            ->add('contact', ContactType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Pet::class,
        ]);
    }
}