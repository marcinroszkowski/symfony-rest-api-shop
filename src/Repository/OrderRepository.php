<?php

namespace App\Repository;

use App\Entity\Order;
use App\Repository\Contract\OrderRepositoryContract;
use Doctrine\ORM\EntityManagerInterface;

readonly class OrderRepository implements OrderRepositoryContract
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function save(Order $order): void
    {
        $this->entityManager->persist($order);
        $this->entityManager->flush();
    }
}