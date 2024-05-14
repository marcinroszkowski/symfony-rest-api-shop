<?php

namespace App\Repository;

use App\Entity\Order;

interface OrderRepositoryContract
{
    public function save(Order $order): void;
}