<?php

namespace App\Repositories\Dashboard;

use App\Models\Faq;

class FaqRepository
{
    // __construct
    public function __construct()
    {
        //
    }

    // get faq
    public function getFaq($id)
    {
        return Faq::find($id);
    }
    // get faqs
    public function getFaqs()
    {
        return Faq::latest()->get();
    }

    // store faq
    public function storeFaq($data)
    {
        return Faq::create($data);
    }

    // update faq
    public function updateFaq($faq, $data)
    {
        return $faq->update($data);
    }

    // destroy faq
    public function destroyFaq($faq)
    {
        return $faq->forceDelete();
    }

    // change status
    public function changeStatus($faq, $status)
    {
        return $faq->update([
            'status' => $status,
        ]);
    }
}
