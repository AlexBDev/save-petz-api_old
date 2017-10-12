<?php

namespace App\Entity\Pet;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="pet_type_characteristic_value")
 */
class PetCharacteristicValue
{
    /**
     * @var int The id of this book.
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $value;

    /**
     * @var PetCharacteristic
     * @ORM\ManyToOne(targetEntity="PetCharacteristic")
     * @ORM\JoinColumn(name="pet_characteristic_id", referencedColumnName="id")
     */
    private $characteristic;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return PetCharacteristicValue
     */
    public function setValue(string $value): PetCharacteristicValue
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return PetCharacteristic
     */
    public function getCharacteristic(): PetCharacteristic
    {
        return $this->characteristic;
    }

    /**
     * @param PetCharacteristic $characteristic
     * @return PetCharacteristicValue
     */
    public function setCharacteristic(PetCharacteristic $characteristic): PetCharacteristicValue
    {
        $this->characteristic = $characteristic;
        return $this;
    }
}