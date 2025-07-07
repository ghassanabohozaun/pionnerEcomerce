<div class="modal fade" id="createBrandModal" tabindex="-1" role="dialog" aria-labelledby="createBrandModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-md" role="document">
        <form class="form" action="{!! route('dashboard.brands.store') !!}" method="POST" enctype="multipart/form-data"
            id='create_brand_form'>
            @csrf
            <div class="modal-content">
                <!--begin::modal header-->
                <div class="modal-header  mb-2">
                    <h5 class="modal-title test_answer_header" id="createBrandModalLabel">{!! __('brands.create_new_brand') !!}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <!--end::modal header-->

                <!--begin::modal body-->
                <div class="modal-body">
                    <!--begin::table-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-md-12">

                                <!-- begin: row -->
                                <div class="row">
                                    <!-- begin: input -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">{!! __('brands.brand_ar') !!}</label>
                                            <input type="text" id="name" name="name[ar]"
                                                value="{!! old('name.ar') !!}" class="form-control border-primary"
                                                autocomplete="off" placeholder="{!! __('brands.enter_brand_ar') !!}">
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
                                            <label for="name">{!! __('brands.brand_en') !!}</label>
                                            <input type="text" id="name" name="name[en]"
                                                value="{!! old('name.en') !!}" class="form-control border-primary "
                                                autocomplete="off" placeholder="{!! __('brands.enter_brand_en') !!}">
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
                                            <label for="logo">{!! __('brands.logo') !!}</label>
                                            <input type="file" id="single_image_create" name="logo"
                                                class="form-control border-primary ">
                                            @error('logo')
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
                                            <label for="status">{!! __('brands.status') !!}</label>
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
                                        </div>
                                        @error('status')
                                            <span class="text text-danger">
                                                <strong id="status_error">{!! $message !!}</strong>
                                            </span>
                                        @enderror


                                    </div>
                                    <!-- end: input -->
                                </div>
                                <!-- end: row -->

                            </div>
                        </div>
                        <!--end: form-->
                    </div>
                    <!--end::table-->
                </div>
                <!--end::modal body-->

                <!--begin::modal footer-->
                <div class="modal-footer">
                    <button type="submit" id="create_brand_btn" class="btn btn-info font-weight-bold ">
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
                $('#createBrandModal').modal('show');
            })
        </script>
    @endif

    <script type="text/javascript">
        var lang = "{!! Lang() !!}";

        $("#single_image_create").fileinput({
            theme: 'fa5',
            language: lang,
            allowedFileTypes: ['image'],
            maxFileCount: 1,
            enableResumableUpload: true,
            initialPreviewAsData: true,
            allowedFileTypes: ['image'],
            showCancel: false,
            showUpload: false,
        });
    </script>
@endpush
