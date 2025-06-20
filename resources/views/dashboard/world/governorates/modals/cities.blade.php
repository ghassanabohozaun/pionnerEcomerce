<div class="modal fade" id="cities_modal" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdrop" aria-hidden="true">

    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title test_answer_header" id="exampleModalLabel">{!! __('world.cities') !!}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>


            <div class="modal-body">

                <!--begin::table-->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive table-wrapper">
                            <table class="table  table-hover cites_table" id="cites_table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="col-2">#</th>
                                        <th scope="col" class="col-10">{{ __('world.city_name') }}</th>
                                    </tr>
                                </thead>
                                <tbody id='cities_tbody'></tbody>

                            </table>
                        </div>
                    </div>

                    <!--end: form-->
                </div>
                <!--end::table-->
            </div>


            <div class="modal-footer">
                <button type="button" id="cancel_cities_btn" class="btn btn-light-dark font-weight-bold">
                    {{ trans('general.cancel') }}
                </button>
            </div>

        </div>
    </div>
</div>
@push('scripts')
    <script type="text/javascript">
        $('body').on('click', '#cancel_cities_btn', function(e) {
            console.log('rest');
            $('#cities_modal').modal('hide');
        });

        // hide governoraties modal
        $('#cities_modal').on('hidden.bs.modal', function(e) {
            $('#cities_modal').modal('hide');
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
