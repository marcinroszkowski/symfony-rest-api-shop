<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\HasLifecycleCallbacks;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\PrePersist;
use Doctrine\ORM\Mapping\PreUpdate;
use Doctrine\ORM\Mapping\Table;

#[Table(name: 'orders')]
#[Entity]
#[HasLifecycleCallbacks]
class Order
{
    #[Id]
    #[GeneratedValue]
    #[Column]
    private int $id;

    #[ManyToOne(targetEntity: Client::class, inversedBy: 'orders')]
    #[JoinColumn(nullable: false)]
    private int $clientId;

    #[Column]
    private int $value;

    #[OneToMany(targetEntity: OrderItem::class, mappedBy: 'order', cascade: ['persist'])]
    private Collection $items;

    #[Column(type: 'datetime')]
    private $createdAt;

    #[Column(type: 'datetime')]
    private $updatedAt;

    public function __construct()
    {
        $this->items = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setClientId(int $clientId): self
    {
        $this->clientId = $clientId;

        return $this;
    }

    public function getClientId(): int
    {
        return $this->clientId;
    }

    public function setValue(int $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getItems(): Collection
    {
        return $this->items;
    }

    #[PrePersist]
    public function setCreatedAtValue(): self
    {
        $this->createdAt = new \DateTimeImmutable();
        $this->setUpdatedAtValue();

        return $this;
    }

    #[PreUpdate]
    public function setUpdatedAtValue(): self
    {
        $this->updatedAt = new \DateTimeImmutable();

        return $this;
    }

    public function getOrderValue(): int
    {
        $orderValue = 0;
        /** @var OrderItem $item */
        foreach ($this->getItems() as $item) {
            $orderValue += $item->getValue();
        }

        return $orderValue;
    }
}