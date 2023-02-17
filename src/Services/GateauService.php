<?php

declare(strict_types=1);

namespace App\Services;

use App\Event\ChooseCakeEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class GateauService implements BakeryInterface
{
    public function __construct(private DeliveryService $deliveryService, private EventDispatcherInterface $eventDispatcher)
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

        $event = (new ChooseCakeEvent())->setChosenItem($chosenItem);
        $this->eventDispatcher->dispatch($event, $event::NAME);

        return $chosenItem;
    }

    public function getName(): string
    {
        return 'Gateau';
    }
}