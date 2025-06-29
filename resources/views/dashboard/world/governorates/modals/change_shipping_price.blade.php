<div class="modal fade" id="price_modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop"
    aria-hidden="true">

    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title test_answer_header" id="exampleModalLabel">{!! __('world.shipping_price') !!}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <form action="{!! route('dashboard.governorates.update.shipping.price') !!}" method="POST" enctype="multipart/form-data"
                id='update_shipping_price_form'>
                @csrf

                <div class="modal-body">
                    <!--begin::table-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-md-12">
                                <input type="hidden" id='governorate_id' name="governorate_id" class="form-control">
                                <input type="number" name="shipping_price" class="form-control" autocomplete="off"
                                    id='shipping_price' placeholder="{!! __('world.shipping_price') !!}">
                                <span class="text-danger" id='shipping_price_error'></span>
                            </div>
                        </div>
                        <!--end: form-->
                    </div>
                    <!--end::table-->
                </div>

                <div class="modal-footer">
                    <button type="submit" id="save_price_btn" class="btn btn-info font-weight-bold ">
                        {{ trans('general.save') }}
                    </button>
                    <button type="button" id="cancel_price_btn" class="btn btn-light-dark font-weight-bold">
                        {{ trans('general.cancel') }}
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
@push('scripts')
    <script type="text/javascript">
        // cancel
        $('body').on('click', '#cancel_price_btn', function(e) {
            console.log('rest');
            $('#price_modal').modal('hide');
        });

        // hide price modal
        $('#price_modal').on('hidden.bs.modal', function(e) {
            $('#price_modal').modal('hide');
        });

        // update shipping price
        $('#update_shipping_price_form').on('submit', function(e) {
            e.preventDefault();

            $('#shipping_price').css('border-color', '');
            $('#shipping_price_error').text('');

            var url = $(this).attr('action');
            var type = $(this).attr('method');
            var data = new FormData(this);

            $.ajax({
                url: url,
                data: data,
                type: type,
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    if (data.status == true) {
                        // $('#myTable').load(location.href + (' #myTable'));
                        $('#shipping_price_' + data.data.governorate_id).empty();
                        $('#shipping_price_' + data.data.governorate_id).text(data.data.price);

                        flasher.success("{!! __('general.update_success_message') !!}");
                        $('#price_modal').modal('hide');
                        $('#update_shipping_price_form')[0].reset();
                        $('#shipping_price').css('border-color', '');
                        $('#shipping_price_error').text('');
                    } else {
                        flasher.error("{!! __('general.update_error_message') !!}");
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
