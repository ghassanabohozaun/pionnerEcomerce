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
                                <li class="breadcrumb-item active">
                                    <a href="#">
                                        {!! __('admins.create_new_admin') !!}
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
                                        {!! __('admins.create_new_admin') !!}
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

                                        <form class="form" action="{!! route('dashboard.admins.store') !!}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-body">

                                                <!-- begin: input -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name">{!! __('admins.name_en') !!}</label>
                                                            <input type="text" id="name" name="name[en]"
                                                                class="form-control border-primary" autocomplete="off"
                                                                placeholder="{!! __('admins.enter_name_ar') !!}">
                                                            @error('name.en')
                                                                <span class="text text-danger">
                                                                    <strong>{!! $message !!}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>

                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name">{!! __('admins.name_ar') !!}</label>
                                                            <input type="text" id="name" name="name[ar]"
                                                                class="form-control border-primary" autocomplete="off"
                                                                placeholder="{!! __('admins.enter_name_ar') !!}">
                                                            @error('name.ar')
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
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="email">{!! __('admins.email') !!}</label>
                                                            <input type="email" id="email" name="email"
                                                                class="form-control border-primary" autocomplete="off"
                                                                placeholder="{!! __('admins.enter_email') !!}">
                                                            @error('email')
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
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="password">{!! __('admins.password') !!}</label>
                                                            <input type="password" id="password" name="password"
                                                                class="form-control border-primary" autocomplete="off"
                                                                placeholder="{!! __('admins.enter_password') !!}">
                                                            @error('password')
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
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="role_id">{!! __('admins.role_id') !!}</label>
                                                            <select class="form-control" id="DefaultSelect"
                                                                id='role_id' name="role_id">
                                                                <option value="" selected="">
                                                                    {!! __('general.select_from_list') !!}</option>
                                                                @foreach ($roles as $role)
                                                                    <option value="{!! $role->id !!}">
                                                                        {!! $role->role !!}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @error('role_id')
                                                                <span class="text text-danger">
                                                                    <strong>{!! $message !!}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

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
