@extends('layouts.dashboard.app')
@section('title')
    {!! $title !!}
@endsection

@section('content')
    <div class="app-content content">

        <form class="form" action="{!! route('dashboard.faqs.store') !!}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="content-wrapper">
                <!-- begin: content header -->
                <div class="content-header row">
                    <!-- begin: content header left-->
                    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                        <h3 class="content-header-title mb-0 d-inline-block">{!! __('faqs.faqs') !!}</h3>
                        <div class="row breadcrumbs-top d-inline-block">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{!! route('dashboard.welcome') !!}">
                                            {!! __('dashboard.home') !!}
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{!! route('dashboard.faqs.index') !!}">
                                            {!! __('faqs.faqs') !!}
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active">
                                        <a href="#">
                                            {!! __('faqs.create_new_faq') !!}
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
                                            {!! __('faqs.create_new_faq') !!}
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
                                                            <label for="question">{!! __('faqs.question_ar') !!}</label>
                                                            <input type="text" id="question" name="question[ar]"
                                                                value="{!! old('question.ar') !!}"
                                                                class="form-control round border-primary" autocomplete="off"
                                                                placeholder="{!! __('faqs.enter_question_ar') !!}">
                                                            @error('question.ar')
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
                                                            <label for="question">{!! __('faqs.question_en') !!}</label>
                                                            <input type="text" id="question" name="question[en]"
                                                                value="{!! old('question.en') !!}"
                                                                class="form-control round border-primary "
                                                                autocomplete="off" placeholder="{!! __('faqs.enter_question_en') !!}">
                                                            @error('question.en')
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
                                                                    @checked(old('status') == 'on')>
                                                                <span>{!! __('faqs.status') !!}</span>
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
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label for="answer">{!! __('faqs.answer_ar') !!}</label>
                                                            <textarea rows="5" id="answer" name="answer[ar]" class="form-control round border-primary "
                                                                placeholder="{!! __('faqs.enter_answer_ar') !!}">{!! old('answer.ar') !!}</textarea>
                                                            @error('answer.ar')
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
                                                            <label for="answer">{!! __('faqs.answer_en') !!}</label>
                                                            <textarea rows="5" id="answer" name="answer[en]" class="form-control round border-primary "
                                                                placeholder="{!! __('faqs.enter_answer_en') !!}">{!! old('answer.en') !!}</textarea>
                                                            @error('answer.en')
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
