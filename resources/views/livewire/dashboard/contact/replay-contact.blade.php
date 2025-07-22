    <!-- begin: modal -->
    <div class="modal fade" id="replayContactModal" tabindex="-1" role="dialog" aria-labelledby="replayContactModalLabel"
        aria-hidden="true">

        <div class="modal-dialog modal-md" role="document">
            <form class="form" wire:submit.prevent="sendReplayContact">
                @csrf
                <div class="modal-content">

                    <!--begin::modal header-->
                    <div class="modal-header">
                        <h5 class="modal-title test_answer_header" id="replayContactModalLabel">{!! __('contacts.replay_contact') !!}
                        </h5>
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
                                            <input readonly type="text" wire:model='contactId' class="form-control">
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
                                            <label for="name">{!! __('contacts.name') !!}</label>
                                            <input readonly type="text" wire:model='name' name="name"
                                                class="form-control" autocomplete="off"
                                                placeholder="{!! __('contacts.enter_name') !!}">
                                            <span class="text text-danger">
                                                <strong id="name_error"></strong>
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
                                            <label for="email">{!! __('contacts.email') !!}</label>
                                            <input readonly type="text" wire:model='email' name="email"
                                                class="form-control" autocomplete="off"
                                                placeholder="{!! __('contacts.enter_email') !!}">
                                            <span class="text text-danger">
                                                <strong id="email_error"></strong>
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
                                            <label for="subject">{!! __('contacts.subject') !!}</label>
                                            <input readonly type="text" wire:model='subject' name="subject"
                                                class="form-control" autocomplete="off"
                                                placeholder="{!! __('contacts.enter_subject') !!}">
                                            <span class="text text-danger">
                                                <strong id="subject_error"></strong>
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
                                            <label for="replay_message">{!! __('contacts.replayMessage') !!}</label>
                                            <textarea wire:model='replayMessage' name="replayMessage" rows="5" class="form-control"
                                                placeholder="{!! __('contacts.enter_message') !!}"></textarea>
                                            @error('replayMessage')
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
                        <!--end: form-->
                    </div>
                    <!--end::modal body-->

                    <!--begin::modal footer-->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info font-weight-bold ">
                            {{ trans('general.save') }}
                        </button>

                        <button type="button" class="btn btn-light-dark font-weight-bold" data-dismiss="modal">
                            {{ trans('general.cancel') }}
                        </button>
                    </div>
                    <!--end::modal footer-->

                </div>
            </form>
        </div>
    </div>
    <!-- end: modal -->


    @script
        <script>
            Livewire.on('launch-replay-modal', (event) => {
                $('#replayContactModal').modal('show');
            });
            Livewire.on('close-replay-modal', (event) => {
                $('#replayContactModal').modal('hide');
            });
        </script>
    @endscript
