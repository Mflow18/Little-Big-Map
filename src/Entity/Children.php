<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ChildrenRepository")
 */
class Children
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $number;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\User", mappedBy="children")
     */
    private $users;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getUsers(): ?User
    {
        return $this->users;
    }

    public function setUsers(User $users): self
    {
        $this->users = $users;

        // set the owning side of the relation if necessary
        if ($users->getChildren() !== $this) {
            $users->setChildren($this);
        }

        return $this;
    }
}
