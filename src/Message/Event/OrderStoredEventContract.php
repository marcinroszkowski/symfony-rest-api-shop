<?php

namespace App\Message\Event;

interface OrderStoredEventContract
{
    public function getOrderId(): int;
}