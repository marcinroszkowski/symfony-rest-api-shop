<?php

namespace App\Factory\Contract;

use Doctrine\Common\Collections\Collection;

interface OrderItemFactoryContract
{
    public function createItemsCollection(array $products): Collection;
}