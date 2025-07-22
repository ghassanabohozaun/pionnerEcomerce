<?php

namespace App\Livewire\Dashboard\Contact;

use App\Models\Contact;
use App\Services\Dashboard\ContactService;
use Laravel\Prompts\FormBuilder;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ContactMessage extends Component
{
    use WithPagination;

    protected ContactService $contactService;
    public $itemSearch = '';

    public $openMessage, $inboxCount;

    public $page = 1;
    public $is_star = 0;

    public $screen = 'inbox';
    // to refresh component
    protected $listeners = [
        'refresh-messages' => '$refresh',
    ];

    // called when update item search properite   every properite has updating function as below
    public function updatingItemSearch()
    {
        // every properite has reset as below
        $this->resetPage();
    }

    // boot
    public function boot(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    // show message
    public function showMessage($id)
    {
        $this->dispatch('show-message', $id, $this->screen);
        if ($this->screen == 'inbox') {
            $this->contactService->makeRead($id);
            $this->dispatch('refresh-sidebar');
        }

        $this->openMessage = $id;
    }

    // select screen listner
    #[On('select-screen')]
    public function selectScreen($screen)
    {
        $this->screen = $screen;
    }

    // make star
    public function makeStarred($id)
    {
        $contact = $this->contactService->makeStarred($id);
        if (!$contact) {
            flash()->error(__('general.update_error_message'));
        }
        flash()->success(__('general.update_success_message'));
        $this->dispatch('refresh-messages');
        $this->dispatch('refresh-sidebar');
    }

    // render
    public function render()
    {
        // if ($this->screen == 'inbox') {
        //     $messages = $this->contactService->getContactsBySearch($this->itemSearch, 'inbox');
        // } elseif ($this->screen == 'readed') {
        //     $messages = $this->contactService->getContactsBySearch($this->itemSearch, 'readed');
        // } elseif ($this->screen == 'trashed') {
        //     $messages = $this->contactService->getContactsBySearch($this->itemSearch, 'trashed');
        // } else {
        //     $messages = [];
        // }

        // if ($this->screen == 'inbox') {
        //     $messages = Contact::query();
        // } elseif ($this->screen == 'readed') {
        //     $messages = Contact::where('is_read', 1);
        // } elseif ($this->screen == 'answered') {
        //     $messages = Contact::where('is_replay', 1);
        // } elseif ($this->screen == 'trashed') {
        //     $messages = Contact::onlyTrashed();
        // } elseif ($this->screen == 'starred') {
        //     $messages = Contact::where('is_star', 1);
        // } else {
        //     $messages = Contact::query();
        // }

        // if (!empty($this->itemSearch)) {
        //     $messages->where('email', 'like', '%' . $this->itemSearch . '%');
        // }

        $messages = $this->contactService->getContacts($this->itemSearch, $this->screen);

        return view('livewire.dashboard.contact.contact-message', [
            'messages' => $messages->latest()->paginate(5),
        ]);
    }
}
