<div class="col-xl-12 col-lg-12 mb-1">
    <div class="form-group text-center">
        <a href="{!! route('dashboard.admins.edit', $admin->id) !!}" class=" btn btn-social-icon btn-sm mr-1 btn-outline-primary btn-round">
            <i class="la la-edit"></i>
        </a>

        <a href="#" class="btn btn-social-icon btn-sm mr-1 btn-outline-danger btn-round  delete_admin_btn"
            data-id="{!! $admin->id !!}">
            <i class="la la-trash"></i>
        </a>

    </div>
</div>
