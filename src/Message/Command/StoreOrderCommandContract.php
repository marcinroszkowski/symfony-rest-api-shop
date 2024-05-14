<?php

namespace App\Message\Command;

interface StoreOrderCommandContract
{
    public function getClientId(): int;

    public function getProducts(): array;
}