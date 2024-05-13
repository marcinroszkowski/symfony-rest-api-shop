<?php

namespace App\MessageHandler\Event;

use App\Message\Event\OrderStoredEventContract;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class OrderStoredEventHandler
{
    public function __invoke(OrderStoredEventContract $event): void
    {
        echo PHP_EOL.'Order (actually) stored ~EventHandler'.PHP_EOL;
    }
}