<form class="form" method="POST">
    @csrf
    <div class="form-body">

        @if (!empty($successMessage))
            <div class="container-fluid">
                <div class="alert alert-success">
                    {!! $successMessage !!}
                </div>

            </div>
        @endif

        <!-- begin: steps row -->
        <div class="container-fluid">
            <div class="col-md-12 col-sm-12">
                <div class="step-wizard ">
                    <ul class="step-wizard-list">
                        <li class="step-wizard-item  {!! $currentStep == 1 ? 'current-item' : '' !!}">
                            <span class="progress-count">1</span>
                            <span class="progress-label">{!! __('products.basic_information') !!}</span>
                        </li>
                        <li class="step-wizard-item  {!! $currentStep == 2 ? 'current-item' : '' !!}">
                            <span class="progress-count">2</span>
                            <span class="progress-label">{!! __('products.product_variants') !!}</span>
                        </li>
                        <li class="step-wizard-item {!! $currentStep == 3 ? 'current-item' : '' !!}">
                            <span class="progress-count">3</span>
                            <span class="progress-label">{!! __('products.product_images') !!}</span>
                        </li>
                        <li class="step-wizard-item {!! $currentStep == 4 ? 'current-item' : '' !!}">
                            <span class="progress-count">4</span>
                            <span class="progress-label">{!! __('products.confirmations') !!}</span>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
        <!-- end: steps row -->


        <!-- begin: first basic info -->
        <div class="container-fluid {!! $currentStep != 1 ? 'displayNone' : '' !!}">
            @include('livewire.dashboard.product.basic_info')
        </div>
        <!-- end: first basic info  -->


        <!-- begin: second product variants -->
        <div class="container-fluid {!! $currentStep != 2 ? 'displayNone' : '' !!}">
            @include('livewire.dashboard.product.product_variants')
        </div>
        <!-- end: second product variants -->


        <!-- begin: third product images -->
        <div class="container-fluid {!! $currentStep != 3 ? 'displayNone' : '' !!}">
            @include('livewire.dashboard.product.product_images')
        </div>
        <!-- end: third product images -->


        <!-- begin: fourth confirmations -->
        <div class="container-fluid {!! $currentStep != 4 ? 'displayNone' : '' !!}">
            @include('livewire.dashboard.product.confirmations')
        </div>
        <!-- end: fourth confirmations -->


    </div>
</form>
