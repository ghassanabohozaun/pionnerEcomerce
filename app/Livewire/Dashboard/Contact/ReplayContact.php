<?php

namespace App\Livewire\Dashboard\Contact;

use App\Services\Dashboard\ContactService;
use Livewire\Attributes\On;
use Livewire\Component;

class ReplayContact extends Component
{
    public $message;
    public $contactId, $name, $email, $subject, $replayMessage;

    protected ContactService $contactService;

    // called at the beginig of every request
    public function boot(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    // show message dispatch listner
    #[On('call-replay-contact-component')]
    public function launchModal($id)
    {
        $this->dispatch('launch-replay-modal');
        $this->message = $this->contactService->getContactById($id);
        $this->contactId = $this->message->id;
        $this->name = $this->message->name;
        $this->email = $this->message->email;
        $this->subject = $this->message->subject;
    }

    public function sendReplayContact()
    {
        $replaySend = $this->contactService->replayContact($this->contactId, $this->replayMessage);
        if (!$replaySend) {
            flash()->success(__('general.send_error_message'));
        }
        $this->replayMessage = '';
        flash()->success(__('general.send_success_message'));
        $this->dispatch('close-replay-modal');
        $this->dispatch('refresh-sidebar');
    }

    public function render()
    {
        return view('livewire.dashboard.contact.replay-contact');
    }
}
