@php
$id = Str::random(10);
@endphp

<input id="collapse-{{$id}}" type="checkbox" class="collapse-check" {{ ($show ?? false) ? 'checked' : ''}}>
<label for="collapse-{{$id}}" class="my-2 collapse-label block">
<div class="flex items-center justify-between">
    <span class="title">{{ $title }}</span>
    <i class="fal fa-plus show-closed"></i>
    <i class="fal fa-minus show-open"></i>
</div>
</label>
<div class="{{ ($pre ?? false) ? 'text-pre' : ''}} collapse">{{ $slot }}</div>
<hr class="border-0 border-b {{ theme('border-gray-200') }}">