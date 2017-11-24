<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="contact")
 */
class Contact
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
    private $firstname;

    /**
     * @var string
     * @ORM\Column(type="string", length=30)
     */
    private $lastname;

    /**
     * @var string
     * @ORM\Column(type="string", length=20)
     */
    private $phone;

    /**
     * @var Location
     * @ORM\OneToOne(targetEntity="Location")
     * @ORM\JoinColumn(name="location", referencedColumnName="id")
     */
    private $location;

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     * @return Contact
     */
    public function setFirstname(string $firstname): Contact
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     * @return Contact
     */
    public function setLastname(string $lastname): Contact
    {
        $this->lastname = $lastname;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     * @return Contact
     */
    public function setPhone(string $phone): Contact
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return Location
     */
    public function getLocation(): ?Location
    {
        return $this->location;
    }

    /**
     * @param Location $location
     * @return Contact
     */
    public function setLocation(Location $location): Contact
    {
        $this->location = $location;
        return $this;
    }
}