<div class="text-center">
    @if (!empty($category->icon))
        <img src='{!! asset('/uploads/categories/' . $category->icon) !!}' width="80" height="80" class="img-fluid">
    @else
        <img src='{!! asset('assets/dashbaord/images/images-empty.png') !!}' style="width: 100%" class="img-fluid img-responsive">
    @endif
</div>
