<?php

namespace App\DataFixtures\ORM;


use App\Entity\Pet\PetCharacteristic;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

final class PetCharacteristicFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $characteristics = [
            'size' => 'Taille',
            'color' => 'Couleur',
            'chip' => 'Puce',
            'tatoo' => 'Tatouage',
            'necklace' => 'Colier',
            'fur' => 'Poil',
            'eye' => 'Yeux',
            'race_dog' => 'Race',
        ];

        foreach ($characteristics as $name => $label) {
            $ch = (new PetCharacteristic())->setName($name)->setLabel($label);
            $manager->persist($ch);
            $this->addReference($name, $ch);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}