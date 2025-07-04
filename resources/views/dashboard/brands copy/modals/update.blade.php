<div class="modal fade" id="update_brand_modal" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdrop" aria-hidden="true">

    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">

            <div class="modal-header  mb-2">
                <h5 class="modal-title test_answer_header" id="exampleModalLabel">{!! __('brands.update_brand') !!}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <form class="form" action="{!! route('dashboard.brands.update') !!}" method="POST" enctype="multipart/form-data"
                id='update_brand_form'>
                @csrf

                <div class="modal-body">
                    <!--begin::table-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-md-12">
                                <!-- begin: row -->
                                <div class="row">
                                    <!-- begin: input -->
                                    <div class="col-md-12 d-none">
                                        <input type="hidden" name="id" id='id'>
                                        <input type="hidden" name="hidden_photo" id='hidden_photo'
                                            value="hidden_photo">
                                    </div>
                                </div>
                                <!-- end: row -->

                                <!-- begin: row -->
                                <div class="row">
                                    <!-- begin: input -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">{!! __('brands.brand_ar') !!}</label>
                                            <input type="text" id="update_name_ar" name="name[ar]"
                                                class="form-control" autocomplete="off"
                                                placeholder="{!! __('brands.enter_brand_ar') !!}">
                                            <span class="text text-danger">
                                                <strong id='update_name_ar_error'> </strong>
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
                                            <label for="name">{!! __(key: 'brands.brand_en') !!}</label>
                                            <input type="text" id="update_name_en" name="name[en]"
                                                class="form-control" autocomplete="off"
                                                placeholder="{!! __('brands.enter_brand_en') !!}">
                                            <span class="text text-danger">
                                                <strong id='update_name_en_error'> </strong>
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
                                            <input type="file" id="update_logo" name="logo" class="form-control">
                                            <span class="text text-danger">
                                                <strong id="update_logo_error"></strong>
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
                                            <div
                                                class="d-inline-block custom-control custom-radio custom-radio-lg mr-1">
                                                <input type="radio" class="custom-control-input bg-success"
                                                    name="status" id="update_active_radio" value="1">
                                                <label class="custom-control-label"
                                                    for="update_active_radio">{!! __('general.active') !!}
                                                </label>
                                            </div>
                                            <div
                                                class="d-inline-block custom-control custom-radio custom-radio-lg mr-1">
                                                <input type="radio" class="custom-control-input bg-danger"
                                                    name="status" id="update_inactive_radio" value="0">
                                                <label class="custom-control-label"
                                                    for="update_inactive_radio">{!! __('general.inactive') !!}
                                                </label>
                                            </div>
                                        </fieldset>
                                        <span class="text text-danger">
                                            <strong id="update_status_error"></strong>
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
                    <button type="submit" id="update_brand_btn" class="btn btn-info font-weight-bold ">
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
        function resetUpdateBrandModal() {
            // reset form
            $('#update_brand_form')[0].reset();

            // reset border color
            $('#update_name_ar').css('border-color', '');
            $('#update_name_en').css('border-color', '');
            $('#update_status').css('border-color', '');
            $('#update_logo').css('border-color', '');

            // reset erorr message
            $('#update_name_ar_error').text('');
            $('#update_name_en_error').text('');
            $('#update_status_error').text('');
            $('#update_logo_error').text('');
        }

        // cancel modal
        $('body').on('click', '#cancel_brand_btn', function(e) {
            $('#update_brand_modal').modal('hide');
            resetUpdateBrandModal()
        });

        // hide  modal
        $('#update_brand_modal').on('hidden.bs.modal', function(e) {
            $('#update_brand_modal').modal('hide');
            resetUpdateBrandModal()
        });

        // show modal
        $('body').on('click', '.update_brand_show_modal', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            resetUpdateBrandModal();
            $.ajax({
                url: "{!! route('dashboard.brands.get.one.brand') !!}",
                data: {
                    id: id
                },
                type: 'get',
                dataType: 'json',
                success: function(data) {
                    console.log(data.data);
                    $('#id').val(data.data.id);
                    $('#update_name_ar').val(data.data.name['ar']);
                    $('#update_name_en').val(data.data.name['en']);
                    if (data.data.status == 1) {
                        $('#update_active_radio').prop('checked', true);
                    } else {
                        $('#update_inactive_radio').prop('checked', true);
                    }
                    $('#update_brand_modal').modal('show');
                }
            });


        });

        // update brand
        $('#update_brand_form').on('submit', function(e) {
            e.preventDefault();

            $('#update_name_ar').css('border-color', '');
            $('#update_name_en').css('border-color', '');
            $('#update_status').css('border-color', '');
            $('#update_logo').css('border-color', '');

            $('#update_name_ar_error').text('');
            $('#update_name_en_error').text('');
            $('#update_status_error').text('');
            $('#update_logo_error').text('');


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
                        $('#update_brand_modal').modal('hide');
                        $('#yajra-datatable').DataTable().ajax.reload();
                        resetUpdateBrandModal();
                        flasher.success("{!! __('general.update_success_message') !!}");
                    } else {
                        flasher.error("{!! __('general.update_error_message') !!}");
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
                        $('#update_' + key + '_error').text(value[0]);
                        $('#update_' + key).css('border-color', '#F64E60');
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
