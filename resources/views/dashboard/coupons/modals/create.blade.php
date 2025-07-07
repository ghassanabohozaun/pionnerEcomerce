<div class="modal fade" id="createCouponModal" tabindex="-1" role="dialog" aria-labelledby="createCouponModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-md" role="document">
        <form class="form" action="{!! route('dashboard.coupons.store') !!}" method="POST" enctype="multipart/form-data"
            id='create_coupon_form'>
            @csrf
            <div class="modal-content">

                <!--begin::modal header-->
                <div class="modal-header">
                    <h5 class="modal-title test_answer_header" id="createCouponModalLabel">{!! __('coupons.create_new_coupon') !!}</h5>
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
                                        <label for="name">{!! __('coupons.code') !!}</label>
                                        <input type="text" id="code" name="code" class="form-control"
                                            autocomplete="off" placeholder="{!! __('coupons.enter_code') !!}">
                                        <span class="text text-danger">
                                            <strong id="code_error"> </strong>
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
                                        <input type="number" id="discount_percentage" name="discount_percentage"
                                            class="form-control" autocomplete="off"
                                            placeholder="{!! __('coupons.enter_discount_percentage') !!}">
                                        <span class="text text-danger">
                                            <strong id="discount_percentage_error"> </strong>
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
                                        <input type="date" id="start_date" name="start_date" class="form-control"
                                            autocomplete="off" placeholder="{!! __('coupons.enter_start_date') !!}">
                                        <span class="text text-danger">
                                            <strong id="start_date_error"> </strong>
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
                                        <input type="date" id="end_date" name="end_date" class="form-control"
                                            autocomplete="off" placeholder="{!! __('coupons.enter_end_date') !!}">
                                        <span class="text text-danger">
                                            <strong id="end_date_error"> </strong>
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
                                        <input type="number" id="limit" name="limit" class="form-control"
                                            autocomplete="off" placeholder="{!! __('coupons.enter_limit') !!}">
                                        <span class="text text-danger">
                                            <strong id="limit_error"> </strong>
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
                                                    name="is_active" id="colorRadio1" value="1">
                                                <label class="custom-control-label"
                                                    for="colorRadio1">{!! __('general.active') !!}
                                                </label>
                                            </div>
                                            <div class="d-inline-block custom-control custom-radio mr-1">
                                                <input type="radio" class="custom-control-input bg-danger"
                                                    name="is_active" id="colorRadio2" value="0">
                                                <label class="custom-control-label"
                                                    for="colorRadio2">{!! __('general.inactive') !!}
                                                </label>
                                            </div>
                                        </div>
                                        <span class="text text-danger">
                                            <strong id="is_active_error"> </strong>
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
                    <button type="submit" id="create_coupon_btn" class="btn btn-info font-weight-bold ">
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
        // reset
        function resetForm() {

            $('#code').css('border-color', '');
            $('#discount_percentage').css('border-color', '');
            $('#limit').css('border-color', '');
            $('#time_used').css('border-color', '');
            $('#start_date').css('border-color', '');
            $('#end_date').css('border-color', '');
            $('#is_active').css('border-color', '');

            $('#code_error').text('');
            $('#discount_percentage_error').text('');
            $('#limit_error').text('');
            $('#time_used_error').text('');
            $('#start_date_error').text('');
            $('#end_date_error').text('');
            $('#is_active_error').text('');
        }

        // cancel
        $('body').on('click', '#cancel_coupon_btn', function(e) {
            $('#createCouponModal').modal('hide');
            $('#create_coupon_form')[0].reset();
            resetForm();
        });

        // hide
        $('#createCouponModal').on('hidden.bs.modal', function(e) {
            $('#createCouponModal').modal('hide');
            $('#create_coupon_form')[0].reset();
            resetForm();
        });


        // create
        $('#create_coupon_form').on('submit', function(e) {
            e.preventDefault();
            // reset
            resetForm();

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
                        $('#create_coupon_form')[0].reset();
                        resetForm();
                        $('#createCouponModal').modal('hide');
                        flasher.success("{!! __('general.add_success_message') !!}");
                    } else {
                        flasher.error("{!! __('general.add_error_message') !!}");
                    }
                },
                error: function(reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function(key, value) {
                        $('#' + key + '_error').text(value[0]);
                        $('#' + key).css('border-color', '#F64E60');
                    });
                }, //end error
            });

        });
    </script>
@endpush
