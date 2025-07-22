<?php

namespace App\Repositories\Dashboard;

use App\Models\Contact;

class ContactRepostiroy
{
    // get contact by id
    public function getContactById($id)
    {
        return Contact::withTrashed()->find($id);
    }

    // get contacts
    public function getContacts($itemSearch = null, $screen)
    {
        return Contact::searchContact($itemSearch)
            ->when($screen == 'inbox', function ($q) {
                $q->withoutTrashed();
            })
            ->when($screen == 'readed', function ($q) {
                $q->withoutTrashed()->where('is_read', true);
            })
            ->when($screen == 'trashed', function ($q) {
                $q->onlyTrashed();
            })
            ->when($screen == 'replied', function ($q) {
                $q->withoutTrashed()->where('is_replay', true);
            })
            ->when($screen == 'starred', function ($q) {
                $q->withoutTrashed()->where('is_star', true);
            });
    }

    // store contact
    public function storeContact($data)
    {
        return Contact::create($data);
    }

    // update contact
    public function updateContact($contact, $data)
    {
        return $contact->update($data);
    }

    // delete contact
    public function destroyContact($contact)
    {
        return $contact->delete();
    }

    // force delete contact
    public function forceDeleteContact($contact)
    {
        return $contact->forceDelete();
    }

    // delete all trashed
    public function deleteAllTrashed()
    {
        Contact::onlyTrashed()->forceDelete();
        return true;
    }

    // delete all read
    public function delateAllRead()
    {
        Contact::where('is_read', true)->delete();
        return true;
    }
    // delete all replied
    public function deleteAllReplied()
    {
        Contact::where('is_replay', true)->delete();
        return true;
    }

    // restore contact
    public function restoreContact($contact)
    {
        return $contact->restore();
    }

    // mark all as read
    public function markAllAsRead()
    {
        $contacts = Contact::get();
        foreach ($contacts as $contact) {
            $contact->update([
                'is_read' => true,
            ]);
        }
        return true;
    }

    // make read
    public function makeRead($contact)
    {
        return $contact->update([
            'is_read' => 1,
        ]);
    }

    // make unread
    public function makeUnRead($contact)
    {
        return $contact->update([
            'is_read' => 0,
        ]);
    }

    // make starred
    public function makeStarred($contact, $status)
    {
        return $contact->update([
            'is_star' => $status,
        ]);
    }

    // add replay by update replay and is replay in contacts table

    public function addReplay($contact, $replayMessage)
    {
        return $contact->update([
            'replay' => $replayMessage,
            'is_replay' => true,
        ]);
    }
}
