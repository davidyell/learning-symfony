<?php

namespace App\Services;

use Psr\Log\LoggerInterface;

class CakeService implements BakeryInterface
{
    public function __construct(private LoggerInterface $logger, private DeliveryService $deliveryService)
    {
    }

    public array $items = [
        'Blondie',
        'Brownie',
        'Flapjack',
        'Millionaire Shortbread'
    ];

    public function chooseForMe(): string
    {
        $chosenItem = $this->items[array_rand($this->items)];

        $this->deliveryService->setDeliveryType($this->deliveryService::FREE);

        $this->logger->info('Bakery provided ' . $chosenItem);

        return $chosenItem;
    }

    public function getName(): string
    {
        return 'Cake';
    }
}