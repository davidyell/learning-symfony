<?php

declare(strict_types=1);

namespace App\Event;

use Symfony\Contracts\EventDispatcher\Event;

class ChooseCakeEvent extends Event
{
    public const NAME = 'app.cake.chosen';
    private string $chosenItem;

    /**
     * @return string
     */
    public function getChosenItem(): string
    {
        return $this->chosenItem;
    }

    /**
     * @param string $chosenItem
     * @return ChooseCakeEvent
     */
    public function setChosenItem(string $chosenItem): ChooseCakeEvent
    {
        $this->chosenItem = $chosenItem;
        return $this;
    }

}