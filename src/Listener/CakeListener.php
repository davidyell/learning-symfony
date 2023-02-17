<?php

declare(strict_types=1);

namespace App\Listener;

use App\Event\ChooseCakeEvent;
use Psr\Log\LoggerInterface;

class CakeListener
{

    public function __construct(private LoggerInterface $logger)
    {
    }

    public function __invoke(ChooseCakeEvent $event): void
    {
        $this->logger->info('Chosen cake was ' . $event->getChosenItem());
    }
}