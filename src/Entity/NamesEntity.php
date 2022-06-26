<?php
namespace App\Entity;

use App\Repository\NamesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Name
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $secondName;

    // getter and setter methods

    public function getId()
    {
        return $this->id;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName()
    {
        $this->firstName = $firstName;
    }

    public function getSecondName()
    {
        return $this->secondName;
    }

    public function setSecondName()
    {
        $this->secondName = $secondName;
    }
}