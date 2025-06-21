<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\FaqRepository;

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

    // store faq
    public function storeFaq($request)
    {
        $faq = $this->faqRepository->storeFaq($request);
        if (!$faq) {
            return false;
        }
        return $faq;
    }

    // update faq
    public function updateFaq($request, $id)
    {
        $faq = self::getFaq($id);
        if (!$faq) {
            return false;
        }

        $faq = $this->faqRepository->updateFaq($request, $id);
        if (!$faq) {
            return false;
        }
        return $faq;
    }

    // destroy faq
    public function destroyFaq($id)
    {
        $faq = self::getFaq($id);
        if (!$faq) {
            return false;
        }
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
        if (!$faq) {
            return false;
        }
        $faq = $this->faqRepository->changeStatus($faq ,$status);
        if (!$faq) {
            return false;
        }
        return $faq;
    }
}
