<?php

declare(strict_types=1);

namespace App\Services;

interface BakeryInterface
{
    public function chooseForMe(): string;

    public function getName(): string;
}