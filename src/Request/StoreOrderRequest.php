<?php

namespace App\Request;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Validator\Constraints\Collection as CollectionConstraint;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Positive;
use Symfony\Component\Validator\Constraints\Type;

class StoreOrderRequest extends AbstractJsonRequest
{
    #[NotBlank(message: 'Cannot be empty')]
    #[Type('integer')]
    public readonly int $clientId;

    #[NotBlank(message: 'Cannot be empty')]
    #[Type('array')]
    #[All(
        constraints: ([
            new CollectionConstraint(
                fields: [
                    'id' => [
                        new NotBlank(),
                        new Type('string'),
                        new Positive(),
                    ],
                    'quantity' => [
                        new NotBlank(),
                        new Type('int'),
                        new Positive(),
                    ]
                ]
            )
        ])
    )]
    public readonly array $products;

    public function getClientId(): int
    {
        return $this->clientId;
    }

    public function getProducts(): array
    {
        return $this->products;
    }
}