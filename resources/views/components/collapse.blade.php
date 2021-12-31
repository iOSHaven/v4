@php
$id = Str::random(10);
@endphp

<div class="shadow rounded-lg mb-2 bg-white dark:bg-black">
    <input id="collapse-{{$id}}" type="checkbox" class="collapse-check" {{ ($show ?? false) ? 'checked' : ''}}>
    <label for="collapse-{{$id}}" class="collapse-label block select-none px-3 py-1">
        <div class="flex items-center justify-between">
            <span class="text-md font-bold">{{ $title }}</span>
            <i class="fal fa-chevron-down show-closed"></i>
            <i class="fal fa-chevron-up show-open"></i>
        </div>
    </label>
    <div class=" select-none pt-1 px-2 pb-1 {{ ($pre ?? false) ? 'text-pre' : ''}} collapse">{{ $slot }}</div>
    
</div>
{{-- <hr class="border-0 border-b border-gray-200 dark:border-gray-800"> --}}