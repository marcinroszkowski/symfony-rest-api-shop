<?php

namespace App\Message\Event;

readonly class OrderStoredEvent implements OrderStoredEventContract
{
    public function __construct(private int $orderId)
    {
    }

    public function getOrderId(): int
    {
        return $this->orderId;
    }
}