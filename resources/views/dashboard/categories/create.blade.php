@extends('layouts.dashboard.app')
@section('title')
    {!! $title !!}
@endsection

@section('content')
    <div class="app-content content">

        <form class="form" action="{!! route('dashboard.categories.store') !!}" method="post" enctype="multipart/form-data">
            @csrf
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
                                    <li class="breadcrumb-item active">
                                        <a href="#">
                                            {!! __('categories.create_new_category') !!}
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
                            <button class="btn btn-info round btn-glow px-2" type="submit">
                                <i class="la la-save"></i>
                                {!! __('general.save') !!}
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
                                            {!! __('categories.create_new_category') !!}
                                        </h4>
                                        <a class="heading-elements-toggle"><i
                                                class="la la-ellipsis-v font-medium-3"></i></a>
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

                                            <div class="form-body">

                                                <!-- begin: row -->
                                                <div class="row">
                                                    <!-- begin: input -->
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label for="name">{!! __('categories.name_ar') !!}</label>
                                                            <input type="text" id="name" name="name[ar]"
                                                                value="{!! old('name.ar') !!}"
                                                                class="form-control round border-primary" autocomplete="off"
                                                                placeholder="{!! __('categories.enter_name_ar') !!}">
                                                            @error('name.ar')
                                                                <span class="text text-danger">
                                                                    <strong>{!! $message !!}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <!-- end: input -->

                                                    <!-- begin: input -->
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label for="name">{!! __('categories.name_en') !!}</label>
                                                            <input type="text" id="name" name="name[en]"
                                                                value="{!! old('name.en') !!}"
                                                                class="form-control round border-primary "
                                                                autocomplete="off" placeholder="{!! __('categories.enter_name_en') !!}">
                                                            @error('name.en')
                                                                <span class="text text-danger">
                                                                    <strong>{!! $message !!}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <!-- end: input -->

                                                    <!-- begin: input -->
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label id="statusLabel">
                                                                <input type="checkbox" name="status" class="checkbox"
                                                                    @checked(old('status') == 1)>
                                                                <span>{!! __('categories.status') !!}</span>
                                                            </label>
                                                        </div>
                                                        @error('status')
                                                            <span class="text text-danger">
                                                                <strong>{!! $message !!}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <!-- end: input -->
                                                </div>
                                                <!-- end: row -->



                                                <!-- begin: row -->
                                                <div class="row">
                                                    <!-- begin: input -->
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="role_id">{!! __('categories.parent') !!}</label>
                                                            <select class="form-control round" id='parent'
                                                                name="parent">
                                                                <option value="" selected="">
                                                                    {!! __('general.select_from_list') !!}
                                                                </option>
                                                                @foreach ($parentCategoires as $parentcategory)
                                                                    <option value="{!! $parentcategory->id !!}"
                                                                        {!! old('parent') == $parentcategory->id ? 'selected' : '' !!}>
                                                                        {!! $parentcategory->name !!}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @error('parent')
                                                                <span class="text text-danger">
                                                                    <strong>{!! $message !!}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <!-- end: input -->
                                                </div>
                                                <!-- end: row -->

                                            </div>
                                        </div>
                                        <!-- end: card content -->
                                    </div>
                                </div> <!-- end: card  -->
                            </div><!-- end: row  -->
                    </section><!-- end: sections  -->
                </div><!-- end: content body  -->
            </div> <!-- end: content wrapper  -->
        </form>
    </div><!-- end: content app  -->
@endsection
@push('scripts')
@endpush
