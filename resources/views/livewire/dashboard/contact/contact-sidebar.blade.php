<div class="email-app-menu col-md-5 card d-none d-lg-block">

    <div class="form-group form-group-compose text-center mt-3">
        <button class="btn btn-block btn-danger dropdown-toggle  btn-glow px-2 mb-2" id="dropdownBreadcrumbButton"
            type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{!! __('general.actions') !!}
        </button>

        <div class="dropdown-menu" aria-labelledby="dropdownBreadcrumbButton" x-placement="bottom-start"
            style="position: absolute; transform: translate3d(0px, 40px, 0px); top: 0px; left: 0px; will-change: transform;">
            <a wire:click.prevent="markAllAsRead()" class="dropdown-item" href="#"><i class="la la-file">
                </i> {!! __('contacts.mark_all_as_read') !!}
            </a>
            <a wire:click.prevent="delateAllRead()" class="dropdown-item" href="#"><i class="la la-trash">
                </i> {!! __('contacts.delete_all_read') !!}
            </a>
            <a wire:click.prevent="deleteAllReplied()" class="dropdown-item" href="#"><i class="la la-trash">
                </i> {!! __('contacts.delete_all_replied') !!}
            </a>
            <a wire:click.prevent="deleteAllTrashed()" class="dropdown-item" href="#"><i class="la la-trash">
                </i> {!! __('contacts.delete_all_trashed') !!}
            </a>

        </div>


    </div>

    <h6 class="text-muted text-bold-500 mb-1">{!! __('contacts.messages') !!}</h6>

    <div class="list-group list-group-messages mb-2">

        <a wire:click.prevent="selectScreen('inbox')" href="#"
            class="list-group-item  @if ($screen == 'inbox') active @endif  list-group-item-action border-0">
            <i class="ft-inbox mr-1"></i> {!! __('contacts.inbox') !!}
            <span class="badge badge-primary badge-pill float-right">{!! $inboxCount !!}</span>
        </a>


        <a wire:click.prevent="selectScreen('readed')" href="#"
            class="list-group-item  @if ($screen == 'readed') active @endif  list-group-item-action border-0">
            <i class="ft-file mr-1"></i> {!! __('contacts.messages_readed') !!}
            <span class="badge badge-success badge-pill float-right">{!! $readedCount !!}</span>
        </a>

        <a wire:click.prevent="selectScreen('starred')" href="#"
            class="list-group-item   @if ($screen == 'starred') active @endif list-group-item-action border-0">
            <i class="ft-star mr-1"></i> {!! __('contacts.starred') !!}
            <span class="badge badge-warning badge-pill float-right">{!! $starredCount !!}</span>
        </a>

        <a wire:click.prevent="selectScreen('replied')" href="#"
            class="list-group-item  @if ($screen == 'replied') active @endif list-group-item-action border-0">
            <i class="la la-paper-plane-o mr-1"></i> {!! __('contacts.messages_replied') !!}
            <span class="badge badge-info badge-pill float-right">{!! $repliedCount !!}</span>
        </a>

        <a wire:click.prevent="selectScreen('trashed')" href="#"
            class="list-group-item   @if ($screen == 'trashed') active @endif  list-group-item-action border-0">
            <i class="ft-trash-2 mr-1"></i> {!! __('contacts.trashed') !!}
            <span class="badge badge-danger badge-pill float-right">{!! $trashedCount !!}</span>
        </a>

    </div>

</div>
