    <button class="btn btn-outline-primary" data-toggle="modal" data-target="#contentPage_{{ $faqQuestion->id }}">
        <i class="fa fa-expand"></i> {!! __('products.full_screen') !!}
    </button>

    <!-- Fullscreen Modal -->
    <div class="modal fade" id="contentPage_{{ $faqQuestion->id }}" tabindex="-1" role="dialog"
        aria-labelledby="fullscreenModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="fullscreenModalLabel">{{ $faqQuestion->subject }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="fullscreenCarousel" class="" data-ride="carousel">
                        <div class="active">
                            <p>{{ $faqQuestion->message }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
