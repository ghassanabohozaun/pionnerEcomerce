@if (!empty($brand->logo))
    <img src='{!! asset('assets/dashbaord/uploadImages/brands/' . $brand->logo) !!}' width="100" height="80" class="img-fluid" width="80" height="80">
@else
    <img src='{!! asset('assets/dashbaord/images/images-empty.png') !!}' width="100" height="80" class="img-fluid" width="80" height="80">
@endif
