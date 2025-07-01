@if (!empty($brand->logo))
    <img src='{!! asset('assets/dashbaord/uploadImages/brands/' . $brand->logo) !!}' width="80" height="80" class="img-fluid">
@else
    <img src='{!! asset('assets/dashbaord/images/images-empty.png') !!}' width="80" height="80" class="img-fluid">
@endif
