<div class="col-xl-12 col-lg-12 mb-1">
    <div class="form-group text-center">
        <a href="{!! route('dashboard.categories.edit', $category->id) !!}" class=" btn btn-social-icon btn-sm mr-1 btn-outline-primary btn-round">
            <i class="la la-edit"></i>
        </a>

        <a href="#" class="btn btn-social-icon btn-sm mr-1 btn-round  delete_category_btn btn-outline-danger"
            data-id="{!! $category->id !!}">
            <i class="la la-trash"></i>
        </a>
    </div>
</div>
