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
                    <h3 class="content-header-title mb-0 d-inline-block">{!! __('products.products') !!}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{!! route('dashboard.index') !!}">
                                        {!! __('dashboard.home') !!}
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{!! route('dashboard.products.index') !!}">
                                        {!! __('products.products') !!}
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <a href="{!! route('dashboard.products.show', $product->id) !!}">
                                        {!! $product->name !!}
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
                        <a href="#" class="btn btn-primary round btn-glow px-2">
                            {!! __('products.update_product') !!}
                        </a>
                        <a href="{!! route('dashboard.products.create') !!}" class="btn btn-info round btn-glow px-2">
                            {!! __('products.create_new_product') !!}
                        </a>
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
                                        {!! $product->name !!}
                                    </h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload-form"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- end: card header -->

                                <!-- begin: card content -->
                                <div class="card-content collapse show">
                                    <div class="card-body">

                                        <!-- begin: basic info div -->
                                        <div class="row">

                                            <!-- begin: right div -->
                                            <div class="col-6">
                                                <!-- product_name -->
                                                <p>
                                                <h2 class="text-muted">{!! $product->name !!}</h2>
                                                </p>

                                                <!-- product_desc -->
                                                <p>
                                                    {!! $product->desc !!}
                                                </p>
                                                <br />

                                                <!-- has_variant -->
                                                @if ($product->has_variants)
                                                    <p>
                                                    <div class="badge badge-md border-warning warning">
                                                        {!! __('products.has_variants') !!}
                                                    </div>
                                                    </p>
                                                @else
                                                    <h4>
                                                        <p>
                                                            <span class="text-danger">${!! $product->price !!} </span>
                                                            @if ($product->has_discount)
                                                                <small class="text-muted">
                                                                    <del>${{ $product->discount }} </del>
                                                                </small>
                                                            @endif
                                                        </p>
                                                    </h4>

                                                    @if ($product->manage_stock)
                                                        <h4>
                                                            <span>{!! __('products.quantity') !!} : </span>
                                                            <span>{!! $product->quantity !!}</span>
                                                        </h4>
                                                    @endif
                                                @endif

                                                <br />
                                                <!-- available_for -->
                                                <p>
                                                    <li class="la la-calendar text-success"></li>
                                                    <span>{!! __('products.available_for') !!} : </span>
                                                    <span>{!! $product->available_for !!}</span>
                                                </p>

                                                <!-- manage_stock -->
                                                @if ($product->manage_stock)
                                                    <p>
                                                        <li class="la la-inbox text-error"></li>
                                                        <span>{!! __('products.in_stock') !!} : </span>
                                                        <span>{!! $product->quantity !!}</span>
                                                    </p>
                                                @endif
                                                <!-- sku -->
                                                <p>
                                                    <li class="la la-ticket text-primary"></li>
                                                    <span>{!! __('products.sku') !!} : </span>
                                                    <span>{!! $product->sku !!}</span>
                                                </p>

                                                <!-- views -->
                                                <p>
                                                    <li class="la la-eye text-dark"></li>
                                                    <span>{!! __('products.views') !!} : </span>
                                                    <span>{!! $product->views !!}</span>
                                                </p>
                                                <!-- views -->
                                                <p>
                                                    <li class="la la-list-alt text-info"></li>
                                                    <span>{!! __(key: 'products.category_id') !!} : </span>
                                                    <span>{!! $product->category->name !!}</span>
                                                </p>

                                                <p>
                                                    <li class="la la-tag text-warning"></li>
                                                    <span>{!! __('products.brand_id') !!} : </span>
                                                    <span>{!! $product->brand->name !!}</span>
                                                </p>


                                            </div>
                                            <!-- end: right div -->


                                            <!-- begin: left div  slider-->
                                            <div class="col-6">
                                                <!-- begin: slider-->
                                                <div class="text-center">
                                                    <div id="carouselExampleControls" class="carousel slide"
                                                        data-ride="carousel" style="width: 100%">
                                                        <div class="carousel-inner">
                                                            @foreach ($product->images as $key => $image)
                                                                <div class="carousel-item {!! $key == 0 ? 'active' : '' !!}">
                                                                    <img src="{!! asset('uploads/products/' . $image->file_name) !!}"
                                                                        class="d-block w-100"
                                                                        style="max-width: 100%  ; max-height: 80%"
                                                                        alt="{!! $product->name !!}">
                                                                </div>
                                                            @endforeach

                                                            <a href="#carouselExampleControls" class="carousel-control-prev"
                                                                type="button" data-target="#carouselExampleControls"
                                                                data-slide="prev">
                                                                <span class="carousel-control-prev-icon"
                                                                    aria-hidden="true"></span>
                                                                <span class="sr-only">{!! __('general.previous') !!}</span>
                                                            </a>
                                                            <a href="#carouselExampleControls" class="carousel-control-next"
                                                                type="button" data-target="#carouselExampleControls"
                                                                data-slide="next">
                                                                <span class="carousel-control-next-icon"
                                                                    aria-hidden="true"></span>
                                                                <span class="sr-only">{!! __('general.next') !!}</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end: slider-->
                                            </div>
                                            <!-- end: left div slider -->


                                        </div>
                                        <!-- end: basic info div -->

                                        <!-- begin: varaints div  && !$product->productVariants->isEmpty()-->
                                        @if ($product->has_variants == 1)
                                            <div class="row mt-4 mb-3">
                                                <div class="col-12">
                                                    <div class="table-responsive ">
                                                        <table class="table" id='myTable'>
                                                            <thead>
                                                                <tr class="text-center">
                                                                    <th>#</th>
                                                                    <th>{!! __('products.price') !!}</th>
                                                                    <th>{!! __('products.quantity') !!}</th>
                                                                    <th>{!! __('products.attributes') !!}</th>
                                                                    <th style="text-align: center">{!! __('general.actions') !!}
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @forelse ($product->productVariants as $key=> $varaint)
                                                                    <tr class="text-center">
                                                                        <th class="col-lg-1">{!! $loop->iteration !!} </th>
                                                                        <td class="col-lg-2">${!! $varaint->price !!}</td>
                                                                        <td class="col-lg-2"> {!! $varaint->stock !!}</td>
                                                                        <td class="col-lg-5">
                                                                            @foreach ($varaint->variantAttributes as $attribute)
                                                                                <span
                                                                                    class="badge badge-md border-info info">
                                                                                    <span>{!! $attribute->attributeValue->attribute->name !!} : </span>
                                                                                    <span>{!! $attribute->attributeValue->value !!}</span>
                                                                                </span>
                                                                            @endforeach
                                                                        </td>
                                                                        <td class="col-lg-2">
                                                                            @if ($product->productVariants->count() > 1)
                                                                                <button
                                                                                    class="btn btn-sm btn-outline-danger delete_product_vaiant"
                                                                                    title="{!! __('general.delete') !!}"
                                                                                    varaint-id="{!! $varaint->id !!}"
                                                                                    product-id={!! $product->id !!}>
                                                                                    <i class="la la-trash"></i>
                                                                                </button>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                @empty
                                                                    <tr>
                                                                        <td colspan="5" class="text-center">
                                                                            {!! __('products.no_product_varaints_found') !!}
                                                                        </td>
                                                                    </tr>
                                                                @endforelse
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        <!-- end: varaints div -->


                                    </div>
                                    <!-- end: card content -->
                                </div>
                            </div> <!-- end: card  -->
                        </div><!-- end: row  -->
                    </div>
                </section><!-- end: sections  -->
            </div><!-- end: content body  -->
        </div> <!-- end: content wrapper  -->

    </div><!-- end: content app  -->

@endsection
@push('scripts')
    <script>
        // delete
        $('body').on('click', '.delete_product_vaiant', function(e) {
            e.preventDefault();
            var varaint_id = $(this).attr('varaint-id');
            var product_id = $(this).attr('product-id');

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
                        url: '{!! route('dashboard.products.destroy.varaint', ':id') !!}'.replace(':id', varaint_id),
                        data: {
                            '_token': "{!! csrf_token() !!}",
                            'product_id': product_id,
                        },
                        type: 'DELETE',
                        dataType: 'json',
                        success: function(data) {
                            console.log(data);
                            return false;
                            if (data.status == true) {
                                $('#myTable').load(location.href + (' #myTable'));
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
    </script>
@endpush
