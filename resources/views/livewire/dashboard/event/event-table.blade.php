<div class="table-responsive">
    <table class="table" id='myTable'>
        <thead>
            <tr>
                <th>#</th>
                <th>{!! __('events.title') !!}</th>
                <th>{!! __('events.start_date') !!}</th>
                <th> <button type="button" class="btn btn-sm btn-info" wire:click="addRow()">
                        <i class="la la-plus"></i>
                    </button></th>
            </tr>
        </thead>
        <tbody>

            @foreach ($events as $index => $event)
                <tr>
                    <th class="col-lg-2 ">#</th>
                    <td class="col-lg-5">
                        <input type="text" wire::model="event.title" placeholder="{!! __('events.enter_title') !!}"
                            class="form-control">
                    </td>
                    <td class="col-lg-4">
                        <input type="date" wire:model="event.start_date" placeholder="{!! __('events.enter_start_date') !!}"
                            class="form-control">
                    </td>

                    <td class="actions text-center">

                        <button type="button" class="btn btn-sm btn-danger"
                            wire:click="removeRow({!! $index !!})">
                            <i class="la la-trash"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-info">
                            <i class="la la-lock"></i>
                        </button>
                        <input type="text" wire::model ="event.id" value="{!! $event->id !!}">
                    </td>
                    <!-- end: actions ---------->
                </tr>
            @endforeach


        </tbody>

    </table>

</div>
