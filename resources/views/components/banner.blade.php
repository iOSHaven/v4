<div class="relative overflow-hidden pb-8 mb-4">
    <div class="absolute left-0 top-0 bottom-0 right-0" style="background-color: lemonchiffon">
        <div class="absolute bottom-0 right-0 p-3 ">
            <strong>Promoted</strong> <i class="fas fa-ad ml-2"></i>
        </div>
    </div>
    {{-- @if(env('APP_ENV') == 'production') --}}
        @php $ad = new \App\Ad(); @endphp
        {!! $ad->get("banner") !!}
    {{-- @endif --}}
</div>
