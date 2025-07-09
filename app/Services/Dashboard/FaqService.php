<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\FaqRepository;
use Yajra\DataTables\Facades\DataTables;

class FaqService
{
    protected $faqRepository;
    //__construct
    public function __construct(FaqRepository $faqRepository)
    {
        $this->faqRepository = $faqRepository;
    }

    // get faq
    public function getFaq($id)
    {
        $faq = $this->faqRepository->getFaq($id);
        if (!$faq) {
            return false;
        }
        return $faq;
    }
    // get faqs
    public function getFaqs()
    {
        return $this->faqRepository->getFaqs();
    }

    // get all
    public function getAll()
    {
        $faqs = $this->faqRepository->getFaqs();

        return DataTables::of($faqs)
            ->addIndexColumn()
            ->addColumn('actions', function ($faq) {
                return view('dashboard.faqs.parts.actions', compact('faq'));
            })
            ->addColumn('question', function ($faq) {
                return $faq->getTranslation('question', Lang());
            })
            ->addColumn('answer', function ($faq) {
                return $faq->getTranslation('answer', Lang());
            })
            ->addColumn('status', function ($faq) {
                return $faq->status == 1 ? __('general.active') : __('general.inactive');
            })
            ->addColumn('manage_status', function ($faq) {
                return view('dashboard.faqs.parts.status', compact('faq'));
            })
            ->make(true);
    }

    // store faq
    public function storeFaq($data)
    {
        $faq = $this->faqRepository->storeFaq($data);
        if (!$faq) {
            return false;
        }
        return $faq;
    }

    // update faq
    public function updateFaq($data)
    {
        $faq = self::getFaq($data['id']);

        $faq = $this->faqRepository->updateFaq($faq, $data);
        if (!$faq) {
            return false;
        }
        return $faq;
    }

    // destroy faq
    public function destroyFaq($id)
    {
        $faq = self::getFaq($id);

        $faq = $this->faqRepository->destroyFaq($faq);
        if (!$faq) {
            return false;
        }
        return $faq;
    }

    // change status
    public function changeStatus($id, $status)
    {
        $faq = self::getFaq($id);

        $faq = $this->faqRepository->changeStatus($faq, $status);
        if (!$faq) {
            return false;
        }
        return $faq;
    }
}
