<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\EventRepository;

class EventService
{
    protected $eventRepository;
    //__construct
    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    // get event
    public function getEvent($id)
    {
        $event = $this->eventRepository->getEvent($id);
        if (!$event) {
            return false;
        }
        return $event;
    }

    // get events
    public function getEvents()
    {
        return $this->eventRepository->getEvents();
    }

    // store event
    public function storeEvent($data)
    {
        $event = $this->eventRepository->storeEvent($data);
        if (!$event) {
            return false;
        }
        return $event;
    }

    // update Event
    public function updateEvent($data)
    {
        $event = self::getEvent($data['id']);

        $event = $this->eventRepository->updateEvent($event, $data);
        if (!$event) {
            return false;
        }
        return $event;
    }

    // destroy event
    public function destroyEvent($id)
    {
        $event = self::getEvent($id);

        $event = $this->eventRepository->destroyEvent($event);
        if (!$event) {
            return false;
        }
        return $event;
    }
}
