<div class="form-group">
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
        {{-- edit --}}
        <a href="#" class="btn btn-sm btn-outline-primary edit_faq_button" title="{!! __('general.edit') !!}"
            faq-id="{!! $faq->id !!}" faq-question-ar="{!! $faq->getTranslation('question', 'ar') !!}"
            faq-question-en="{!! $faq->getTranslation('question', 'en') !!}" faq-answer-ar="{!! $faq->getTranslation('answer', 'ar') !!}"
            faq-answer-en="{!! $faq->getTranslation('answer', 'en') !!}" faq-status = "{!! $faq->status !!}">
            <i class="la la-edit"></i>
        </a>


        {{-- delete --}}
        <button class="btn btn-sm btn-outline-danger delete_faq_btn" title="{!! __('general.delete') !!}"
            data-id="{!! $faq->id !!}">
            <i class="la la-trash"></i>
        </button>

    </div>
</div>
