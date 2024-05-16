<?php

namespace App\Service\Contract;

interface OrderConfirmationServiceContract
{
    public function send(): void;
}