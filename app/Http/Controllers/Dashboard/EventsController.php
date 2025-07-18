<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Services\Dashboard\EventService;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    protected $eventService;
    //__construct
    public function __construct(EventService $eventService)
    {
        $this->eventService = $eventService;
    }

    // index
    public function index()
    {
        $title = __('events.events');
        $events = $this->eventService->getEvents();
        return view('dashboard.events.index', compact('title','events'));
    }

    // create
    public function create()
    {
        //
    }

    // store
    public function store(Request $request)
    {
        //
    }

    // show
    public function show(string $id)
    {
        //
    }

    // edit
    public function edit(string $id)
    {
        //
    }

    // update
    public function update(Request $request, string $id)
    {
        //
    }

    // destroy
    public function destroy(string $id)
    {
        //
    }
}
