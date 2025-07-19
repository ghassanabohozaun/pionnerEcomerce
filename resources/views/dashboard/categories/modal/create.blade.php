<div class="modal fade" id="createCategoryModal" tabindex="-1" role="dialog" aria-labelledby="createCategoryModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-md" role="document">
        <form class="form" action="{!! route('dashboard.categories.store') !!}" method="POST" enctype="multipart/form-data"
            id='create_category_form'>
            @csrf
            <div class="modal-content">

                <!--begin::modal header-->
                <div class="modal-header  mb-2">
                    <h5 class="modal-title test_answer_header" id="createCategoryModalLabel">{!! __('categories.create_new_category') !!}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <!--end::modal header-->

                <!--begin::modal header-->
                <div class="modal-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-lg-12">

                                <!-- begin: row -->
                                <div class="row">
                                    <!-- begin: input -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">{!! __('categories.name_ar') !!}</label>
                                            <input type="text" id="name" name="name[ar]"
                                                value="{!! old('name.ar') !!}" class="form-control border-primary"
                                                autocomplete="off" placeholder="{!! __('categories.enter_name_ar') !!}">
                                            @error('name.ar')
                                                <span class="text text-danger">
                                                    <strong>{!! $message !!}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- end: input -->
                                </div>
                                <!-- end: row -->

                                <!-- begin: row -->
                                <div class="row">
                                    <!-- begin: input -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">{!! __('categories.name_en') !!}</label>
                                            <input type="text" id="name" name="name[en]"
                                                value="{!! old('name.en') !!}" class="form-control border-primary"
                                                autocomplete="off" placeholder="{!! __('categories.enter_name_en') !!}">
                                            @error('name.en')
                                                <span class="text text-danger">
                                                    <strong>{!! $message !!}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- end: input -->
                                </div>
                                <!-- end: row -->

                                <!-- begin: row -->
                                <div class="row">
                                    <!-- begin: input -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="role_id">{!! __('categories.parent') !!}</label>
                                            <select class="form-control border-primary" id='parent' name="parent">
                                                <option value="" selected="">
                                                    {!! __('general.select_from_list') !!}
                                                </option>
                                                @foreach ($parentCategoires as $parentcategory)
                                                    <option value="{!! $parentcategory->id !!}" {!! old('parent') == $parentcategory->id ? 'selected' : '' !!}>
                                                        {!! $parentcategory->name !!}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('parent')
                                                <span class="text text-danger">
                                                    <strong>{!! $message !!}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- end: input -->
                                </div>
                                <!-- end: row -->


                                <!-- begin: row -->
                                <div class="row">
                                    <!-- begin: input -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="logo">{!! __('categories.status') !!}</label>
                                            <div class="input-group">
                                                <div class="d-inline-block custom-control custom-radio mr-1">
                                                    <input type="radio" class="custom-control-input bg-success"
                                                        name="status" id="colorRadio1" value="1">
                                                    <label class="custom-control-label"
                                                        for="colorRadio1">{!! __('general.active') !!}
                                                    </label>
                                                </div>
                                                <div class="d-inline-block custom-control custom-radio mr-1">
                                                    <input type="radio" class="custom-control-input bg-danger"
                                                        name="status" id="colorRadio2" value="0">
                                                    <label class="custom-control-label"
                                                        for="colorRadio2">{!! __('general.inactive') !!}
                                                    </label>
                                                </div>
                                            </div>
                                            @error('status')
                                                <span class="text text-danger">
                                                    <strong>{!! $message !!}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- end: input -->
                                </div>
                                <!-- end: row -->



                            </div>
                            <!--end: form-->
                        </div>
                    </div>
                </div>
                <!--end::modal header-->

                <!--begin::modal footer-->
                <div class="modal-footer">
                    <button type="submit" id="create_category_btn" class="btn btn-info font-weight-bold ">
                        {{ trans('general.save') }}
                    </button>

                    <button type="button" class="btn btn-light-dark font-weight-bold" data-dismiss="modal">
                        {{ trans('general.cancel') }}</button>
                </div>
                <!--end::modal footer-->

            </div>
        </form>
    </div>
</div>

@push('scripts')
    @if ($errors->any())
        <script type="text/javascript">
            $(document).ready(function() {
                $('#createCategoryModal').modal('show');
            })
        </script>
    @endif
@endpush
