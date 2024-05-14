<?php

namespace App\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\HasLifecycleCallbacks;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\PrePersist;
use Doctrine\ORM\Mapping\PreUpdate;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table('orders_items')]
#[HasLifecycleCallbacks]
class OrderItem
{
    #[Id]
    #[GeneratedValue]
    #[Column]
    private int $id;

    #[ManyToOne(targetEntity: Order::class, inversedBy: 'items')]
    private Order $order;

    #[ManyToOne(targetEntity: Product::class)]
    private Product $product;

    #[Column]
    private int $quantity;

    #[Column(type: 'datetime')]
    private $createdAt;

    #[Column(type: 'datetime')]
    private $updatedAt;

    public function getId(): int
    {
        return $this->id;
    }

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function setProduct(Product $product): self
    {
        $this->product = $product;

        return $this;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getOrder(): Order
    {
        return $this->order;
    }

    public function setOrder(Order $order): self
    {
        $this->order = $order;

        return $this;
    }

    #[PrePersist]
    public function setCreatedAtValue(): void
    {
        $this->createdAt = new \DateTimeImmutable();
        $this->setUpdatedAtValue();
    }

    #[PreUpdate]
    public function setUpdatedAtValue(): void
    {
        $this->updatedAt = new \DateTimeImmutable();
    }

    public function getValue(): int
    {
        return $this->getProduct()->getPrice() * $this->getQuantity();
    }

    public function equals(OrderItem $item): bool
    {
        return $this->getProduct()->getId() === $item->getProduct()->getId();
    }
}