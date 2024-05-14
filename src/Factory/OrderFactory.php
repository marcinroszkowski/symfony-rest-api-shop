<?php

namespace App\Factory;

use App\Entity\Client;
use App\Entity\Order;
use Doctrine\ORM\EntityManagerInterface;

readonly class OrderFactory implements OrderFactoryContract
{
    public function __construct(private EntityManagerInterface $entityManager, private OrderItemFactoryContract $orderItemFactory)
    {
    }

    public function create(int $clientId, array $products): Order
    {
        $order = new Order();
        $client = $this->entityManager->find(Client::class, $clientId);
        $order->setClient($client);
        $order->addItems($this->orderItemFactory->createItemsCollection($products));
        $order->setValue($order->getOrderValue());

        return $order;
    }
}