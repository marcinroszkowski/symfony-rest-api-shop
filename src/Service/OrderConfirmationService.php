<?php

namespace App\Service;

use App\Service\Contract\OrderConfirmationServiceContract;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

readonly class OrderConfirmationService implements OrderConfirmationServiceContract
{
    public function __construct(private MailerInterface $mailer)
    {
    }

    public function send(): void
    {
        $this->mailer->send(
            (new Email())->from('somerandom@email.com')
                ->to('somerandomclientfromcommand@email.com')
                ->subject('test1')
                ->text('This is an email')
        );
    }
}