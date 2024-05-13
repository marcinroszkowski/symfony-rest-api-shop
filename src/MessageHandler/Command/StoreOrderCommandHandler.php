<?php

namespace App\MessageHandler\Command;

use App\Message\Command\StoreOrderCommandContract;
use App\Message\Event\OrderStoredEvent;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Messenger\MessageBusInterface;

#[AsMessageHandler]
readonly class StoreOrderCommandHandler
{
    public function __construct(
        private readonly MessageBusInterface $eventBus
    ) {
    }

    public function __invoke(StoreOrderCommandContract $command): void
    {
        echo 'Order almost created!' . PHP_EOL;

        $this->eventBus->dispatch(new OrderStoredEvent());
    }
}