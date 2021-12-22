<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $name;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="category")
     */
    private int $user;

    /**
     * @ORM\ManyToMany(targetEntity=destination::class, inversedBy="categories")
     */
    private int $destination;

    public function __construct()
    {
        $this->destination = new ArrayCollection();
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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|destination[]
     */
    public function getDestination(): Collection
    {
        return $this->destination;
    }

    public function addDestination(destination $destination): self
    {
        if (!$this->destination->contains($destination)) {
            $this->destination[] = $destination;
        }

        return $this;
    }

    public function removeDestination(destination $destination): self
    {
        $this->destination->removeElement($destination);

        return $this;
    }
}
