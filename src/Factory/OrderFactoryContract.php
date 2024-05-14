<?php

namespace App\Factory;

use App\Entity\Order;

interface OrderFactoryContract
{
    public function create(int $clientId, array $products): Order;
}