<div class="modal fade" id="editCouponModal" tabindex="-1" role="dialog" aria-labelledby="editCouponModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-md" role="document">
        <form class="form" action="" method="POST" enctype="multipart/form-data" id='edit_coupon_form'>
            @csrf
            @method('PUT')
            <div class="modal-content">

                <!--begin::modal header-->
                <div class="modal-header">
                    <h5 class="modal-title test_answer_header" id="editCouponModalLabel">{!! __('coupons.update_coupon') !!}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <!--end::modal header-->

                <!--begin::modal body-->
                <div class="modal-body">

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
                                        <label for="name">{!! __('coupons.code') !!}</label>
                                        <input type="text" id="code_edit" name="code" class="form-control"
                                            autocomplete="off" placeholder="{!! __('coupons.enter_code') !!}">
                                        <span class="text text-danger">
                                            <strong id="code_error_edit"> </strong>
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
                                        <label for="name">{!! __('coupons.discount_percentage') !!}</label>
                                        <input type="number" id="discount_percentage_edit" name="discount_percentage"
                                            class="form-control" autocomplete="off"
                                            placeholder="{!! __('coupons.enter_discount_percentage') !!}">
                                        <span class="text text-danger">
                                            <strong id="discount_percentage_error_edit"> </strong>
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
                                        <label for="name">{!! __('coupons.start_date') !!}</label>
                                        <input type="date" id="start_date_edit" name="start_date"
                                            class="form-control" autocomplete="off"
                                            placeholder="{!! __('coupons.enter_start_date') !!}">
                                        <span class="text text-danger">
                                            <strong id="start_date_error_edit"> </strong>
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
                                        <label for="name">{!! __('coupons.end_date') !!}</label>
                                        <input type="date" id="end_date_edit" name="end_date" class="form-control"
                                            autocomplete="off" placeholder="{!! __('coupons.enter_end_date') !!}">
                                        <span class="text text-danger">
                                            <strong id="end_date_error_edit"> </strong>
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
                                        <label for="name">{!! __('coupons.limit') !!}</label>
                                        <input type="number" id="limit_edit" name="limit" class="form-control"
                                            autocomplete="off" placeholder="{!! __('coupons.enter_limit') !!}">
                                        <span class="text text-danger">
                                            <strong id="limit_error_edit"> </strong>
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
                                        <label for="status">{!! __('coupons.is_active') !!}</label>
                                        <div class="input-group">
                                            <div class="d-inline-block custom-control custom-radio mr-1">
                                                <input type="radio" class="custom-control-input bg-success"
                                                    name="is_active" id="active_status_edit" value="1">
                                                <label class="custom-control-label"
                                                    for="active_status_edit">{!! __('general.active') !!}
                                                </label>
                                            </div>
                                            <div class="d-inline-block custom-control custom-radio mr-1">
                                                <input type="radio" class="custom-control-input bg-danger"
                                                    name="is_active" id="inactive_status_edit" value="0">
                                                <label class="custom-control-label"
                                                    for="inactive_status_edit">{!! __('general.inactive') !!}
                                                </label>
                                            </div>
                                        </div>
                                        <span class="text text-danger">
                                            <strong id="is_active_error_edit"> </strong>
                                        </span>
                                    </div>
                                </div>
                                <!-- end: input -->
                            </div>
                            <!-- end: row -->

                        </div>
                    </div>
                    <!--end: form-->
                </div>
                <!--end::modal body-->

                <!--begin::modal footer-->
                <div class="modal-footer">
                    <button type="submit" id="edit_coupon_btn" class="btn btn-info font-weight-bold ">
                        {{ trans('general.save') }}
                    </button>

                    <button type="button" id="cancel_coupon_btn" class="btn btn-light-dark font-weight-bold"
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
        // edit button click
        $('body').on('click', '.edit_coupon_button', function(e) {
            e.preventDefault();
            // get data
            var id = $(this).attr('coupon-id');
            var code = $(this).attr('coupon-code');
            var discount_percentage = $(this).attr('coupon-discount_percentage');
            var start_date = $(this).attr('coupon-start_date');
            var end_date = $(this).attr('coupon-end_date');
            var limit = $(this).attr('coupon-limit');
            var is_active = $(this).attr('coupon-is_active');

            // set data
            $('#id_edit').val(id);
            $('#code_edit').val(code);
            $('#discount_percentage_edit').val(discount_percentage);
            $('#start_date_edit').val(start_date);
            $('#end_date_edit').val(end_date);
            $('#limit_edit').val(limit);
            $('#is_active_edit').val(is_active);

            if (is_active == 1) {
                $('#active_status_edit').prop('checked', true);
            } else {
                $('#inactive_status_edit_edit').prop('checked', true);
            }

            $('#editCouponModal').modal('show');

        })

        // reset form
        function resetForm() {

            $('#code_edit').css('border-color', '');
            $('#discount_percentage_edit').css('border-color', '');
            $('#limit_edit').css('border-color', '');
            $('#time_used_edit').css('border-color', '');
            $('#start_date_edit').css('border-color', '');
            $('#end_date_edit').css('border-color', '');
            $('#is_active_edit').css('border-color', '');

            $('#code_error_edit').text('');
            $('#discount_percentage_error_edit').text('');
            $('#limit_error_edit').text('');
            $('#time_used_error_edit').text('');
            $('#start_date_error_edit').text('');
            $('#end_date_error_edit').text('');
            $('#is_active_error_edit').text('');
        }

        // cancel
        $('body').on('click', '#cancel_coupon_btn', function(e) {
            $('#editCouponModal').modal('hide');
            $('#edit_coupon_form')[0].reset();
            resetForm();
        });

        // hide
        $('#editCouponModal').on('hidden.bs.modal', function(e) {
            $('#editCouponModal').modal('hide');
            $('#edit_coupon_form')[0].reset();
            resetForm();
        });


        // update
        $('#edit_coupon_form').on('submit', function(e) {
            e.preventDefault();
            // reset
            resetForm();

            // paramters
            var currentPage = $('#yajra-datatable').DataTable().page();
            var coupon_id = $('#id_edit').val();
            var data = new FormData(this);
            var type = $(this).attr('method');

            $.ajax({
                url: "{{ route('dashboard.coupons.update', 'id') }}".replace('id', coupon_id),
                data: data,
                type: type,
                dataType: 'json',
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.status == true) {
                        $('#yajra-datatable').DataTable().page(currentPage).draw(false);
                        $('#edit_coupon_form')[0].reset();
                        resetForm();
                        $('#editCouponModal').modal('hide');
                        flasher.success("{!! __('general.add_success_message') !!}");
                    } else {
                        flasher.error("{!! __('general.add_error_message') !!}");
                    }
                },
                error: function(reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function(key, value) {
                        $('#' + key + '_error_edit').text(value[0]);
                        $('#' + key + '_edit').css('border-color', '#F64E60');
                    });
                }, //end error
            });

        });
    </script>
@endpush
