@extends('layouts.website.app')
@section('title')
    {!! $title !!}
@endsection
@push('style')
    <style>
        .login-section .review-form {
            width: 80.2rem;
            height: 79.1rem;
        }
    </style>
@endpush
@section('content')
    <section class="login account footer-padding" style="background: rgba(174,28,154,.08)">
        <div class="container">
            @livewire('website.auth.register-user')
        </div>
    </section>
@endsection
