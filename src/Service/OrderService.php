<?php

namespace App\Service;

use App\Entity\Order;
use App\Factory\OrderFactoryContract;
use App\Repository\OrderRepositoryContract;

readonly class OrderService implements OrderServiceContract
{
    public function __construct(private OrderFactoryContract $orderFactory, private OrderRepositoryContract $orderRepository)
    {
    }

    public function create(int $clientId, array $products): Order
    {
        $order = $this->orderFactory->create($clientId, $products);
        $this->orderRepository->save($order);

        return $order;
    }
}