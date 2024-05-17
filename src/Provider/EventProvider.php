<?php
declare(strict_types=1);

namespace App\Provider;

use App\Repository\EventRepository;

readonly class EventProvider
{
    public function __construct(private EventRepository $eventRepository)
    {
    }
}