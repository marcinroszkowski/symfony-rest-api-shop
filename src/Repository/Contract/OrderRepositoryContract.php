<?php

namespace App\Repository\Contract;

use App\Entity\Order;

interface OrderRepositoryContract
{
    public function save(Order $order): void;
}