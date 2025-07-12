<div class="modal fade" id="updateAttributeModal" tabindex="-1" role="dialog" aria-labelledby="updateAttributeModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-md" role="document">
        <form class="form" action="" method="POST" enctype="multipart/form-data" id='update_attribute_form'>
            @csrf
            @method('PUT')
            <div class="modal-content">

                <!--begin::modal header-->
                <div class="modal-header">
                    <h5 class="modal-title test_answer_header" id="updateAttributeModalLabel">{!! __('attributes.update_attribute') !!}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <!--end::modal header-->

                <!--begin::modal body-->
                <div class="modal-body">

                    <!--begin::error message  -->
                    <div class="alert alert-danger mb-2 d-none" id="update_alert_errors">
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
                                        <input type="text" id="id_edit" name="id" class="form-control">
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
                                        <label for="name_ar">{!! __('attributes.name_ar') !!}</label>
                                        <input type="text" id="name_ar_edit" name="name[ar]" class="form-control"
                                            autocomplete="off" placeholder="{!! __('attributes.enter_name_ar') !!}">
                                        <span class="text text-danger">
                                            <strong id="name_ar_edit_error"></strong>
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
                                        <input type="text" id="name_en_edit" name="name[en]" class="form-control"
                                            autocomplete="off" placeholder="{!! __('attributes.enter_name_en') !!}">
                                        <span class="text text-danger">
                                            <strong id="name_en_edit_error"></strong>
                                        </span>

                                    </div>
                                </div>
                                <!-- end: input -->
                            </div>
                            <!-- end: row -->

                            <hr />

                            <!-- begin: row  values inputs-->
                            <div class="row update_attribute_values_row">

                            </div>
                            <!-- end: row values inputs-->

                            <!-- begin: row  add more button-->
                            <div class="row">
                                <!-- begin: input -->
                                <div class="col-md-5">
                                    <button type="button" id="update_add_more_attribute_value"
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
        let editValueIndex = 100; // counter

        // open update modal
        $('body').on('click', '.edit_attribute_button', function(e) {
            e.preventDefault();

            // get  attribute data and attribute values
            let attribute_id = $(this).data('id');
            let attribute_name_ar = $(this).data('name-ar');
            let attribute_name_en = $(this).data('name-en');
            let attribute_values = $(this).data('values');


            $('.update_attribute_values_row').empty();

            // set  attribute data and attribute values
            $('#id_edit').val(attribute_id);
            $('#name_ar_edit').val(attribute_name_ar);
            $('#name_en_edit').val(attribute_name_en);

            // draw attribute values
            var updateAttributeValuesRow = $('.update_attribute_values_row:last');
            updateAttributeValuesRow.empty();
            attribute_values.forEach(value => {
                updateAttributeValuesRow.after(
                    ` <div class="row update_attribute_values_row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <input type="text" id="value_ar_edit" name="value[${value.id}][ar]" class="form-control"
                                        autocomplete="off" placeholder="{!! __('attributes.enter_value_ar') !!}" value="${value.value_ar}">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <input type="text" id="value_en_edit" name="value[${value.id}][en]" class="form-control"
                                        autocomplete="off" placeholder="{!! __('attributes.enter_value_en') !!}" value="${value.value_en}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <button  type="button"
                                        class="btn btn-sm btn-outline-danger update_delete_attribute_value">
                                        <i class="la la-trash"></i>
                                    </button>

                                </div>
                            </div>
                        </div>`
                ); // end after

            }); //end foreach


            // show modal
            $('#updateAttributeModal').modal('show');
        });


        // add more attribute value
        $('body').on('click', '#update_add_more_attribute_value', function(e) {
            e.preventDefault();

            let newRow = ` <div class="row update_attribute_values_row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <input type="text" id="value_ar" name="value[${editValueIndex}][ar]" class="form-control"
                                            autocomplete="off" placeholder="{!! __('attributes.enter_value_ar') !!}">
                                        <span class="text text-danger">
                                            <strong id="value_ar_error"></strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <input type="text" id="value_en" name="value[${editValueIndex}][en]" class="form-control"
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

            $('.update_attribute_values_row:last').after(newRow);
            editValueIndex++; //increment

        })

        // remove attribute value  row
        $('body').on('click', '.update_delete_attribute_value', function(e) {
            e.preventDefault();
            $(this).closest('.update_attribute_values_row').remove();
        });

        // cancel modal
        $('body').on('click', '#cancel_attribute_btn', function(e) {
            $('#updateAttributeModal').modal('hide');
            $('#update_attribute_form')[0].reset();
            $('#update_alert_errors').find('ul').empty();
            $('#update_alert_errors').addClass('d-none');
        });

        // hide modal
        $('#updateAttributeModal').on('hidden.bs.modal', function(e) {
            $('#updateAttributeModal').modal('hide');
            $('#update_attribute_form')[0].reset();
            $('#update_alert_errors').find('ul').empty();
            $('#update_alert_errors').addClass('d-none');
        });


        // update  attribute
        $('#update_attribute_form').on('submit', function(e) {
            e.preventDefault();

            // paramters
            var attributeId = $('#id_edit').val();
            var currentPage = $('#yajra-datatable').DataTable().page();
            var data = new FormData(this);
            var type = $(this).attr('method');
            var url = "{!! route('dashboard.attributes.update', 'id') !!}".replace('id', attributeId);

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
                        $('#update_attribute_form')[0].reset();
                        $('#update_alert_errors').find('ul').empty();
                        $('#update_alert_errors').addClass('d-none');
                        $('#updateAttributeModal').modal('hide');
                        flasher.success("{!! __('general.update_success_message') !!}");
                    } else {
                        flasher.error("{!! __('general.update_error_message') !!}");
                    }
                },
                error: function(reject) {
                    var response = $.parseJSON(reject.responseText);
                    updateAttributePrintErrors(response.errors);
                }, //end error
            });

        });


        // Print Update Errors Function
        function updateAttributePrintErrors(msg) {
            $('#update_alert_errors').find('ul').empty();
            $('#update_alert_errors').removeClass('d-none');
            $.each(msg, function(key, value) {
                $('#update_alert_errors').find('ul').append("<li>" + value[0] + "</li>");
            });
        }
    </script>
@endpush
