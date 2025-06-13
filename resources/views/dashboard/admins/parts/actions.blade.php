<div class="col-xl-12 col-lg-12 mb-1">
    <div class="form-group text-center">
        <a href="{!! route('dashboard.admins.edit', $admin->id) !!}" class=" btn btn-social-icon btn-sm mr-1 btn-outline-primary btn-round">
            <i class="la la-edit"></i>
        </a>


        <a href="#" class="btn btn-social-icon btn-sm mr-1 btn-round  {!! Auth::guard('admin')->id() != $admin->id ? 'delete_admin_btn btn-outline-danger' : ' btn-outline-secondary ' !!} "
            data-id="{!! $admin->id !!}" title = '{!! Auth::guard('admin')->id() == $admin->id ? __('general.prevent_delete') : '' !!}'>
            <i class="la la-trash"></i>
        </a>
        <!-- #endregion -->

    </div>
</div>
