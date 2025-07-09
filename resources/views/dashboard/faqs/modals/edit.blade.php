<div class="modal fadeIn" id="updateFaqModal" tabindex="-1" role="dialog" aria-labelledby="updateFaqModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-md" role="document">
        <form class="form" action="" method="POST" enctype="multipart/form-data" id='update_faq_form'>
            @csrf
            @method('PUT')
            <div class="modal-content">

                <!--begin::modal header-->
                <div class="modal-header">
                    <h5 class="modal-title test_answer_header" id="updateFaqModalLabel">{!! __('faqs.update_faq') !!}</h5>
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
                                        <input type="text" id="id_edit" name="id" class="form-control">
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
                                        <label for="question">{!! __('faqs.question_ar') !!}</label>
                                        <input type="text" id="question_ar_edit" name="question[ar]"
                                            class="form-control" autocomplete="off"
                                            placeholder="{!! __('faqs.enter_question_ar') !!}">
                                        <span class="text text-danger">
                                            <strong id="question_ar_error_edit"></strong>
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
                                        <input type="text" id="question_en_edit" name="question[en]"
                                            class="form-control" autocomplete="off"
                                            placeholder="{!! __('faqs.enter_question_en') !!}">
                                        <span class="text text-danger">
                                            <strong id="question_en_error_edit"></strong>
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
                                        <textarea rows="5" id="answer_ar_edit" name="answer[ar]" class="form-control"
                                            placeholder="{!! __('faqs.enter_answer_ar') !!}"></textarea>
                                        <span class="text text-danger">
                                            <strong id="answer_ar_error_edit"></strong>
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
                                        <textarea rows="5" id="answer_en_edit" name="answer[en]" class="form-control"
                                            placeholder="{!! __('faqs.enter_answer_en') !!}"></textarea>
                                        <span class="text text-danger">
                                            <strong id="answer_en_error_edit"></strong>
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
                                                    name="status" id="status_active_edit" value="1">
                                                <label class="custom-control-label"
                                                    for="status_active_edit">{!! __('general.active') !!}
                                                </label>
                                            </div>
                                            <div class="d-inline-block custom-control custom-radio mr-1">
                                                <input type="radio" class="custom-control-input bg-danger"
                                                    name="status" id="status_inactive_edit" value="0">
                                                <label class="custom-control-label"
                                                    for="status_inactive_edit">{!! __('general.inactive') !!}
                                                </label>
                                            </div>
                                        </div>
                                        <span class="text text-danger">
                                            <strong id="status_error_edit"> </strong>
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
        // show edit modal
        $('body').on('click', '.edit_faq_button', function(e) {
            e.preventDefault();
            var faq_id = $(this).attr('faq-id');
            var faq_question_ar = $(this).attr('faq-question-ar');
            var faq_question_en = $(this).attr('faq-question-en');
            var faq_answer_ar = $(this).attr('faq-answer-ar');
            var faq_answer_en = $(this).attr('faq-answer-en');
            var faq_status = $(this).attr('faq-status');

            $('#id_edit').val(faq_id);
            $('#question_ar_edit').val(faq_question_ar);
            $('#question_en_edit').val(faq_question_en);
            $('#answer_ar_edit').val(faq_answer_ar);
            $('#answer_en_edit').val(faq_answer_en);

            if (faq_status == 1) {
                $('#status_active_edit').prop('checked', true);
            }

            $('#updateFaqModal').modal('show');
        })

        // reset
        function resetEditForm() {
            $('#question_ar_edit').css('border-color', '');
            $('#question_en_edit').css('border-color', '');
            $('#answer_ar_edit').css('border-color', '');
            $('#answer_en_edit').css('border-color', '');
            $('#status_edit').css('border-color', '');

            $('#question_ar_error_edit').text('');
            $('#question_en_error_edit').text('');
            $('#answer_ar_error_edit').text('');
            $('#answer_en_error_edit').text('');
            $('#status_error_edit').text('');
        }

        // cancel
        $('body').on('click', '#cancel_faq_btn', function(e) {
            $('#updateFaqModal').modal('hide');
            $('#update_faq_form')[0].reset();
            resetEditForm();
        });

        // hide
        $('#updateFaqModal').on('hidden.bs.modal', function(e) {
            $('#updateFaqModal').modal('hide');
            $('#update_faq_form')[0].reset();
            resetEditForm();
        });


        // create
        $('#update_faq_form').on('submit', function(e) {
            e.preventDefault();
            // reset
            resetEditForm();

            // paramters
            var faq_id = $('#id_edit').val();
            var currentPage = $('#yajra-datatable').DataTable().page();
            var data = new FormData(this);
            var type = $(this).attr('method');
            var url = "{!! route('dashboard.faqs.update', 'id') !!}".replace('id', faq_id);

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
                        $('#update_faq_form')[0].reset();
                        resetEditForm();
                        $('#updateFaqModal').modal('hide');
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
                        $('#' + key + '_error_edit').text(value[0]);
                        $('#' + key + '_edit').css('border-color', '#F64E60');
                    });
                }, //end error
            });

        });
    </script>
@endpush
