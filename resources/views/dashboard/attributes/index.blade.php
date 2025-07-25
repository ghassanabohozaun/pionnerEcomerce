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
                    <h3 class="content-header-title mb-0 d-inline-block">{!! __('attributes.attributes') !!}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{!! route('dashboard.welcome') !!}">
                                        {!! __('dashboard.home') !!}
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{!! route('dashboard.attributes.index') !!}">
                                        {!! __('attributes.attributes') !!}
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
                        <button type="button" class="btn btn-info round btn-glow px-2" data-toggle="modal"
                            data-target="#createAttributeModal">
                            {!! __('attributes.create_new_attribute') !!}
                        </button>
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
                                        {!! __('attributes.show_all_attributes') !!}
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
                                            <table id="yajra-datatable" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>{!! __('attributes.name') !!}</th>
                                                        <th>{!! __('attributes.attribute_values') !!}</th>
                                                        <th>{!! __('general.created_at') !!}</th>
                                                        <th>{!! __('general.actions') !!}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
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

    @include('dashboard.attributes.modals.create')
    @include('dashboard.attributes.modals.edit')
@endsection
@push('scripts')
    <script type="text/javascript">
        var lang = '{{ Lang() }}';
        // yajra tables
        var table = $('#yajra-datatable').DataTable({
            // dom: 'Bfrtip',
            processing: true,
            serverSide: true,
            colReorder: true,
            fixedHeader: true,
            // rowReorder: {
            //     update: false,
            //     // selector: 'tr',
            // },
            // select: true,
            // responsive: true,
            // scrollCollapse: true,
            // scroller: true,
            // scrollY: 900,
            responsive: {
                details: {
                    display: DataTable.Responsive.display.modal({
                        header: function(row) {
                            var data = row.data();
                            console.log(data);
                            return '{!! __('general.detalis_for') !!} : ' + data['name'];
                        }
                    }),
                    renderer: DataTable.Responsive.renderer.tableAll({
                        tableClass: 'table'
                    })
                }
            },


            ajax: '{!! route('dashboard.attributes.get.all') !!}',

            columns: [{
                    data: 'DT_RowIndex',
                    searchable: false,
                    orderable: false,
                },
                {
                    data: 'name',
                    name: 'name',
                },
                {
                    data: 'attributeValues',
                    name: 'attributeValues',
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                },
                {
                    data: 'actions',
                    searchable: false,
                    orderable: false,
                }
            ],

            layout: {
                // 'colvis',
                topStart: {
                    buttons: ['copy', 'print', 'excel', 'pdf']
                }
            },
            language: lang === 'ar' ? {
                url: '{!! asset('vendor/datatables/ar.json') !!}',
            } : {},

            buttons: [{
                    extend: 'colvis',
                    className: 'btn btn-default',
                    exportOptions: {
                        // columns: [0, 1, 2],
                        columns: ':not(:last-child)',
                    }
                },
                {
                    extend: 'copy',
                    className: 'btn btn-default',
                    exportOptions: {
                        // columns: [0, 1, 2],
                        columns: ':not(:last-child)',
                    }
                },
                {
                    extend: 'print',
                    className: 'btn btn-default',
                    exportOptions: {
                        // columns: [0, 1, 2],
                        columns: ':not(:last-child)',
                    }
                },
                {
                    extend: 'excel',
                    className: 'btn btn-default',
                    exportOptions: {
                        // columns: [0, 1, 2],
                        columns: ':not(:last-child)',
                    }
                },
                {
                    extend: 'pdf',
                    className: 'btn btn-default',
                    exportOptions: {
                        // columns: [0, 1, 2],
                        columns: ':not(:last-child)',
                    }
                },

            ]

        });


        // delete
        $('body').on('click', '.delete_attribute_btn', function(e) {
            e.preventDefault();
            var currentPage = $('#yajra-datatable').DataTable().page();
            var attribute_id = $(this).data('id');

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
                        url: '{!! route('dashboard.attributes.destroy', 'id') !!}'.replace('id', attribute_id),
                        type: 'DELETE',
                        dataType: 'json',
                        success: function(data) {
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
                                $('#yajra-datatable').DataTable().page(currentPage).draw(false);
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
    </script>
@endpush
