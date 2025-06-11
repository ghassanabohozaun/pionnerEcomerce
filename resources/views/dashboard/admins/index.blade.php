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
                    <h3 class="content-header-title mb-0 d-inline-block">{!! __('admins.admins') !!}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{!! route('dashboard.welcome') !!}">
                                        {!! __('dashboard.home') !!}
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{!! route('dashboard.admins.index') !!}">
                                        {!! __('admins.admins') !!}
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
                        <a href="{{ route('dashboard.admins.create') }}" class="btn btn-info round btn-glow px-2" i>
                            {!! __('admins.create_new_admin') !!}</a>

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
                                        {!! __('admins.show_all_admins') !!}
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
                                                        <th>{!! __('admins.name') !!}</th>
                                                        <th>{!! __('admins.email') !!}</th>
                                                        <th>{!! __('admins.role_id') !!}</th>
                                                        <th style="text-align: center">{!! __('general.actions') !!}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($admins as $admin)
                                                        <tr>
                                                            <th class="col-lg-1">{!! $loop->iteration !!} </th>
                                                            <td class="col-lg-1">{!! $admin->name !!}</td>
                                                            <td class="col-lg-1">{!! $admin->email !!}</td>
                                                            <td class="col-lg-1">{!! $admin->role->role !!}</td>
                                                            <td class="col-lg-2">
                                                                @include('dashboard.admins.parts.actions')
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="5" class="text-center">
                                                                {!! __('admins.no_admins_found') !!}
                                                            </td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>

                                            </table>
                                            <div class="float-right">
                                                {!! $admins->links() !!}
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
    {{-- <script type="text/javascript">
        $('body').on('click', '.delete_role_btn', function(e) {
            e.preventDefault();
            var id = $(this).data('id');

            swal({
                title: "{{ __('general.ask_delete_record') }}",
                // text: "See the confirm button text! Have you noticed the Change?",
                icon: "warning",
                buttons: {
                    cancel: {
                        text: "{{ __('general.no') }}",
                        value: null,
                        visible: true,
                        className: "",
                        closeModal: false,
                    },
                    confirm: {
                        text: "{{ __('general.yes') }}",
                        value: true,
                        visible: true,
                        className: "",
                        closeModal: false
                    }
                }
            }).then(isConfirm => {
                if (isConfirm) {
                    $.ajax({
                        url: '{!! route('dashboard.roles.destroy') !!}',
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
                                    "{!! __('roles.role_have_admins') !!}", "warning");
                            }

                        }, //end success
                    });


                } else {
                    swal("{!! __('general.cancelled') !!}", "{!! __('general.delete_success_message') !!}", "error");
                }
            });


            // //  console.log('delete');
            // var id = $(this).data('id');
            // // console.log(id);



            // Swal.fire({
            //     title: "{{ __('general.ask_delete_record') }}",
            //     icon: "warning",
            //     showCancelButton: true,
            //     confirmButtonText: "{{ __('general.yes') }}",
            //     cancelButtonText: "{{ __('general.no') }}",
            //     reverseButtons: false,
            //     allowOutsideClick: false,
            // }).then(function(result) {
            //     if (result.value) {
            //         //////////////////////////////////////
            //         // Delete role
            //         $.ajax({
            //             url: '{!! route('dashboard.roles.destroy') !!}',
            //             data: {
            //                 id,
            //                 id
            //             },
            //             type: 'post',
            //             dataType: 'json',
            //             success: function(data) {
            //                 console.log(data);
            //                 if (data == true) {
            //                     Swal.fire({
            //                         title: "{!! __('general.deleted') !!}",
            //                         text: "{!! __('general.delete_success_message') !!}",
            //                         icon: "success",
            //                         allowOutsideClick: false,
            //                         customClass: {
            //                             confirmButton: 'delete_role_button'
            //                         }
            //                     });
            //                     $('.delete_role_button').click(function() {
            //                         $('#myTable').load(location.href + (' #myTable'));
            //                     });
            //                 }

            //                 if (data == false) {
            //                     Swal.fire({
            //                         title: "{!! __('general.cancelled') !!}",
            //                         text: data.msg,
            //                         icon: "warning",
            //                         allowOutsideClick: false,
            //                     });

            //                 }
            //             }, //end success
            //         });

            //     } else if (result.dismiss === "cancel") {
            //         Swal.fire({
            //             title: "{!! __('general.cancelled') !!}",
            //             text: "{!! __('general.cancelled_message') !!}",
            //             icon: "error",
            //             allowOutsideClick: false,
            //             customClass: {
            //                 confirmButton: 'cancel_delete_role_button'
            //             }
            //         })
            //     }
            // });
        });
    </script> --}}
@endpush
