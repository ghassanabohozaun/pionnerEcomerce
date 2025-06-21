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
        $faqs = Faq::orderByDesc('created_at')->select('id', 'question', 'answer', 'status')->paginate(5);
        return $faqs;
    }

    // store faq
    public function storeFaq($request)
    {
        $faq = Faq::create([
            'question' => [
                'en' => $request->question['en'],
                'ar' => $request->question['ar'],
            ],
            'answer' => [
                'en' => $request->answer['en'],
                'ar' => $request->answer['ar'],
            ],
            'status' => $request->has('status') ? 1 : 0,
        ]);

        return $faq;
    }

    // update faq
    public function updateFaq($request, $id)
    {
        $faq = self::getFaq($id);

        $faq->update([
            'question' => [
                'en' => $request->question['en'],
                'ar' => $request->question['ar'],
            ],
            'answer' => [
                'en' => $request->answer['en'],
                'ar' => $request->answer['ar'],
            ],
            'status' => $request->has('status') ? 1 : 0,
        ]);

        return $faq;
    }

    // destroy faq
    public function destroyFaq($faq)
    {
        return $faq->forceDelete();
    }

    // change status
    public function changeStatus($faq, $status)
    {
        $faq = $faq->update([
            'status' => $status,
        ]);
        return $faq;
    }
}
