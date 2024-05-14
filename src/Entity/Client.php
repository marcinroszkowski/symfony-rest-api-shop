<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;

#[Table(name: 'clients')]
#[Entity]
class Client
{
    #[Id]
    #[GeneratedValue]
    #[Column]
    private int $id;

    #[Column(length: 255)]
    private string $name;

    #[OneToMany(targetEntity: Order::class, mappedBy: 'client')]
    private Collection $orders;

    public function getId(): int
    {
        return $this->id;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getOrders(): Collection
    {
        return $this->orders;
    }
}