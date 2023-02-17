<?php

declare(strict_types=1);

namespace App\Services;

use Psr\Log\LoggerInterface;

class GateauService implements BakeryInterface
{
    public function __construct(private LoggerInterface $logger, private DeliveryService $deliveryService)
    {
    }

    public array $items = [
        'Devils Food Cake',
        'Black Forest Gateau',
        'Strawberry Gateau',
    ];

    public function chooseForMe(): string
    {
        $chosenItem = $this->items[array_rand($this->items)];

        $this->deliveryService->setDeliveryType($this->deliveryService::FREE);

        $this->logger->info('Gateau provided ' . $chosenItem);

        return $chosenItem;
    }

    public function getName(): string
    {
        return 'Gateau';
    }
}