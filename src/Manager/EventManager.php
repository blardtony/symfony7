<?php

namespace App\Manager;

use App\Entity\Event;
use App\Persister\EventPersister;

readonly class EventManager
{
    public function __construct(private EventPersister $eventPersister)
    {
    }

    public function persist(Event $event): void
    {
        $this->eventPersister->save($event);
    }
}