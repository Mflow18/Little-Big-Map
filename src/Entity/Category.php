<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 */
class Category
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", mappedBy="categories")
     */
    private $users;

    /**
     * @ORM\OneToMany(targetEntity="Detail", mappedBy="category")
     */
    private $details;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->details = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addCategory($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            $user->removeCategory($this);
        }

        return $this;
    }

    /**
     * @return Collection|Detail[]
     */
    public function getHobbies(): Collection
    {
        return $this->details;
    }

    public function addHobby(Detail $hobby): self
    {
        if (!$this->details->contains($hobby)) {
            $this->details[] = $hobby;
            $hobby->setCategory($this);
        }

        return $this;
    }

    public function removeHobby(Detail $hobby): self
    {
        if ($this->details->contains($hobby)) {
            $this->details->removeElement($hobby);
            // set the owning side to null (unless already changed)
            if ($hobby->getCategory() === $this) {
                $hobby->setCategory(null);
            }
        }

        return $this;
    }
}
