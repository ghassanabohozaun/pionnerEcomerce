@extends('layouts.dashboard.app')
@section('title')
    {!! $title !!}
@endsection

@section('content')
    <div class="app-content content">
        <div class="sidebar-left">
            <div class="sidebar">
                <div class="sidebar-content email-app-sidebar d-flex">
                    <!-- begin: contact sidebar-->
                    @livewire('dashboard.contact.contact-sidebar')
                    <!-- end:  contact sidebar-->

                    <!-- begin:  contact messages-->
                    @livewire('dashboard.contact.contact-message')
                    <!-- end:  contact messages-->
                </div>
            </div>
        </div>

        <!-- begin:  contact show-->
        @livewire('dashboard.contact.contact-show')
        @livewire('dashboard.contact.replay-contact')
        <!-- begin:  contact show-->
    </div>
@endsection
@push('scripts')
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('delete-success-alert', (event) => {
                flasher.success("{!! __('general.delete_success_message') !!}");
            });

            Livewire.on('delete-error-alert', (event) => {
                flasher.success("{!! __('general.delete_error_message') !!}");
            });


            // Livewire.on('launch-replay-modal', (event) => {
            //     alert('hiiiiiii');
            // });
        });
    </script>
@endpush
