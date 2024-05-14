<?php

namespace App\Factory;

use App\Entity\OrderItem;
use App\Entity\Product;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\EntityManagerInterface;

readonly class OrderItemFactory implements OrderItemFactoryContract
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function createItemsCollection(array $products): Collection
    {
        $orderItems = new ArrayCollection();
        foreach ($products as $product) {
            $productObject = $this->entityManager->find(Product::class, $product['id']);
            $orderItem = new OrderItem();
            $orderItem->setProduct($productObject);
            $orderItem->setQuantity($product['quantity']);
            $orderItems->add($orderItem);
        }

        return $orderItems;
    }
}