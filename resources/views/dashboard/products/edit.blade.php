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
                                    <a href="{!! route('dashboard.welcome') !!}">
                                        {!! __('dashboard.home') !!}
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{!! route('dashboard.products.index') !!}">
                                        {!! __('products.products') !!}
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <a href="{!! route('dashboard.products.edit', $id) !!}">
                                        {!! __('products.update_product') !!}
                                    </a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- end: content header left-->

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
                                        {!! __('products.update_product') !!}
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
                                        @livewire('dashboard.product.edit-product', ['productID' => $id, 'categories' => $categories, 'brands' => $brands, 'productAttribute' => $attributes])
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

@push('style')
    @if (Lang() == 'ar')
        <link rel="stylesheet" href="{!! asset('assets/dashbaord/css-rtl/product-wizard.css') !!}" rel="stylesheet">
    @else
        <link rel="stylesheet" href="{!! asset('assets/dashbaord/css/product-wizard.css') !!}" rel="stylesheet">
    @endif
@endpush

@push('scripts')
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('showFullScreenModal', () => {
                $('#fullScreenModal').modal('show');
            });
        });
    </script>
@endpush
