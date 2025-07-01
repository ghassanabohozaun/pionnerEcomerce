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
                    <h3 class="content-header-title mb-0 d-inline-block">{!! __('categories.categories') !!}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{!! route('dashboard.welcome') !!}">
                                        {!! __('dashboard.home') !!}
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{!! route('dashboard.categories.index') !!}">
                                        {!! __('categories.categories') !!}
                                    </a>
                                </li>

                            </ol>
                        </div>
                    </div>
                </div>
                <!-- end: content header left-->

                <!-- begin: content header right-->
                <div class="content-header-right col-md-6 col-12">
                    <div class="float-md-right mb-2">
                        <a href="{{ route('dashboard.categories.create') }}" class="btn btn-info round btn-glow px-2" i>
                            {!! __('categories.create_new_category') !!}</a>

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
                                        {!! __('categories.show_all_categories') !!}
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
                                                        <th>{!! __('categories.category_name') !!}</th>
                                                        <th>{!! __('categories.slug') !!}</th>
                                                        <th>{!! __('categories.parent') !!}</th>

                                                        <th class="text-center">{!! __('categories.status') !!}</th>
                                                        <th class="text-center">{!! __('general.actions') !!}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($categories as $category)
                                                        <tr>
                                                            <th class="col-lg-2">{!! $loop->iteration !!} |
                                                                {!! $category->id !!}</th>
                                                            <td class="col-lg-2">{!! $category->name !!}</td>
                                                            <td class="col-lg-2">{!! $category->slug !!}</td>
                                                            <th class="col-lg-2">{!! $category->parent !!}</th>
                                                            <td class="col-lg-2 text-center">
                                                                @include('dashboard.categories.parts.status')
                                                            </td>
                                                            <td class="col-lg-2 text-center">
                                                                @include('dashboard.categories.parts.actions')
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="6" class="text-center">
                                                                {!! __('categories.no_categories_found') !!}
                                                            </td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>

                                            </table>
                                            <div class="float-right">
                                                {!! $categories->links() !!}
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

@push('style')
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord') !!}/vendors/css/tables/datatable/datatables.min.css">
@endpush

@push('scripts')
    <script src="{!! asset('assets/dashbaord') !!}/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>

    <script type="text/javascript">
        // delete category
        $('body').on('click', '.delete_category_btn', function(e) {
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
                        url: '{!! route('dashboard.categories.destroy') !!}',
                        data: {
                            id,
                            id
                        },
                        type: 'post',
                        dataType: 'json',
                        success: function(data) {
                            $('#myTable').load(location.href + (' #myTable'));
                            if (data.status == true) {
                                swal({
                                    title: "{!! __('general.deleted') !!} ",
                                    text: "{!! __('general.delete_success_message') !!} ",
                                    icon: "success",
                                    buttons: {
                                        confirm: {
                                            text: "{!! __('general.yes') !!}",
                                            visible: true,
                                            closeModal: true
                                        }
                                    }
                                });
                            } else if (data.status == false) {
                                swal({
                                    title: "{!! __('general.warning') !!} ",
                                    text: "{!! __('general.delete_error_message') !!} ",
                                    icon: "warning",
                                    buttons: {
                                        confirm: {
                                            text: "{!! __('general.yes') !!}",
                                            visible: true,
                                            closeModal: true
                                        }
                                    }
                                });
                            }
                        }, //end success
                    });

                } else {
                    swal({
                        title: "{!! __('general.cancelled') !!} ",
                        text: "{!! __('general.delete_error_message') !!} ",
                        icon: "error",
                        buttons: {
                            confirm: {
                                text: "{!! __('general.yes') !!}",
                                visible: true,
                                closeModal: true
                            }
                        }
                    });
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
                url: "{{ route('dashboard.categories.change.status') }}",
                data: {
                    statusSwitch: statusSwitch,
                    id: id
                },
                type: 'post',
                dataType: 'JSON',
                success: function(data) {
                    if (data.status == true) {
                        flasher.success("{!! __('general.change_status_success_message') !!}");
                    } else {
                        flasher.error("{!! __('general.change_status_error_message') !!}");
                    }
                }, //end success
            })
        });
    </script>
@endpush
