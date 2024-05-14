<?php

namespace App\Service;

use App\Entity\Order;

interface OrderServiceContract
{
    public function create(int $clientId, array $products): Order;
}