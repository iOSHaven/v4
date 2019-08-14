<div class="fixed bottom-0 left-0 right-0 py-3 px-2 mb-16 text-white-light pr-8 {{ theme('bg-red') }}">
    <div class="p-3 absolute right-0 top-0 cursor-pointer"
        onclick="this.parentNode.parentNode.removeChild(this.parentNode)">
        <i class="fal fa-times"></i>
    </div>
    {{ $slot }}
</div>