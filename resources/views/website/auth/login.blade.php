@extends('layouts.website.app')
@section('title')
    {!! $title !!}
@endsection
@section('content')
    <section class="login footer-padding" style="background: rgba(174,28,154,.08)">
        <div class="container">
            <div class="login-section">

                <form id="userLoginForm" action="{!! route('website.post.login') !!}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="review-form">
                        <h5 class="comment-title">{!! __('auth.login') !!}</h5>
                        <div class="review-inner-form">

                            <div class="review-form-name">
                                <label for="email" class="form-label">{!! __('auth.email') !!} *</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="Email" />
                                @error('email')
                                    <span class="text-danger">{!! $message !!}</span>
                                @enderror
                            </div>

                            <div class="review-form-name">
                                <label for="password" class="form-label">{!! __('auth.password') !!} *</label>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="password" />
                                @error('password')
                                    <span class="text-danger font-medium-3">{!! $message !!}</span>
                                @enderror
                            </div>

                            <div class="review-form-name checkbox">
                                <div class="checkbox-item">
                                    <input type="checkbox" name="remmber" />
                                    <span class="address">{!! __('auth.remmber_me') !!}</span>
                                </div>
                                <div class="forget-pass">
                                    <p>{!! __('auth.forget_password') !!}</p>
                                </div>
                            </div>
                        </div>
                        <div class="login-btn text-center">

                            <a href="#" onclick="document.getElementById('userLoginForm').submit()" class="shop-btn">
                                {!! __('auth.login') !!}
                            </a>

                            <span class="shop-account">{!! __('auth.dont_have_account') !!}
                                <a href="{!! route('website.get.register') !!}">
                                    {!! __('auth.sign_up') !!}
                                </a>
                            </span>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </section>
@endsection
