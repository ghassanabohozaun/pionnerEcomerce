<div class="row">
    <!-- begin: input -->
    <div class="col-md-12">
        <div class="form-group">
            <label for="newImages">{!! __('products.images') !!}</label>
            <input type="file" wire:model.live="newImages" class="form-control" multiple>
            @error('newImages')
                <span class="text text-danger">
                    <strong>{!! $message !!}</strong>
                </span>
            @enderror
        </div>
    </div>
    <!-- end: input -->

    <!-- begin: old image -->
    @if ($images)
        <div class="col-md-12">
            @foreach ($images as $key => $image)
                <div class="position-relative d-inline-block mr-2 mb-2">
                    <img src="{!! asset('uploads/products/' . $image->file_name) !!}" class="img-fluid img-thumbnail round-md"
                        style="max-width: 300px; max-height: 300px;">

                    <!-- begin: delete image -->
                    <button type="button" wire:click="deleteOldImage({{ $key }} , {{ $image }})"
                        class="btn btn-danger btn-sm position-absolute" style=" top: 5px; right: 5px;">
                        <i class="la la-trash"></i>
                    </button>
                    <!-- end: delete image -->

                    <!-- begin: full screen image -->
                    <button type="button"
                        wire:click="openOldImageFullScreen({{ $key }} , {{ $image }})"
                        class="btn btn-info btn-sm position-absolute" style=" top: 5px; left: 5px;">
                        <i class="la la-expand"></i>
                    </button>
                    <!-- end: full screen image -->

                </div>
            @endforeach
        </div>
    @endif
    <!-- end: old image -->

    <!-- begin: new image -->
    @if ($newImages)
        <div class="col-md-12">
            <h3>{!! __('products.new_images') !!}</h3>
            @foreach ($newImages as $key => $image)
                <div class="position-relative d-inline-block mr-2 mb-2">
                    <img src="{!! $image->temporaryUrl() !!}" class="img-fluid img-thumbnail round-md"
                        style="max-width: 300px; max-height: 300px;">

                    <!-- begin: delete image -->
                    <button type="button" wire:click="deleteNewImage({{ $key }})"
                        class="btn btn-danger btn-sm position-absolute" style=" top: 5px; right: 5px;">
                        <i class="la la-trash"></i>
                    </button>
                    <!-- end: delete image -->

                    <!-- begin: full screen image -->
                    <button type="button" wire:click="openNewImageFullScreen({{ $key }})"
                        class="btn btn-info btn-sm position-absolute" style=" top: 5px; left: 5px;">
                        <i class="la la-expand"></i>
                    </button>
                    <!-- end: full screen image -->

                </div>
            @endforeach
        </div>
    @endif
    <!-- end: new  image -->


    <!-- begin: full screen modal -->
    <div wire:ignore.self class="modal fade" id="fullScreenModal" tabindex="-1" aria-labelledby="fullScreenModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-center">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <img src="{!! $fullScreenImage !!}" class="img-fluid img-responsive" id="fullScreenImage"
                        alt="Full Screen Omage" style="object-fit: fill">
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
