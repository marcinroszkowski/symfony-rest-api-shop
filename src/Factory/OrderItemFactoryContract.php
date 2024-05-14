<?php

namespace App\Factory;

use Doctrine\Common\Collections\Collection;

interface OrderItemFactoryContract
{
    public function createItemsCollection(array $products): Collection;
}