<?php

namespace App\Services\Website;

use App\Models\Faq;

class FaqService
{
    // get faqs
    public function getFaqs()
    {
        return Faq::active()->latest()->get();
    }
}
