<?php

namespace App\MessageHandler\Command;

use App\Message\Command\Contract\SendOrderConfirmationCommandContract;
use App\Service\Contract\OrderConfirmationServiceContract;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
readonly class SendOrderConfirmationCommandHandler
{
    public function __construct(private OrderConfirmationServiceContract $confirmationService)
    {
    }

    public function __invoke(SendOrderConfirmationCommandContract $command): void
    {
        $this->confirmationService->send();

        echo PHP_EOL . 'Email sent!' . PHP_EOL;
    }
}