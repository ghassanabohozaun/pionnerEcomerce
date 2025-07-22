<?php

namespace App\Services\Dashboard;

use App\Mail\ContactReplayMail;
use App\Repositories\Dashboard\ContactRepostiroy;
use Illuminate\Support\Facades\Mail;

class ContactService
{
    protected $contactRepostiroy;
    //__construct
    public function __construct(ContactRepostiroy $contactRepostiroy)
    {
        $this->contactRepostiroy = $contactRepostiroy;
    }

    // get contact by id
    public function getContactById($id)
    {
        $contact = $this->contactRepostiroy->getContactById($id);
        if (!$contact) {
            return false;
        }
        return $contact;
    }

    // get contacts
    public function getContacts($itemSearch = null, $screen = null)
    {
        return $this->contactRepostiroy->getContacts($itemSearch, $screen);
    }

    // store contact
    public function storeContact($data)
    {
        $contact = $this->contactRepostiroy->storeContact($data);
    }

    // update contact
    public function updateContact($data)
    {
        $contact = self::getContactById($data['id']);
        $contact = $this->contactRepostiroy->updateContact($contact, $data);
        if (!$contact) {
            return false;
        }
        return $contact;
    }

    // delete contact
    public function destroyContact($id)
    {
        $contact = self::getContactById($id);
        $contact = $this->contactRepostiroy->destroyContact($contact);
        if (!$contact) {
            return false;
        }
        return $contact;
    }

    // force delete contact
    public function forceDeleteContact($id)
    {
        $contact = self::getContactById($id);
        $contact = $this->contactRepostiroy->forceDeleteContact($contact);
        if (!$contact) {
            return false;
        }
        return $contact;
    }

    // delete all trashed
    public function deleteAllTrashed()
    {
        $contact = $this->contactRepostiroy->deleteAllTrashed();
        if (!$contact) {
            return false;
        }
        return $contact;
    }

    // delete all read
    public function delateAllRead()
    {
        $contact = $this->contactRepostiroy->delateAllRead();
        if (!$contact) {
            return false;
        }
        return $contact;
    }

    // delete all replied
    public function deleteAllReplied()
    {
        $contact = $this->contactRepostiroy->deleteAllReplied();
        if (!$contact) {
            return false;
        }
        return $contact;
    }
    // restore contact
    public function restoreContact($id)
    {
        $contact = self::getContactById($id);
        $contact = $this->contactRepostiroy->restoreContact($contact);
        if (!$contact) {
            return false;
        }
        return $contact;
    }

    // mark all as read
    public function markAllAsRead()
    {
        $contact = $this->contactRepostiroy->markAllAsRead();
        if (!$contact) {
            return false;
        }
        return $contact;
    }

    // make read
    public function makeRead($id)
    {
        $contact = self::getContactById($id);
        $contact = $this->contactRepostiroy->makeRead($contact);
        if (!$contact) {
            return false;
        }
        return $contact;
    }

    // make unread
    public function makeUnRead($id)
    {
        $contact = self::getContactById($id);
        $contact = $this->contactRepostiroy->makeUnRead($contact);
        if (!$contact) {
            return false;
        }
        return $contact;
    }

    // make starred
    public function makeStarred($id)
    {
        $contact = self::getContactById($id);
        $status = $contact->is_star == 1 ? 0 :1;

        $contact = $this->contactRepostiroy->makeStarred($contact,$status);
        if (!$contact) {
            return false;
        }
        return $contact;
    }

    // replay contact
    public function replayContact($contactID, $replayMessage)
    {
        $contact = self::getContactById($contactID);
        $this->contactRepostiroy->addReplay($contact, $replayMessage);
        Mail::to($contact->email)->send(new ContactReplayMail($contact->name, $contact->subject, $replayMessage));

        return true;
    }
}
