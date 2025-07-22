<div class="email-app-list-wraper col-md-7 card p-0">
    <div class="email-app-list">

        <div class="card-body chat-fixed-search">
            <fieldset class="form-group position-relative has-icon-left m-0 pb-1">
                <input type="text" wire:model.live="itemSearch" class="form-control" id="iconLeft4"
                    placeholder="Search email">
                <div class="form-control-position">
                    <i class="ft-search"></i>
                </div>
            </fieldset>
        </div>

        <div id="users-list" class="list-group">
            <div class="users-list-padding media-list">

                @forelse ($messages as $message)
                    <a @if ($message->id == $openMessage) style="background-color: #c5eecd;" @endif href="#"
                        class="media border-0" wire:click="showMessage({!! $message->id !!})">
                        <div class="media-left pr-1">
                            <span class="avatar avatar-md">
                                <span class="media-object rounded-circle text-circle bg-info">
                                    {!! $message->name[0] !!}
                                </span>
                            </span>
                        </div>
                        <div class="media-body " style="word-wrap:break-word;">
                            <h6 class="list-group-item-heading text-bold-500">
                                {!! $message->name !!}
                                <span class="float-right">
                                    <span class="font-small-2 primary"> {!! $message->created_at->diffForHumans() !!}</span>
                                </span>
                            </h6>
                            <p class="list-group-item-text  text-bold-600 mb-0">
                                {!! $message->subject !!}
                            </p>
                            <p class="list-group-item-text mb-0">
                                {!! \Illuminate\Support\Str::limit(strip_tags($message->message), $limit = 50, $end = '...') !!}
                                <span class="float-right primary">
                                    @if ($message->is_read == 1)
                                        <span class="badge badge-success mr-1">{!! __('contacts.readed') !!}</span>
                                    @else
                                        <span class="badge badge-danger mr-1">{!! __('contacts.new_contact') !!}</span>
                                    @endif

                                    {{-- warning yellow --}}
                                    <i wire:click="makeStarred({!! $message->id !!})"
                                        class="font-medium-3 ft-star {!! $message->is_star == 1 ? 'warning' : 'blue-grey' !!}   lighten-1"></i>
                                </span>
                            </p>
                        </div>
                    </a>
                @empty
                    <div class=" font-medium-3 text-center  blue-gray">
                        {!! __('contacts.no_messages_found') !!}
                    </div>
                @endforelse


            </div>
            <div class="row" style="display: flex; justify-content: center;">
                {!! $messages->links('vendor.livewire.simple-bootstrap') !!}
            </div>
        </div>
    </div>
</div>
