<?php

namespace App\Entity\Pet;

use App\Entity\Contact;
use App\Entity\Location;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource
 * @ORM\Entity
 * @ORM\Table(name="pet")
 */
class Pet
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
     * @ORM\Column(type="string", length=30)
     */
    private $name;

    /**
     * @var string
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    private $status;

    /**
     * @var PetCharacteristicValue[]
     * @ORM\ManyToMany(targetEntity="PetCharacteristicValue")
     * @ORM\JoinTable(name="pet_to_pet_characteristics_value",
     *      joinColumns={@ORM\JoinColumn(name="pet_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="pet_characteristics_value_id", referencedColumnName="id")}
     * )
     */
    private $characteristics;

    /**
     * @var Location
     * @ORM\ManyToOne(targetEntity="App\Entity\Location")
     * @ORM\JoinColumn(name="location", referencedColumnName="id")
     */
    private $location;

    /**
     * @var PetType
     * @ORM\ManyToOne(targetEntity="PetType")
     * @ORM\JoinColumn(name="pet_type_id", referencedColumnName="id")
     */
    private $type;


    /**
     * @var Contact
     * @ORM\ManyToOne(targetEntity="App\Entity\Contact")
     * @ORM\JoinColumn(name="contact_id", referencedColumnName="id")
     */
    private $contact;

    /**
     * Pet constructor.
     */
    public function __construct()
    {
        $this->characteristics = new PetCharacteristicValueCollection();
    }

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
     * @return Pet
     */
    public function setName(string $name): Pet
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Pet
     */
    public function setDescription(string $description): Pet
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     * @return Pet
     */
    public function setStatus(int $status): Pet
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return PetCharacteristicValue[]
     */
    public function getCharacteristics(): array
    {
        return $this->characteristics;
    }

    public function addCharacteristic(PetCharacteristicValue $characteristic)
    {
        if (!$this->characteristics->contains($characteristic)) {
            $this->characteristics[] = $characteristic;
        }

        return $this;
    }

    /**
     * @param PetCharacteristicValue[] $characteristics
     * @return Pet
     */
    public function setCharacteristics(array $characteristics): Pet
    {
        foreach ($characteristics as $characteristic) {
            $this->addCharacteristic($characteristic);
        }

        return $this;
    }

    /**
     * @return Location
     */
    public function getLocation(): Location
    {
        return $this->location;
    }

    /**
     * @param Location $location
     * @return Pet
     */
    public function setLocation(Location $location): Pet
    {
        $this->location = $location;
        return $this;
    }

    /**
     * @return PetType
     */
    public function getType(): PetType
    {
        return $this->type;
    }

    /**
     * @param PetType $type
     * @return Pet
     */
    public function setType(PetType $type): Pet
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return Contact
     */
    public function getContact(): Contact
    {
        return $this->contact;
    }

    /**
     * @param Contact $contact
     * @return Pet
     */
    public function setContact(Contact $contact): Pet
    {
        $this->contact = $contact;
        return $this;
    }
}