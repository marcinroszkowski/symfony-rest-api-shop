<?php

namespace App\MessageHandler\Event;

use App\Message\Event\Contract\OrderStoredEventContract;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class OrderStoredEventHandler
{
    public function __invoke(OrderStoredEventContract $event): void
    {
        echo PHP_EOL.'Order: '.$event->getOrderId().' stored ~EventHandler'.PHP_EOL;
    }
}