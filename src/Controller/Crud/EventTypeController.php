<?php

namespace App\Controller\Crud;

use App\Provider\EventProvider;
use App\Provider\EventTypeProvider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
#[Route('/admin/event-type', name: 'event_type_')]
class EventTypeController extends AbstractController
{
    public function __construct(private readonly EventTypeProvider $eventTypeProvider)
    {
    }
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        $eventTypes = $this->eventTypeProvider->getEventTypes();
        return $this->render('admin/event-type/index.html.twig', [
            'eventTypes' => $eventTypes,
        ]);
    }
}
