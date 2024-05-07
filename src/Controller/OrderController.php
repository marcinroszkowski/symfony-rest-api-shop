<?php

namespace App\Controller;

use App\Message\Command\StoreOrderCommand;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

class OrderController extends AbstractController
{
    #[Route('/api/order', name: 'store', methods: ['POST'])]
    public function storeOrder(
        MessageBusInterface $messageBus
    ): JsonResponse {
        $messageBus->dispatch(new StoreOrderCommand());

        return $this->json([
            'success' => true,
            'message' => 'Order created successfully',
            'data' => ['success' => true]
        ]);
    }
}