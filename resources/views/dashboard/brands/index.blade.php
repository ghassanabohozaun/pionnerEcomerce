@extends('layouts.dashboard.app')
@section('title')
    {!! $title !!}
@endsection

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <!-- begin: content header -->
            <div class="content-header row">

                <!-- begin: content header left-->
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{!! __('brands.brands') !!}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{!! route('dashboard.welcome') !!}">
                                        {!! __('dashboard.home') !!}
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{!! route('dashboard.brands.index') !!}">
                                        {!! __('brands.brands') !!}
                                    </a>
                                </li>

                            </ol>
                        </div>
                    </div>
                </div>
                <!-- end: content header left-->

                <!-- begin: content header right-->
                <div class="content-header-right col-md-6 col-12">
                    <div class="float-md-right">
                        <a href="{{ route('dashboard.brands.create') }}" class="btn btn-info round btn-glow px-2" i>
                            {!! __('brands.create_new_brand') !!}</a>

                    </div>
                </div>
                <!-- end: content header right-->

            </div> <!-- end :content header -->

            <!-- begin: content body -->
            <div class="content-body">

                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <!-- begin: card header -->
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-colored-form-control">
                                        {!! __('brands.show_all_brands') !!}
                                    </h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- end: card header -->

                                <!-- begin: card content -->
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table" id='myTable'>
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>{!! __('brands.logo') !!}</th>
                                                        <th>{!! __('brands.brand_name') !!}</th>
                                                        <th>{!! __('brands.status') !!}</th>
                                                        <th style="text-align: center">{!! __('general.actions') !!}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($brands as $brand)
                                                        <tr>
                                                            <th class="col-lg-1">{!! $loop->iteration !!} </th>
                                                            <td class="col-lg-2">@include('dashboard.brands.parts.logo')</td>
                                                            <td class="col-lg-">{!! $brand->name !!}</td>
                                                            <td class="col-lg-1">
                                                                @include('dashboard.brands.parts.status')
                                                            </td>
                                                            <td class="col-lg-2">
                                                                @include('dashboard.brands.parts.actions')
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="5" class="text-center">
                                                                {!! __('brands.no_brands_found') !!}
                                                            </td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>

                                            </table>
                                            <div class="float-right">
                                                {!! $brands->links() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end: card content -->
                            </div>
                        </div> <!-- end: card  -->
                    </div><!-- end: row  -->
                </section><!-- end: sections  -->
            </div><!-- end: content body  -->
        </div> <!-- end: content wrapper  -->
    </div><!-- end: content app  -->
@endsection
@push('scripts')
    <script type="text/javascript">
        $('body').on('click', '.delete_brand_btn', function(e) {
            e.preventDefault();
            var id = $(this).data('id');

            swal({
                title: "{{ __('general.ask_delete_record') }}",
                icon: "warning",
                buttons: {
                    cancel: {
                        text: "{{ __('general.no') }}",
                        value: null,
                        visible: true,
                        className: "btn-danger",
                        closeModal: false,
                    },
                    confirm: {
                        text: "{{ __('general.yes') }}",
                        value: true,
                        visible: true,
                        className: "btn-info",
                        closeModal: false
                    }
                }
            }).then(isConfirm => {
                if (isConfirm) {
                    $.ajax({
                        url: '{!! route('dashboard.brands.destroy') !!}',
                        data: {
                            id,
                            id
                        },
                        type: 'post',
                        dataType: 'json',
                        success: function(data) {
                            $('#myTable').load(location.href + (' #myTable'));
                            if (data.status == true) {
                                swal("{!! __('general.deleted') !!} !",
                                    "{!! __('general.delete_success_message') !!} !!", "success");
                            } else if (data.status == false) {
                                swal("{!! __('general.warning') !!} !",
                                    "{!! __('general.delete_error_message') !!}", "warning");
                            }

                        }, //end success
                    });

                } else {
                    swal("{!! __('general.cancelled') !!}", "{!! __('general.delete_success_message') !!}", "error");
                }
            });
        });


        //  change status
        var statusSwitch = false;
        $('body').on('change', '.change_status', function(e) {
            e.preventDefault();
            var id = $(this).data('id');

            if ($(this).is(':checked')) {
                statusSwitch = 1;
            } else {
                statusSwitch = 0;
            }

            $.ajax({
                url: "{{ route('dashboard.brands.change.status') }}",
                data: {
                    statusSwitch: statusSwitch,
                    id: id
                },
                type: 'post',
                dataType: 'JSON',
                success: function(data) {
                    if (data.status == true) {
                        swal("{!! __('general.yes') !!}", "{!! __('general.change_status_success_message') !!}",
                            "success");
                        $('#myTable').load(location.href + (' #myTable'));
                    } else {
                        swal("{!! __('general.no') !!}", "{!! __('general.change_status_error_message') !!}",
                            "error");
                        $('#myTable').load(location.href + (' #myTable'));
                    }
                }, //end success
            })
        });
    </script>
@endpush
