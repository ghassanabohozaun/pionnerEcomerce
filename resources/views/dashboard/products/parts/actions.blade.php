<div class="form-group">
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">

        {{-- edit --}}
        <a href="{!! route('dashboard.products.edit', $product->id) !!}" class="btn btn-sm btn-outline-primary" title="{!! __('general.edit') !!}">
            <i class="la la-edit"></i>
        </a>
        {{-- show --}}
        <a href="{!! route('dashboard.products.show', $product->id) !!}" class="btn btn-sm btn-outline-success" title="{!! __('general.show') !!}">
            <i class="la la-eye"></i>
        </a>

        {{-- delete --}}
        <button class="btn btn-sm btn-outline-danger delete_product_btn" title="{!! __('general.delete') !!}"
            data-id="{!! $product->id !!}">
            <i class="la la-trash"></i>
        </button>

    </div>
</div>
