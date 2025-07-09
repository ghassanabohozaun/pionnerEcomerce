<div class="modal fade" id="createFaqModal" tabindex="-1" role="dialog" aria-labelledby="createFaqModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-md" role="document">
        <form class="form" action="{!! route('dashboard.faqs.store') !!}" method="POST" enctype="multipart/form-data"
            id='create_faq_form'>
            @csrf
            <div class="modal-content">

                <!--begin::modal header-->
                <div class="modal-header">
                    <h5 class="modal-title test_answer_header" id="createFaqModalLabel">{!! __('faqs.create_new_faq') !!}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <!--end::modal header-->

                <!--begin::modal body-->
                <div class="modal-body">

                    <div class="row">
                        <div class="col-lg-12">

                            <!-- begin: row -->
                            <div class="row">
                                <!-- begin: input -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="question">{!! __('faqs.question_ar') !!}</label>
                                        <input type="text" id="question_ar" name="question[ar]" class="form-control"
                                            autocomplete="off" placeholder="{!! __('faqs.enter_question_ar') !!}">
                                        <span class="text text-danger">
                                            <strong id="question_ar_error"></strong>
                                        </span>
                                    </div>
                                </div>
                                <!-- end: input -->
                            </div>
                            <!-- end: row -->


                            <!-- begin: row -->
                            <div class="row">
                                <!-- begin: input -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="question">{!! __('faqs.question_en') !!}</label>
                                        <input type="text" id="question_en" name="question[en]" class="form-control"
                                            autocomplete="off" placeholder="{!! __('faqs.enter_question_en') !!}">
                                        <span class="text text-danger">
                                            <strong id="question_en_error"></strong>
                                        </span>

                                    </div>
                                </div>
                                <!-- end: input -->
                            </div>
                            <!-- end: row -->

                            <!-- begin: row -->
                            <div class="row">
                                <!-- begin: input -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="answer">{!! __('faqs.answer_ar') !!}</label>
                                        <textarea rows="5" id="answer_ar" name="answer[ar]" class="form-control" placeholder="{!! __('faqs.enter_answer_ar') !!}"></textarea>
                                        <span class="text text-danger">
                                            <strong id="answer_ar_error"></strong>
                                        </span>
                                    </div>
                                </div>
                                <!-- end: input -->
                            </div>
                            <!-- end: row -->


                            <!-- begin: row -->
                            <div class="row">
                                <!-- begin: input -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="answer">{!! __('faqs.answer_en') !!}</label>
                                        <textarea rows="5" id="answer_en" name="answer[en]" class="form-control" placeholder="{!! __('faqs.enter_answer_en') !!}"></textarea>
                                        <span class="text text-danger">
                                            <strong id="answer_en_error"></strong>
                                        </span>
                                    </div>
                                </div>
                                <!-- end: input -->
                            </div>
                            <!-- end: row -->


                            <!-- begin: row -->
                            <div class="row">
                                <!-- begin: input -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="status">{!! __('faqs.status') !!}</label>
                                        <div class="input-group">
                                            <div class="d-inline-block custom-control custom-radio mr-1">
                                                <input type="radio" class="custom-control-input bg-success"
                                                    name="status" id="colorRadio1" value="1">
                                                <label class="custom-control-label"
                                                    for="colorRadio1">{!! __('general.active') !!}
                                                </label>
                                            </div>
                                            <div class="d-inline-block custom-control custom-radio mr-1">
                                                <input type="radio" class="custom-control-input bg-danger"
                                                    name="status" id="colorRadio2" value="0">
                                                <label class="custom-control-label"
                                                    for="colorRadio2">{!! __('general.inactive') !!}
                                                </label>
                                            </div>
                                        </div>
                                        <span class="text text-danger">
                                            <strong id="status_error"> </strong>
                                        </span>
                                    </div>
                                </div>
                                <!-- end: input -->
                            </div>
                            <!-- end: row -->

                        </div>
                    </div>
                    <!--end: form-->
                </div>
                <!--end::modal body-->

                <!--begin::modal footer-->
                <div class="modal-footer">
                    <button type="submit" id="create_faq_btn" class="btn btn-info font-weight-bold ">
                        {{ trans('general.save') }}
                    </button>

                    <button type="button" id="cancel_faq_btn" class="btn btn-light-dark font-weight-bold"
                        data-dismiss="modal">
                        {{ trans('general.cancel') }}
                    </button>
                </div>
                <!--end::modal footer-->

            </div>
        </form>
    </div>
</div>

@push('scripts')
    <script type="text/javascript">
        // reset
        function resetCreateForm() {
            $('#question_ar').css('border-color', '');
            $('#question_en').css('border-color', '');
            $('#answer_ar').css('border-color', '');
            $('#answer_en').css('border-color', '');
            $('#status').css('border-color', '');

            $('#question_ar_error').text('');
            $('#question_en_error').text('');
            $('#answer_ar_error').text('');
            $('#answer_en_error').text('');
            $('#status_error').text('');
        }

        // cancel
        $('body').on('click', '#cancel_faq_btn', function(e) {
            $('#createFaqModal').modal('hide');
            $('#create_faq_form')[0].reset();
            resetCreateForm();
        });

        // hide
        $('#createFaqModal').on('hidden.bs.modal', function(e) {
            $('#createFaqModal').modal('hide');
            $('#create_faq_form')[0].reset();
            resetCreateForm();
        });


        // create
        $('#create_faq_form').on('submit', function(e) {
            e.preventDefault();
            // reset
            resetCreateForm();

            // paramters
            var currentPage = $('#yajra-datatable').DataTable().page();
            var data = new FormData(this);
            var type = $(this).attr('method');
            var url = $(this).attr('action');

            $.ajax({
                url: url,
                data: data,
                type: type,
                dataType: 'json',
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.status == true) {
                        console.log(data);
                        $('#yajra-datatable').DataTable().page(currentPage).draw(false);
                        $('#create_faq_form')[0].reset();
                        resetCreateForm();
                        $('#createFaqModal').modal('hide');
                        flasher.success("{!! __('general.add_success_message') !!}");
                    } else {
                        flasher.error("{!! __('general.add_error_message') !!}");
                    }
                },
                error: function(reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function(key, value) {
                        if (key == 'question.en') {
                            key = 'question_en';
                        } else if (key == 'question.ar') {
                            key = 'question_ar';
                        } else if (key == 'answer.ar') {
                            key = 'answer_ar';
                        } else if (key == 'answer.en') {
                            key = 'answer_en';
                        }
                        $('#' + key + '_error').text(value[0]);
                        $('#' + key).css('border-color', '#F64E60');
                    });
                }, //end error
            });

        });
    </script>
@endpush
