<div class="fixed bottom-0 left-0 right-0 py-3 px-2 mb-16 text-white dark:text-black pr-8 bg-{{$bg}}">
    <div class="p-3 absolute right-0 top-0 cursor-pointer"
        onclick="this.parentNode.parentNode.removeChild(this.parentNode)">
        <i class="fal fa-times"></i>
    </div>
    {{ $slot }}
</div>