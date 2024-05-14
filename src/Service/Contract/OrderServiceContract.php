<?php

namespace App\Service\Contract;

use App\Entity\Order;

interface OrderServiceContract
{
    public function create(int $clientId, array $products): Order;
}