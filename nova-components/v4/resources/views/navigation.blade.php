@php
ksort($links);
@endphp
@foreach ($links as $name => $link)
    @php
        $link['_admin_only'] = $link['_admin_only'] ?? false
    @endphp
    @if(!$link['_admin_only'] || Auth::user()->isAdmin)
        @if(empty($link['_can']) || auth()->user()->can(...$link['_can']))

            @if (empty($link['_url']))

            
                <h3 class="flex items-center font-normal text-white mb-{{ isset($link['_links']) ? '6' : '8' }} text-base no-underline">
                    @if (empty($link['_icon']))
                        <svg class="sidebar-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path fill="#B3C1D1"
                                d="M19.48 13.03A4 4 0 0 1 16 19h-4a4 4 0 1 1 0-8h1a1 1 0 0 0 0-2h-1a6 6 0 1 0 0 12h4a6 6 0 0 0 5.21-8.98L21.2 12a1 1 0 1 0-1.72 1.03zM4.52 10.97A4 4 0 0 1 8 5h4a4 4 0 1 1 0 8h-1a1 1 0 0 0 0 2h1a6 6 0 1 0 0-12H8a6 6 0 0 0-5.21 8.98l.01.02a1 1 0 1 0 1.72-1.03z"></path>
                        </svg>
                    @else
                        {!! $link['_icon'] !!}
                    @endif
                    <span class="sidebar-label">
                        {{ $name }}
                    </span>
                </h3>

            @else
            @if($link['_params'] ?? false)
                <router-link exact tag="h3"
                    :to='{
                        name: @json($link['_type'] ?? "index"),
                        params: @json($link['_params'] ?? [])
                    }'
                    class="cursor-pointer flex items-center font-normal dim text-white mb-8 text-base no-underline">
                    {!! $link['_icon'] !!}                
                    <span class="text-white sidebar-label">{{ __($name) }}</span>
                </router-link>
            @else
                <a href="{{ $link['_url'] }}"
                class="cursor-pointer flex items-center font-normal dim text-white mb-{{ isset($link['_links']) ? '6' : '8' }} text-base no-underline"
                target="{{ isset($link['_target']) ? $link['_target'] : '_self' }}">

                        {!! $link['_icon'] !!}
                    <span class="text-white sidebar-label">
                    {{ $name }}
                </span>
                </a>
            @endif

            @endif

            {{-- @if (isset($link['_links'])) --}}

                @if (!empty($link['_links']))

                    <ul class="list-reset mb-8">

                        @foreach ($link['_links'] as $name => $sublink)

                            @if(empty($sublink['_can']) || auth()->user()->can($sublink['_can']))

                                <li class="leading-tight mb-4 ml-8 text-sm">
                                    <a href="{{ $sublink['_url'] }}" class="text-white text-justify no-underline dim"
                                    target="{{ isset($sublink['_target']) ? $sublink['_target'] : '_self' }}">
                                        {{ $name }}
                                    </a>
                                    @if (!empty($sublink['_links']))

                                        <ul class="list-reset mt-4" style="list-style-type: circle">

                                            @foreach ($sublink['_links'] as $name => $sublink)

                                                @if(empty($sublink['_can']) || auth()->user()->can($sublink['_can']))

                                                    <li class="leading-tight mb-2 ml-8 text-sm text-white">
                                                        <a href="{{ $sublink['_url'] }}" class="text-white text-justify no-underline dim"
                                                        target="{{ isset($sublink['_target']) ? $sublink['_target'] : '_self' }}">
                                                            {{ $name }}
                                                        </a>
                                                    </li>

                                                @endif

                                            @endforeach

                                        </ul>

                                    @endif
                                </li>

                            @endif

                        @endforeach

                    </ul>

                @endif

        @endif
    @endif


@endforeach

