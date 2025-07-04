<div class="form-group">
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
        <a href="{!! route('dashboard.categories.edit', $category->id) !!}" class="btn btn-sm btn-outline-primary" title="{!! __('general.edit') !!}">
            <i class="la la-edit"></i>
        </a>
        <div class="btn-group" role="group">
            <a href="#" id="btnGroupDrop2" type="button" class="btn btn-outline-danger dropdown-toggle  btn-sm"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="  {!! __('general.delete') !!}">
                <i class="la la-trash"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="btnGroupDrop2">
                <a class="dropdown-item delete_category_btn" href="#" data-id="{!! $category->id !!}">
                    <i class="la la-trash-o"></i>
                    {!! __('general.delete') !!}
                </a>
                <a class="dropdown-item" href="#">
                    <i class="la la-trash"></i>
                    {!! __('general.force_delete') !!}
                </a>
            </div>
        </div>
    </div>
</div>
