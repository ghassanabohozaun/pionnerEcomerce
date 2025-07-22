<div class="content-right">
    <div class="">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <div class="card email-app-details d-none d-lg-block">
                <div class="card-content pb-5">

                    <div class="email-app-options card-body">
                        <div class="row">
                            <!-- begin: left -->
                            <div class="col-md-6 col-12">
                                @if ($message)
                                    <div class="btn-group" role="group" aria-label="Basic example">

                                        <button wire:click="replayContact({!! $message->id !!})" type="button"
                                            class="btn btn-sm btn-outline-secondary" data-toggle="tooltip"
                                            data-placement="top" data-original-title="{!! __('contacts.replay') !!}">
                                            <i class="la la-reply"></i>
                                        </button>

                                        <button wire:click="starredMessage({!! $message->id !!})" type="button"
                                            class="btn btn-sm btn-outline-secondary" data-toggle="tooltip"
                                            data-placement="top" data-original-title="{!! __('contacts.starred') !!}">
                                            <i class="font-medium-1 ft-star "></i>
                                        </button>

                                        {{-- <button type="button" class="btn btn-sm btn-outline-secondary"
                                            data-toggle="tooltip" data-placement="top"
                                            data-original-title="Report SPAM">
                                            <i class="ft-alert-octagon"></i>
                                        </button> --}}

                                        @if ($message->deleted_at == null)
                                            <button wire:click="deleteMessage({!! $message->id !!})" type="button"
                                                class="btn btn-sm btn-outline-secondary" data-toggle="tooltip"
                                                data-placement="top" data-original-title="{!! __('contacts.delete') !!}">
                                                <i class="ft-trash-2"></i>
                                            </button>
                                        @endif


                                    </div>
                                @endif
                            </div>
                            <!-- end: left -->
                            <!-- begin: right -->
                            <div class="col-md-6 col-12 text-right">
                                @if ($message)
                                    <div class="btn-group ml-1">
                                        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle"
                                            data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">More</button>
                                        <div class="dropdown-menu" x-placement="bottom-start"
                                            style="position: absolute; transform: translate3d(0px, 28px, 0px); top: 0px; left: 0px; will-change: transform;">

                                            <a wire:click="markUnread({!! $message->id !!})" class="dropdown-item"
                                                href="#">{!! __('contacts.mark_as_unread') !!}
                                            </a>

                                            <a wire:click="starredMessage({!! $message->id !!})"
                                                class="dropdown-item" href="#">{!! __('contacts.add_star') !!}
                                            </a>


                                            <a wire:click="forceDeleteMessage({!! $message->id !!})"
                                                class="dropdown-item" href="#">{!! __('contacts.force_delete') !!}
                                            </a>
                                            @if ($message->deleted_at != null)
                                                <a wire:click="restoreMessage({!! $message->id !!})"
                                                    class="dropdown-item" href="#">{!! __('contacts.restore') !!}
                                                </a>
                                            @endif


                                        </div>
                                    </div>
                                @endif
                            </div>
                            <!-- end: right -->
                        </div>
                    </div>

                    <div class="email-app-title card-body">
                        @if (!$message)
                            <h4 class="list-group-item-heading text-center blue-grey">{!! __('contacts.no_message_found') !!}</h4>
                        @endif
                        {{-- <p class="list-group-item-text">
                                <span class="primary">
                                    <span
                                        class="badge badge-primary">.............................................</span>
                                    <i class="float-right font-medium-3 ft-star {!! $message->is_star == 1 ? 'warning' : 'blue-grey' !!}"></i>
                                </span>
                            </p> --}}

                    </div>

                    <!-- begin: message -->
                    @if ($message)
                        <div class="media-list">

                            <div id="headingCollapse1" class="card-header p-0">
                                <a data-toggle="collapse" href="#collapse1" aria-expanded="true"
                                    aria-controls="collapse1"
                                    class="collapsed email-app-sender media border-0 bg-blue-grey bg-lighten-5">
                                    <div class="media-left pr-1">
                                        <span class="avatar avatar-md">
                                            <img class="media-object rounded-circle" src="{!! asset('assets\dashbaord\images\avatar-male.jpg') !!}"
                                                alt="Generic placeholder image">
                                        </span>
                                    </div>
                                    <div class="media-body w-100">
                                        <h6 class="list-group-item-heading">{!! $message->name !!}</h6>
                                        <p class="list-group-item-text">
                                            {!! $message->subject !!}
                                            <span class="float-right text muted">{!! $message->created_at->diffForHumans() !!}</span>
                                        </p>
                                    </div>
                                </a>
                            </div>

                            <div id="collapse1" role="tabpanel" aria-labelledby="headingCollapse1"
                                class="card-collapse collapse" aria-expanded="true">
                                <div class="card-content">
                                    <div class="card-body">
                                        <p>{!! $message->message !!}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="email-app-text-action card-body">
                            </div>

                        </div>
                    @endif
                    <!-- end: message -->

                </div>
            </div>
        </div>
    </div>
</div>
