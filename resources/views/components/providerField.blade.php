<div class="flex items-center justify-center mb-2" onmount="console.log('placeholder')">
    <input type="text" class="w-1/3 py-1 px-3 border border-gray-300" placeholder="name" name="name-{{ $id }}" value="{{ $name ?? '' }}" >
    <input type="text" class="w-1/3 py-1 px-3 border-r border-t border-b border-gray-300" placeholder="twitter" name="twitter-{{ $id }}" value="{{ $twitter ?? '' }}">
    <div class="leading-none flex-shrink px-3">
        <input class="hidden check-toggle" {{ ($revoked ?? false) ? "checked" : "" }} type="checkbox" id="revoked-{{ $id }}" name="revoked-{{ $id }}">
        <label for="revoked-{{ $id }}" class="border-gray-200 dark:border-gray-800 bg-gray-100 dark:bg-gray-900 {{ theme('toggle') }}"></label>
    </div>
    @if($removable ?? false)
        <form action="/providers/destroy/{{ $id }}" method="post">
            @csrf
            <button type="submit" class="px-3 py-1 bg-red-500 rounded-full text-white-light">
                <i class="fas fa-times mr-2"></i>
                Delete
            </button>
        </form>
    @else
        <button type="button" class="px-3 py-1 bg-red-500 rounded-full text-white-light opacity-0" >
            <i class="fas fa-times mr-2"></i>
            Delete
        </button>
    @endif
    
</div>