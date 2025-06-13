    <!-- BEGIN VENDOR JS-->
    <script src="{!! asset('assets/dashbaord') !!}/vendors/js/vendors.min.js" type="text/javascript"></script>
    <script src="{!! asset('assets/dashbaord') !!}/vendors/js/extensions/sweetalert.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{!! asset('assets/dashbaord') !!}/vendors/js/charts/chartist.min.js" type="text/javascript"></script>
    <script src="{!! asset('assets/dashbaord') !!}/vendors/js/charts/chartist-plugin-tooltip.min.js" type="text/javascript"></script>
    <script src="{!! asset('assets/dashbaord') !!}/vendors/js/charts/raphael-min.js" type="text/javascript"></script>
    <script src="{!! asset('assets/dashbaord') !!}/vendors/js/charts/morris.min.js" type="text/javascript"></script>
    <script src="{!! asset('assets/dashbaord') !!}/vendors/js/timeline/horizontal-timeline.js" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN MODERN JS-->
    <script src="{!! asset('assets/dashbaord') !!}/js/core/app-menu.js" type="text/javascript"></script>
    <script src="{!! asset('assets/dashbaord') !!}/js/core/app.js" type="text/javascript"></script>
    <script src="{!! asset('assets/dashbaord') !!}/js/scripts/customizer.js" type="text/javascript"></script>
    <!-- END MODERN JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{!! asset('assets/dashbaord') !!}/js/scripts/pages/dashboard-ecommerce.js" type="text/javascript"></script>
    {{-- <script src="{!! asset('assets/dashbaord') !!}/js/scripts/sweetalert2@11.js" type="text/javascript"></script> --}}

    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{!! asset(path: 'assets/dashbaord') !!}/js/scripts/extensions/sweet-alerts.js" type="text/javascript"></script>
    {{-- <script src="{!! asset(path: 'assets/dashbaord') !!}/js/scripts/my-scripts.js" type="text/javascript"></script> --}}

    <!-- END PAGE LEVEL JS-->

    <!-- END PAGE LEVEL JS-->

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
