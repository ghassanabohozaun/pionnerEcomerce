@extends('layouts.dashboard.auth')
@section('title')
    {!! __('auth.confirm') !!}
@endsection

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="flexbox-container">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="col-md-3 col-12 box-shadow-2 p-0 mt-5">
                            <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
                                <div class="card-header border-0 pb-0">
                                    <div class="card-title text-center">
                                        <h2>ECommerce</h2>
                                        {{-- <img src="../../../app-assets/images/logo/logo-dark.png" alt="branding logo"> --}}
                                    </div>
                                    <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                        <span>{!! __('auth.we_will_send_you_link_to_reset_password') !!}</span>
                                    </h6>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">

                                        @if ($errors->has('error'))
                                            <div class=" alert alert-danger">
                                                {!! $errors->first('error') !!}
                                            </div>
                                        @endif

                                        <form class="form-horizontal" action="{!! route('dashboard.password.post.verify') !!}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="email" class="form-control form-control-lg input-lg"
                                                    id="email" name="email" value="{{ $email }}" readonly
                                                    placeholder="{!! __('auth.you_email_address') !!}">
                                                <div class="form-control-position"> <i class="ft-mail"></i> </div>
                                            </fieldset>

                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="text" class="form-control form-control-lg input-lg"
                                                    id="code" name="code" placeholder="{!! __('auth.enter_reset_code') !!}">
                                                <div class="form-control-position"> <i class="ft-mail"></i> </div>
                                                @error('code')
                                                    <strong class="text text-danger">{!! $message !!}</strong>
                                                @enderror
                                            </fieldset>


                                            <button type="submit" class="btn btn-outline-info btn-lg btn-block">
                                                <i class="ft-unlock"></i>
                                                {!! __('auth.verify_password') !!}
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="card-footer border-0">
                                    <p class="float-sm-left text-center">
                                        <a href="{!! route('dashboard.get.login') !!}" class="card-link">{!! __('auth.login') !!}</a>
                                    </p>

                                </div>

                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
