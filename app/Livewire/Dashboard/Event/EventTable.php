<?php

namespace App\Livewire\Dashboard\Event;

use Livewire\Component;

class EventTable extends Component
{
    public $events, $title, $start_date;
    public $rowCount = 1;

    public function render()
    {
        return view('livewire.dashboard.event.event-table');
    }

    public function mount($events)
    {
        $this->events = $events;
    }

    public function addRow()
    {
        $this->events([
            'title' => '',
            'start_date' => '',
        ]);
    }

    public function removeRow() {}
}
