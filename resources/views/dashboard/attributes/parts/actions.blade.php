<div class="form-group">
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
        {{-- edit --}}
        <a href="#" class="btn btn-sm btn-outline-primary edit_attribute_button" title="{!! __('general.edit') !!}"
            data-id="{!! $attribute->id !!}" data-name-ar ="{!! $attribute->getTranslation('name', 'ar') !!}"
            data-name-en ="{!! $attribute->getTranslation('name', 'en') !!}"
            data-values ="{{ $attribute->attributeValues->map(
                    fn($value) => [
                        'id' => $value->id,
                        'value_ar' => $value->getTranslation('value', 'ar'),
                        'value_en' => $value->getTranslation('value', 'en'),
                    ],
                )->toJson() }}">
            <i class="la la-edit"></i>
        </a>


        {{-- delete --}}
        <button class="btn btn-sm btn-outline-danger delete_attribute_btn" title="{!! __('general.delete') !!}"
            data-id="{!! $attribute->id !!}">
            <i class="la la-trash"></i>
        </button>

    </div>
</div>
