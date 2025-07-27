<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Services\Website\FaqService;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    protected $faqService;
    // __construct
    public function __construct(FaqService $faqService)
    {
        $this->faqService = $faqService;
    }

    // show faqs page
    public function showFaqsPage()
    {
        $title = __('website.faqs');
        $faqs = $this->faqService->getFaqs();
        return view('website.faqs', compact('title','faqs'));
    }
}
