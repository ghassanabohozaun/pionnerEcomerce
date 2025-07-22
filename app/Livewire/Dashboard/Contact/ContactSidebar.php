<?php

namespace App\Livewire\Dashboard\Contact;

use App\Models\Contact;
use App\Services\Dashboard\ContactService;
use Livewire\Attributes\On;
use Livewire\Component;

class ContactSidebar extends Component
{
    public $screen = 'inbox';

    public $inboxCount = 0,
        $readedCount = 0,
        $repliedCount = 0,
        $trashedCount = 0,
        $allCount = 0,
        $starredCount = 0;
    protected ContactService $contactService;

    // boot called every requres
    public function boot(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    #[On('refresh-sidebar')]
    public function refreshSidebar()
    {
        $this->counts();
    }

    public function mount()
    {
        $this->counts();
    }

    public function counts()
    {
        $this->inboxCount = Contact::query()->count();
        $this->readedCount = Contact::where('is_read', 1)->count();
        $this->repliedCount = Contact::where('is_replay', 1)->count();
        $this->trashedCount = Contact::onlyTrashed()->count();
        $this->starredCount = Contact::where('is_star', 1)->count();
    }
    // select screen event
    public function selectScreen($screen)
    {
        $this->screen = $screen;
        $this->dispatch('select-screen', $screen);
    }

    // delete all trashed
    public function deleteAllTrashed()
    {
        $contact = $this->contactService->deleteAllTrashed();
        if (!$contact) {
            flash()->error(__('general.delete_error_message'));
        }
        flash()->success(__('general.delete_success_message'));
        $this->dispatch('refresh-messages');
        $this->dispatch('refresh-sidebar');
    }

    // delete all read
    public function delateAllRead()
    {
        $contact = $this->contactService->delateAllRead();
        if (!$contact) {
            flash()->error(__('general.delete_error_message'));
        }
        flash()->success(__('general.delete_success_message'));
        $this->dispatch('refresh-messages');
        $this->dispatch('refresh-sidebar');
    }

    // delete all replied
    public function deleteAllReplied()
    {
        $contact = $this->contactService->deleteAllReplied();
        if (!$contact) {
            flash()->error(__('general.delete_error_message'));
        }
        flash()->success(__('general.delete_success_message'));
        $this->dispatch('refresh-messages');
        $this->dispatch('refresh-sidebar');
    }

    // mark as read
    public function markAllAsRead()
    {
        $contact = $this->contactService->markAllAsRead();

        if (!$contact) {
            flash()->error(__('general.update_error_message'));
        }
        flash()->success(__('general.update_success_message'));
        $this->dispatch('refresh-messages');
        $this->dispatch('refresh-sidebar');
    }

    public function render()
    {
        return view('livewire.dashboard.contact.contact-sidebar');
    }
}
