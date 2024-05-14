<?php

namespace App\Message\Command;

use App\Message\Command\Contract\StoreOrderCommandContract;

readonly class StoreOrderCommand implements StoreOrderCommandContract
{
    public function __construct(private int $clientId, private array $products)
    {
    }

    public function getClientId(): int
    {
        return $this->clientId;
    }

    public function getProducts(): array
    {
        return $this->products;
    }
}