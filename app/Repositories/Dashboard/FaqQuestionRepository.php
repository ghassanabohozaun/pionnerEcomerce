<?php

namespace App\Repositories\Dashboard;

use App\Models\FaqQuestion;

class FaqQuestionRepository
{
    // get faq question
    public function getFaqQuestion($id)
    {
        return FaqQuestion::find($id);
    }

    // get faq questions
    public function getFaqQuestions()
    {
        return FaqQuestion::latest()->get();
    }

    // store faq question
    public function store($data)
    {
        return FaqQuestion::create($data);
    }

    // destroy faq questions
    public function destroy($faqQuestion)
    {
        return $faqQuestion->delete();
    }
}
