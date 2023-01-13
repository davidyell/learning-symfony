<?php

namespace App\Services;

use Psr\Log\LoggerInterface;

class BakeryService
{
    public function __construct(private LoggerInterface $logger)
    {
    }

    public array $items = [
        'Hot Cross Bun',
        'Croissant',
        'Blondie',
        'Brownie',
        'Flapjack'
    ];

    public function chooseForMe(): string
    {
        $chosenItem = $this->items[array_rand($this->items)];

        $this->logger->info('Bakery provided ' . $chosenItem);

        return $chosenItem;
    }
}