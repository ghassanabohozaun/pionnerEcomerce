<div class="modal fade" id="create_brand_modal" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdrop" aria-hidden="true">

    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">

            <div class="modal-header  mb-2">
                <h5 class="modal-title test_answer_header" id="exampleModalLabel">{!! __('brands.create_new_brand') !!}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <form class="form" action="{!! route('dashboard.brands.store') !!}" method="POST" enctype="multipart/form-data"
                id='create_brand_form'>
                @csrf

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
                                            <input type="text" id="name_ar" name="name[ar]"
                                                value="{!! old('name.ar') !!}" class="form-control" autocomplete="off"
                                                placeholder="{!! __('brands.enter_brand_ar') !!}">
                                            <span class="text text-danger">
                                                <strong id='name_ar_error'> </strong>
                                            </span>

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
                                            <input type="text" id="name_en" name="name[en]"
                                                value="{!! old('name.en') !!}" class="form-control" autocomplete="off"
                                                placeholder="{!! __('brands.enter_brand_en') !!}">
                                            <span class="text text-danger">
                                                <strong id='name_en_error'> </strong>
                                            </span>
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
                                            <input type="file" id="logo" name="logo" class="form-control">
                                            <span class="text text-danger">
                                                <strong id="logo_error"></strong>
                                            </span>
                                        </div>
                                    </div>
                                    <!-- end: input -->
                                </div>
                                <!-- end: row -->


                                <!-- begin: row -->
                                <div class="row">
                                    <!-- begin: input -->
                                    <div class="col-md-12">
                                        <fieldset>
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
                                        </fieldset>
                                        <span class="text text-danger">
                                            <strong id="status_error"></strong>
                                        </span>

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

                <div class="modal-footer">
                    <button type="submit" id="create_brand_btn" class="btn btn-info font-weight-bold ">
                        {{ trans('general.save') }}
                    </button>
                    <button type="button" id="cancel_brand_btn" class="btn btn-light-dark font-weight-bold">
                        {{ trans('general.cancel') }}
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
@push('scripts')
    <script type="text/javascript">
        // reset modal function
        function resetCreateBrandModal() {
            // reset form
            $('#create_brand_form')[0].reset();

            // reset border color
            $('#name_ar').css('border-color', '');
            $('#name_en').css('border-color', '');
            $('#status').css('border-color', '');
            $('#logo').css('border-color', '');

            // reset erorr message
            $('#name_ar_error').text('');
            $('#name_en_error').text('');
            $('#status_error').text('');
            $('#logo_error').text('');
        }

        // cancel modal
        $('body').on('click', '#cancel_brand_btn', function(e) {
            $('#create_brand_modal').modal('hide');
            resetCreateBrandModal()
        });

        // hide  modal
        $('#create_brand_modal').on('hidden.bs.modal', function(e) {
            $('#create_brand_modal').modal('hide');
            resetCreateBrandModal()
        });

        // show modal
        $('body').on('click', '.create_brand_show_modal', function(e) {
            e.preventDefault()
            $('#create_brand_modal').modal('show');
        });

        $('#create_brand_form').on('submit', function(e) {
            e.preventDefault();

            $('#name_ar').css('border-color', '');
            $('#name_en').css('border-color', '');
            $('#status').css('border-color', '');
            $('#logo').css('border-color', '');

            $('#name_ar_error').text('');
            $('#name_en_error').text('');
            $('#status_error').text('');
            $('#logo_error').text('');


            var url = $(this).attr('action');
            var type = $(this).attr('method');
            var data = new FormData(this);

            $.ajax({
                data: data,
                url: url,
                type: type,
                dataType: 'json',
                contentType: false,
                processData: false,
                cache: false,
                success: function(data) {

                    if (data.status == true) {
                        $('#create_brand_modal').modal('hide');
                        $('#yajra-datatable').DataTable().ajax.reload();
                        resetCreateBrandModal();
                        flasher.success("{!! __('general.add_success_message') !!}");
                    } else {
                        flasher.error("{!! __('general.add_error_message') !!}");
                    }

                }, //end success

                error: function(reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function(key, value) {
                        if (key == 'name.en') {
                            key = 'name_en';
                        } else if (key == 'name.ar') {
                            key = 'name_ar';
                        }
                        console.log(key);
                        $('#' + key + '_error').text(value[0]);
                        $('#' + key).css('border-color', '#F64E60');
                    });
                }, //end error
            }); //end ajax
        });
    </script>
@endpush
@push('css')
    <style>
        .table-wrapper {
            max-height: 350px;
            overflow: auto;
            display: inline-block;
        }

        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: middle;
            border-top: 1px solid #EBEDF3;
        }

        .notfound {
            text-align: center;
            font-size: 12px;
            font-weight: bolder;
        }
    </style>
@endpush
