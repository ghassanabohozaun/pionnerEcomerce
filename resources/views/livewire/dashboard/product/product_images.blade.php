<div class="row">

    <!-- begin: input -->
    <div class="col-md-12">
        <div class="form-group">
            <label for="images">{!! __('products.images') !!}</label>
            <input type="file" wire:model.live="images" class="form-control" multiple>
            @error('images')
                <span class="text text-danger">
                    <strong>{!! $message !!}</strong>
                </span>
            @enderror
        </div>
    </div>
    <!-- end: input -->

    @if ($images)
        <div class="col-md-12">
            @foreach ($images as $key => $image)
                <div class="position-relative d-inline-block mr-2 mb-2">
                    <img src="{!! $image->temporaryUrl() !!}" class="img-thumbnail round-md" width="300">

                    <!-- begin: delete image -->
                    <button type="button" wire:click="deleteImage({!! $key !!})"
                        class="btn btn-danger btn-sm position-absolute" style=" top: 5px; right: 5px;">
                        <i class="la la-trash"></i>
                    </button>
                    <!-- end: delete image -->

                    <!-- begin: full screen image -->
                    <button type="button" wire:click="openFullScreen({!! $key !!})"
                        class="btn btn-info btn-sm position-absolute" style=" top: 5px; left: 5px;">
                        <i class="la la-expand"></i>
                    </button>
                    <!-- end: full screen image -->

                </div>
            @endforeach
        </div>
    @endif

    <!-- begin: full screen modal -->
    <div wire:ignore.self class="modal fade" id="fullScreenModal" tabindex="-1" aria-labelledby="fullScreenModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-center">
            <div class="modal-content">
                <div class="modal-body">
                    <img src="{!! $fullScreenImage !!}" class="img-fluid" id="fullScreenImage" alt="Full Screen Omage"
                        style="object-fit: fill">
                </div>
            </div>
        </div>

    </div>
    <!-- end: full screen modal -->
</div>

<!-- begin: button -->
<div class="row {!! Lang() == 'ar' ? 'pull-left' : 'pull-right' !!}">
    <div class="col-md-12">
        <button type="button" wire:click ="backStep(2)" class="btn btn-info btn-glow px-2">
            {!! __('products.back') !!}

        </button>
        <button type="button" wire:click="thirdStepSubmit" class="btn btn-primary btn-glow px-2">
            {!! __('products.next') !!}

        </button>
    </div>
</div>
<div class="clearfix"></div>
<!-- end: button -->
