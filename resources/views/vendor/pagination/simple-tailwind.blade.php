@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between relative">
        <p class="absolute font-mono inset-0 text-center">{{$paginator->currentPage()}}</p>
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="relative inline-flex invisible">
                {!! __('pagination.previous') !!}
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="lowercase font-mono relative inline-flex items-center text-black dark:text-white hover:underline decoration-emerald-500 decoration-2">
                {!! __('pagination.previous') !!}
            </a>
        @endif



        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="lowercase font-mono relative inline-flex items-center text-black dark:text-white hover:underline decoration-emerald-500 decoration-2">
                {!! __('pagination.next') !!}
            </a>
        @else
            <span class="relative inline-flex invisible">
                {!! __('pagination.next') !!}
            </span>
        @endif
    </nav>
@endif
