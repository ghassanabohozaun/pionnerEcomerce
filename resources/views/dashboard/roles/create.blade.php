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
                    <h3 class="content-header-title mb-0 d-inline-block">{!! __('roles.roles') !!}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{!! route('dashboard.welcome') !!}">
                                        {!! __('dashboard.home') !!}
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{!! route('dashboard.roles.index') !!}">
                                        {!! __('roles.roles') !!}

                                    </a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <a href="#">
                                        {!! __('roles.create_new_role') !!}
                                    </a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- end: content header left-->

                <!-- begin: content header right-->
                <div class="content-header-right col-md-6 col-12">
                    <div class="dropdown float-md-right">
                        <button class="btn btn-danger dropdown-toggle round btn-glow px-2" id="dropdownBreadcrumbButton"
                            type="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">{!! __('general.actions') !!}</button>
                        <div class="dropdown-menu" aria-labelledby="dropdownBreadcrumbButton">
                            <a class="dropdown-item" href="#">
                                <i class="la la-check-square-o"></i>
                                {!! __('general.save') !!}
                            </a>
                        </div>
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
                                        {!! __('roles.create_new_role') !!}
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
                                        {{-- @include('dashboard.includes.validation-errors') --}}

                                        <form class="form" action="{!! route('dashboard.roles.store') !!}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-body">

                                                <!-- begin: input -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="role_name">{!! __('roles.role_en') !!}</label>
                                                            <input type="text" id="role" name="role[en]"
                                                                class="form-control border-primary" autocomplete="off"
                                                                placeholder="{!! __('roles.enter_role_en') !!}">
                                                            @error('role.en')
                                                                <span class="text text-danger">
                                                                    <strong>{!! $message !!}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>

                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="role_name">{!! __('roles.role_ar') !!}</label>
                                                            <input type="text" id="role" name="role[ar]"
                                                                class="form-control border-primary" autocomplete="off"
                                                                placeholder="{!! __('roles.enter_role_ar') !!}">
                                                            @error('role.ar')
                                                                <span class="text text-danger">
                                                                    <strong>{!! $message !!}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                </div>
                                                <!-- end: input -->


                                                <!-- begin: input -->
                                                <div class="row">
                                                    @foreach (Config('global.permissions') as $key => $value)
                                                        <div class="col-md-3">
                                                            <input type="checkbox" value="{!! $key !!}"
                                                                name="permissions[]" class="checkbox">
                                                            <label> {{ __(config('global.permissions.', $value)) }}</label>
                                                        </div>
                                                    @endforeach
                                                    @error('permissions')
                                                        <div class="col-md-12">
                                                            <span class="text text-danger">
                                                                <strong>{!! $message !!}</strong>
                                                            </span>
                                                        </div>
                                                    @enderror
                                                </div>
                                                <!-- end: input -->


                                            </div>
                                            <div class="form-actions right">
                                                <button type="button" class="btn btn-warning mr-1">
                                                    <i class="la la-times-circle-o"></i>
                                                    {!! __('general.cancel') !!}
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> {!! __('general.save') !!}
                                                </button>
                                            </div>
                                        </form>
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
