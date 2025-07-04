<div class="form-group">
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">

        <a href="#" class="btn btn-sm btn-outline-primary update_brand_show_modal" title="{!! __('general.edit') !!}"
            data-id="{!! $brand->id !!}">
            <i class="la la-edit"></i>
        </a>

        <div class="btn-group" role="group">
            <a href="#" id="btnGroupDrop2" type="button" class="btn btn-outline-danger dropdown-toggle  btn-sm"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="  {!! __('general.delete') !!}">
                <i class="la la-trash"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="btnGroupDrop2">
                <a class="dropdown-item delete_brand_btn" href="#" data-id="{!! $brand->id !!}">
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
