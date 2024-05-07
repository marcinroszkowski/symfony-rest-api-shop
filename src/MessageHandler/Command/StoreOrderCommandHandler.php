<?php

namespace App\MessageHandler\Command;

use App\Message\Command\StoreOrderCommandContract;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class StoreOrderCommandHandler
{
    public function __invoke(StoreOrderCommandContract $command): void
    {
        echo 'Order created!' . PHP_EOL;
    }
}