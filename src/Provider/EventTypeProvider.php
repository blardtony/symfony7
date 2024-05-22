<?php

namespace App\Provider;

use App\Repository\EventTypeRepository;

readonly class EventTypeProvider
{
    public function __construct(private EventTypeRepository $eventTypeRepository)
    {
    }

    public function getEventTypes(): array
    {
        return $this->eventTypeRepository->findAll();
    }

}