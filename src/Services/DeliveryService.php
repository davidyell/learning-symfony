<?php

declare(strict_types=1);

namespace App\Services;

use Psr\Log\LoggerInterface;

class DeliveryService
{
    const PRIORITY = '24h Tracked';
    const FREE = '7 to 10 Days';

    public function __construct(private LoggerInterface $logger)
    {
    }

    public function setDeliveryType(string $type): void
    {
        $this->logger->info('Delivery set to ' . $type);
    }
}