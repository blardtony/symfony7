<?php

namespace App\Persister;

use App\Entity\Event;

class EventPersister extends AbstractPersister
{
    /**
     * @param Event $event
     * @return void
     */
    public function save(Event $event): void
    {
        $this->objectManager->persist($event);
        $this->objectManager->flush();
    }

    /**
     * @param Event $event
     * @return void
     */
    public function remove(Event $event): void
    {
        $this->objectManager->remove($event);
        $this->objectManager->flush();
    }
}