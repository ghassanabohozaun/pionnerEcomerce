<?php

namespace App\Livewire\Website;

use App\Services\Dashboard\FaqQuestionService;
use Livewire\Component;

class FaqQuestion extends Component
{
    public $name, $email, $subject, $message;

    protected FaqQuestionService $faqQuestionService;

    // boot
    public function boot(FaqQuestionService $faqQuestionService)
    {
        $this->faqQuestionService = $faqQuestionService;
    }

    // call when component boot
    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:60'],
            'email' => ['required', 'email'],
            'subject' => ['required', 'string', 'min:3', 'max:100'],
            'message' => ['required', 'string', 'min:3', 'max:2000'],
        ];
    }

    // updated
    public function updated()
    {
        $this->validate();
    }

    // submit form
    public function submitForm()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'subject' => $this->subject,
            'message' => $this->message,
        ];
        $faqQuestion = $this->faqQuestionService->store($data);
        if (!$faqQuestion) {
            // flash()->error(__('general.add_error_message'));
            $this->dispatch('faq-question-failed', __('general.add_error_message'));
        }
        // flash()->success(__('general.add_success_message'));
        $this->dispatch('faq-question-created', __('general.add_success_message'));
        $this->reset();
    }

    // render
    public function render()
    {
        return view('livewire.website.faq-question');
    }
}
