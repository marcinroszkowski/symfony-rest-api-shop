<?php

namespace App\Message\Command\Contract;

interface StoreOrderCommandContract
{
    public function getClientId(): int;

    public function getProducts(): array;
}