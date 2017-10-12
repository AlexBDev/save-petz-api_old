<?php

namespace App\Entity\Pet;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource
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
}