<?php

namespace App\Entity\Pet;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="pet_characteristic")
 */
class PetCharacteristic
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
     * @ORM\Column(type="string", length=40, unique=true)
     */
    private $name;

    /**
     * @var string
     * @ORM\Column(type="string", length=40)
     */
    private $label;

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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return PetCharacteristic
     */
    public function setName(string $name): PetCharacteristic
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getLabel(): ?string
    {
        return $this->label;
    }

    /**
     * @param string $label
     * @return PetCharacteristic
     */
    public function setLabel(string $label): PetCharacteristic
    {
        $this->label = $label;
        return $this;
    }
}