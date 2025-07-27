<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\FaqQuestionRepository;
use Yajra\DataTables\Facades\DataTables;

class FaqQuestionService
{
    protected $faqQuestionRepository;

    //__construct
    public function __construct(FaqQuestionRepository $faqQuestionRepository)
    {
        $this->faqQuestionRepository = $faqQuestionRepository;
    }

    // get faq question
    public function getFaqQuestion($id)
    {
        $faqQuestion = $this->faqQuestionRepository->getFaqQuestion($id);
        if (!$faqQuestion) {
            return false;
        }
        return $faqQuestion;
    }

    // get faq questions
    public function getFaqQuestions()
    {
        return $this->faqQuestionRepository->getFaqQuestions();
    }

    // get all
    public function getAll()
    {
        $faqQuestions = $this->faqQuestionRepository->getFaqQuestions();

        return DataTables::of($faqQuestions)
            ->addIndexColumn()
            ->addColumn('message', function ($faqQuestion) {
                return view('dashboard.faq-questions.parts.message', compact('faqQuestion'));
            })
            ->addColumn('actions', function ($faqQuestion) {
                return view('dashboard.faq-questions.parts.actions', compact('faqQuestion'));
            })
            ->make(true);
    }

    // store faq question
    public function store($data)
    {
        $faqQuestion = $this->faqQuestionRepository->store($data);
        if (!$faqQuestion) {
            return false;
        }
        return $faqQuestion;
    }

    // destroy faq questions
    public function destroy($id)
    {
        $faqQuestion = self::getFaqQuestion($id);
        if (!$faqQuestion) {
            return false;
        }

        $faqQuestion = $this->faqQuestionRepository->destroy($faqQuestion);

        if (!$faqQuestion) {
            return false;
        }
        return $faqQuestion;
    }
}
