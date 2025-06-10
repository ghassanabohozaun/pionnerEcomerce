<div class="col-xl-12 col-lg-12 mb-1">
    <div class="form-group text-center">
        <a href="{!! route('dashboard.roles.edit', $role->id) !!}" class=" btn btn-social-icon btn-sm mr-1 btn-outline-primary btn-round">
            <i class="la la-edit"></i>
        </a>

        {{-- <a href="javascript:void(0)"
            onclick="if(confirm('Are you want to delete recors')) {document.getElementById('delete_form_{{ $role->id }}').submit();} return false"
            class="btn btn-social-icon btn-sm mr-1 btn-outline-danger btn-round ">
            <i class="la la-trash"></i>
        </a> --}}

        <a href="#" class="btn btn-social-icon btn-sm mr-1 btn-outline-danger btn-round  delete_role_btn"
            data-id="{!! $role->id !!}">
            <i class="la la-trash"></i>
        </a>

    </div>
</div>
