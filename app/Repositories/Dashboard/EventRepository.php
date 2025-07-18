<?php

namespace App\Repositories\Dashboard;

use App\Models\Event;

class EventRepository
{
    // get event
    public function getEvent($id)
    {
        return Event::find($id);
    }

    // get events
    public function getEvents()
    {
        return Event::latest()->get();
    }

    // store event
    public function storeEvent($data)
    {
        return Event::create($data);
    }

    // update Event
    public function updateEvent($event, $data)
    {
        return $event->update($data);
    }

    // destroy event
    public function destroyEvent($event)
    {
        return $event->delete();
    }
}
