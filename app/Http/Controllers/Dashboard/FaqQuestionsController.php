<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Services\Dashboard\FaqQuestionService;
use Illuminate\Http\Request;

class FaqQuestionsController extends Controller
{
    protected $faqQuestionService;

    // __construct
    public function __construct(FaqQuestionService $faqQuestionService)
    {
        $this->faqQuestionService = $faqQuestionService;
    }

    // index
    public function index()
    {
        $title = __('faqs.faq_questions');
        return view('dashboard.faq-questions.index', compact('title'));
    }

    // get all
    public function getAll()
    {
        return $this->faqQuestionService->getAll();
    }

    // destroy
    public function destory(string $id)
    {
        $faqQuestion = $this->faqQuestionService->destroy($id);
        if (!$faqQuestion) {
            return response()->json(['status' => false], 500);
        }
        return response()->json(['status' => true], 200);
    }
}
