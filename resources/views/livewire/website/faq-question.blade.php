<div class="review-form">
    <form wire:submit.prevent="submitForm">
        <h5 class="comment-title">{!! __('website.have_any_question') !!}</h5>
        <div class=" account-inner-form">
            <div class="review-form-name">
                <label for="fname" class="form-label">{!! __('faqs.name') !!}</label>
                <input type="text" id="name" name="name" wire:model.live="name" class="form-control"
                    placeholder="{!! __('faqs.enter_name') !!}">
                @error('name')
                    <span class="text text-danger strong-weight">{!! $message !!}</span>
                @enderror
            </div>
            <div class="review-form-name">
                <label for="email" class="form-label">{!! __('faqs.email') !!}</label>
                <input type="email" id="email" name="email" wire:model.live="email" class="form-control"
                    placeholder="{!! __('faqs.enter_email') !!}">
                @error('email')
                    <span class="text text-danger strong-weight">{!! $message !!}</span>
                @enderror
            </div>
            <div class="review-form-name">
                <label for="subject" class="form-label">{!! __('faqs.subject') !!}</label>
                <input type="text" id="subject" name="subject" wire:model.live='subject' class="form-control"
                    placeholder="{!! __('faqs.enter_subject') !!}">
                @error('subject')
                    <span class="text text-danger strong-weight">{!! $message !!}</span>
                @enderror
            </div>
        </div>
        <div class="review-textarea">
            <label for="floatingTextarea">{!! __('faqs.message') !!}</label>
            <textarea class="form-control" id="message" name="message" wire:model.live='message'
                placeholder="{!! __('faqs.enter_message') !!}" rows="3"></textarea>
            @error('message')
                <span class="text text-danger strong-weight">{!! $message !!}</span>
            @enderror
        </div>
        <div class="login-btn">
            <button type="submit" class="shop-btn">{!! __('website.send_now') !!}</button>
        </div>
    </form>
</div>
