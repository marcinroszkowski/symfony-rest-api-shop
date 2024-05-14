<?php

namespace App\Message\Event\Contract;

interface OrderStoredEventContract
{
    public function getOrderId(): int;
}