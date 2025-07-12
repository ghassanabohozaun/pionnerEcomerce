<div class="modal fade" id="createAttributeModal" tabindex="-1" role="dialog" aria-labelledby="createAttributeModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-md" role="document">
        <form class="form" action="{!! route('dashboard.attributes.store') !!}" method="POST" enctype="multipart/form-data"
            id='create_attribute_form'>
            @csrf
            <div class="modal-content">

                <!--begin::modal header-->
                <div class="modal-header">
                    <h5 class="modal-title test_answer_header" id="createAttributeModalLabel">{!! __('attributes.create_new_attribute') !!}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <!--end::modal header-->

                <!--begin::modal body-->
                <div class="modal-body">

                    <!--begin::error message  -->
                    <div class="alert alert-danger mb-2 d-none" id="alert_errors">
                        <ul></ul>
                    </div>
                    <!--end::error message-->
                    <div class="row">
                        <div class="col-lg-12">

                            <!-- begin: row -->
                            <div class="row">
                                <!-- begin: input -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name_ar">{!! __('attributes.name_ar') !!}</label>
                                        <input type="text" id="name_ar" name="name[ar]" class="form-control"
                                            autocomplete="off" placeholder="{!! __('attributes.enter_name_ar') !!}">
                                        <span class="text text-danger">
                                            <strong id="name_ar_error"></strong>
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
                                        <label for="name_en">{!! __('attributes.name_en') !!}</label>
                                        <input type="text" id="name_en" name="name[en]" class="form-control"
                                            autocomplete="off" placeholder="{!! __('attributes.enter_name_en') !!}">
                                        <span class="text text-danger">
                                            <strong id="name_en_error"></strong>
                                        </span>

                                    </div>
                                </div>
                                <!-- end: input -->
                            </div>
                            <!-- end: row -->

                            <hr />

                            <!-- begin: row  values inputs-->
                            <div class="row attribute_values_row">
                                <!-- begin: input -->
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <input type="text" id="value_1_ar" name="value[1][ar]" class="form-control"
                                            autocomplete="off" placeholder="{!! __('attributes.enter_value_ar') !!}">
                                        <span class="text text-danger">
                                            <strong id="value_ar_error"></strong>
                                        </span>
                                    </div>
                                </div>
                                <!-- end: input -->

                                <!-- begin: input -->
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <input type="text" id="value_1_en" name="value[1][en]" class="form-control"
                                            autocomplete="off" placeholder="{!! __('attributes.enter_value_en') !!}">
                                        <span class="text text-danger">
                                            <strong id="value_en_error"></strong>
                                        </span>
                                    </div>
                                </div>
                                <!-- end: input -->

                                <!-- begin: input -->
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <button disabled type="button"
                                            class="btn btn-sm btn-outline-danger delete_attribute_value">
                                            <i class="la la-trash"></i>
                                        </button>

                                    </div>
                                </div>
                                <!-- end: input -->
                            </div>
                            <!-- end: row values inputs-->

                            <!-- begin: row  add more button-->
                            <div class="row">
                                <!-- begin: input -->
                                <div class="col-md-5">
                                    <button type="button" id="add_more_attribute_value"
                                        class="btn btn-sm btn-outline-success">
                                        <i class="la la-plus"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- end: row  plus button-->
                        </div>
                    </div>
                    <!--end: form-->
                </div>
                <!--end::modal body-->

                <!--begin::modal footer-->
                <div class="modal-footer">
                    <button type="submit" id="create_attribute_btn" class="btn btn-info font-weight-bold ">
                        {{ trans('general.save') }}
                    </button>

                    <button type="button" id="cancel_attribute_btn" class="btn btn-light-dark font-weight-bold"
                        data-dismiss="modal">
                        {{ trans('general.cancel') }}
                    </button>
                </div>
                <!--end::modal footer-->

            </div>
        </form>
    </div>
</div>

@push('scripts')
    <script type="text/javascript">
        let valueIndex = 2; // counter

        // add more attribute values
        $('body').on('click', '#add_more_attribute_value', function(e) {
            e.preventDefault();


            let newRow = ` <div class="row attribute_values_row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <input type="text" id="value_ar" name="value[${valueIndex}][ar]" class="form-control"
                                            autocomplete="off" placeholder="{!! __('attributes.enter_value_ar') !!}">
                                        <span class="text text-danger">
                                            <strong id="value_ar_error"></strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <input type="text" id="value_en" name="value[${valueIndex}][en]" class="form-control"
                                            autocomplete="off" placeholder="{!! __('attributes.enter_value_en') !!}">
                                        <span class="text text-danger">
                                            <strong id="value_en_error"></strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <button  type="button"
                                            class="btn btn-sm btn-outline-danger delete_attribute_value">
                                            <i class="la la-trash"></i>
                                        </button>

                                    </div>
                                </div>
                            </div>`;

            $('.attribute_values_row:last').after(newRow);
            valueIndex++; //increment
        })

        // remove attribute value row
        $('body').on('click', '.delete_attribute_value', function(e) {
            e.preventDefault();
            $(this).closest('.attribute_values_row').remove();

        });


        // cancel modal
        $('body').on('click', '#cancel_attribute_btn', function(e) {
            $('#createAttributeModal').modal('hide');
            $('#create_attribute_form')[0].reset();
            $('#alert_errors').find('ul').empty();
            $('#alert_errors').addClass('d-none');
        });

        // hide modal
        $('#createAttributeModal').on('hidden.bs.modal', function(e) {
            $('#createAttributeModal').modal('hide');
            $('#create_attribute_form')[0].reset();
            $('#alert_errors').find('ul').empty();
            $('#alert_errors').addClass('d-none');
        });


        // create attribute
        $('#create_attribute_form').on('submit', function(e) {
            e.preventDefault();

            // paramters
            var currentPage = $('#yajra-datatable').DataTable().page();
            var data = new FormData(this);
            var type = $(this).attr('method');
            var url = $(this).attr('action');

            $.ajax({
                url: url,
                data: data,
                type: type,
                dataType: 'json',
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.status == true) {
                        console.log(data);
                        $('#yajra-datatable').DataTable().page(currentPage).draw(false);
                        $('#create_attribute_form')[0].reset();
                        $('#alert_errors').find('ul').empty();
                        $('#alert_errors').addClass('d-none');
                        $('#createAttributeModal').modal('hide');
                        flasher.success("{!! __('general.add_success_message') !!}");
                    } else {
                        flasher.error("{!! __('general.add_error_message') !!}");
                    }
                },
                error: function(reject) {
                    var response = $.parseJSON(reject.responseText);
                    attributePrintErrors(response.errors);
                }, //end error
            });

        });

        // Print Errors Function
        function attributePrintErrors(msg) {
            $('#alert_errors').find('ul').empty();
            $('#alert_errors').removeClass('d-none');
            $.each(msg, function(key, value) {
                $('#alert_errors').find('ul').append("<li>" + value[0] + "</li>");
            });
        }
    </script>
@endpush
