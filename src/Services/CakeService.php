<?php

namespace App\Services;

use App\Event\ChooseCakeEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class CakeService implements BakeryInterface
{
    public function __construct(private DeliveryService $deliveryService, private EventDispatcherInterface $eventDispatcher)
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

        $event = (new ChooseCakeEvent())->setChosenItem($chosenItem);
        $this->eventDispatcher->dispatch($event, $event::NAME);

        return $chosenItem;
    }

    public function getName(): string
    {
        return 'Cake';
    }
}