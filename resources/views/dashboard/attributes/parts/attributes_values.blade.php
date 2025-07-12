@foreach ($attribute->attributeValues as $value)
    <div class="badge badge-md border-info info">
        {!! $value->getTranslation('value', Lang()) !!}
    </div>
@endforeach
