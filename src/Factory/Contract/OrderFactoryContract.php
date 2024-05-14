<?php

namespace App\Factory\Contract;

use App\Entity\Order;

interface OrderFactoryContract
{
    public function create(int $clientId, array $products): Order;
}