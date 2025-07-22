<?php

namespace App\Livewire\Dashboard\Contact;

use App\Models\Contact;
use App\Services\Dashboard\ContactService;
use Livewire\Attributes\On;
use Livewire\Component;
use function Laravel\Prompts\alert;

class ContactShow extends Component
{
    public $message;

    protected ContactService $contactService;

    public function boot(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    protected $listeners = [
        'refresh-cotnact-show' => '$refresh',
    ];

    // call when component creating
    public function mount()
    {
        // $this->message = $this->contactService->getContacts()->first();
    }

    // show message dispatch listner
    #[On('show-message')]
    public function showMessage($id, $screen)
    {
        $this->message = $this->contactService->getContactById($id);
    }

    // make unread
    public function markUnread($id)
    {
        $contact = $this->contactService->makeUnRead($id);
        if (!$contact) {
            flash()->error(__('general.update_error_message'));
        }
        flash()->success(__('general.update_success_message'));
        $this->dispatch('refresh-messages');
        $this->dispatch('refresh-cotnact-show');
        $this->dispatch('refresh-sidebar');
        $this->message = '';
    }

    // starred message
    public function starredMessage($id)
    {
        $message = $this->contactService->makeStarred($id);

        if (!$message) {
            flash()->error(__('general.update_error_message'));
        }
        flash()->success(__('general.update_success_message'));
        $this->dispatch('refresh-messages');
        $this->dispatch('refresh-cotnact-show');
        $this->dispatch('refresh-sidebar');
        $this->message = '';
    }

    // delete message
    public function deleteMessage($id)
    {
        $contact = $this->contactService->destroyContact($id);
        if (!$contact) {
            $this->dispatch('delete-error-alert');
            // flash()->error(__('general.delete_error_message'));
        }

        $this->dispatch('delete-success-alert');
        // $this->message = $this->contactService->getContacts()->first();
        // flash()->success(__('general.delete_success_message'));
        $this->dispatch('refresh-messages');
        $this->dispatch('refresh-cotnact-show');
        $this->dispatch('refresh-sidebar');
        $this->message = '';
    }

    // force delete message
    public function forceDeleteMessage($id)
    {
        $contact = $this->contactService->forceDeleteContact($id);
        if (!$contact) {
            flash()->error(__('general.delete_error_message'));
        }
        flash()->success(__('general.delete_success_message'));
        // $this->message = $this->contactService->getContacts()->first();
        $this->dispatch('refresh-messages');
        $this->dispatch('refresh-cotnact-show');
        $this->dispatch('refresh-sidebar');
        $this->message = '';
    }

    // restore message
    public function restoreMessage($id)
    {
        $contact = $this->contactService->restoreContact($id);
        if (!$contact) {
            flash()->error(__('general.restore_error_message'));
        }
        flash()->success(__('general.restore_success_message'));
        // $this->message = $this->contactService->getContacts()->first();
        $this->dispatch('refresh-messages');
        $this->dispatch('refresh-cotnact-show');
        $this->dispatch('refresh-sidebar');
        $this->message = '';
    }

    // replay contact
    public function replayContact($id)
    {
        $this->dispatch('call-replay-contact-component', $id);
    }
    // render
    public function render()
    {
        return view('livewire.dashboard.contact.contact-show');
    }
}
