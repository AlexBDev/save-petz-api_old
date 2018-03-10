<?php

namespace App\DataFixtures\ORM;


use App\Entity\Pet\PetCharacteristicValue;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

final class PetCharacteristicValueFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        /**
         * @param callable $callback
         * @param int $size
         * @return array
         */
        $iterator = function(callable $callback, int $size = 100) {
            $data = [];

            for ($i = 0; $i < $size; $i++) {
                $data[] = $callback($i);
            }

            return $data;
        };

        $definitions = [
            'color' => [
                'Noir',
                'Blanc',
                'Marron',
                'Rouge',
            ],
            "size" => [
                'Petit',
                'Moyen',
                'Grand',
            ],
            "chip" => $iterator(function() { return md5(uniqid()); }),
            "tatoo" => $iterator(function() { return md5(uniqid()); }),
            "necklace" => $iterator(function($i) { return $i % 2; }),
            "fur" => [
                'Court',
                'Moyen',
                'Long',
            ],
            "eye" => [
                'Noir',
                'Blanc',
                'Marron',
                'Rouge',
            ],
            "race_dog" => self::getDogRaces(),
        ];

        foreach ($definitions as $reference => $values) {
            foreach ($values as $value) {
                $ch = (new PetCharacteristicValue())
                    ->setCharacteristic($this->getReference($reference))
                    ->setValue($value);

                $manager->persist($ch);
            }
        }

        $manager->flush();
    }

    /**
     * @return array
     */
    private static function getDogRaces(): array
    {
        $raw = file_get_contents(__DIR__.'/../../../fixtures/data/dog_races');

        return array_map(function($value) {
            return trim(trim($value, '\n'));
        }, explode(',', $raw));
    }

    public function getOrder()
    {
        return 2;
    }
}