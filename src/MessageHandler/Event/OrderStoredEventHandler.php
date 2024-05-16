<?php

namespace App\MessageHandler\Event;

use App\Message\Command\SendOrderConfirmationCommand;
use App\Message\Event\Contract\OrderStoredEventContract;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Messenger\MessageBusInterface;

#[AsMessageHandler]
readonly class OrderStoredEventHandler
{
    public function __construct(private MessageBusInterface $messageBus)
    {
    }

    public function __invoke(OrderStoredEventContract $event): void
    {
        echo PHP_EOL.'Order: '.$event->getOrderId().' stored ~EventHandler'.PHP_EOL;

        $this->messageBus->dispatch(new SendOrderConfirmationCommand());
    }
}