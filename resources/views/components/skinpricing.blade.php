
@if ($skin->amount == 0)
    <h4 class="sale-price">FREE</h4>
@else
    @if($skin->onSale)
        <h5 class="regular-price">Regular Price: <span style="text-decoration: line-through;">${{ $skin->price }}</span></h5>
        <h4 class="sale-price">Sale: ${{ $skin->salePrice }}</h4>
    @else
        <h5 class="regular-price">Price: <span>${{ $skin->price }}</span></h5>
    @endif
@endif
@auth
    @if($skin->affiliate)
        <a href="{{ URL::temporarySignedRoute(
        'skin.ref', now()->addMinutes(10), ['uuid' => $skin->uuid]
        ) }}" target="_blank" class='purchase-btn'>Get</a>
    @elseif(Auth::user()->skins->contains($skin->id) || $skin->amount == 0)
        <a href="{{ URL::temporarySignedRoute(
            'skin', now()->addMinutes(10), ['uuid' => $skin->uuid]
            ) }}" download class='purchase-btn'>Download</a>
    @else
        <button class='purchase-btn' data-ppuuid="{{$skin->uuid}}" data-price="{{ $skin->amount }}" onclick="showPP(this)">
            Buy
        </button>
        
    @endif
    {{-- <a href="#" class="purchase-btn" style="display: block;">Purchase Now</a> --}}
@else
    @if($skin->affiliate)
        <a href="{{ URL::temporarySignedRoute(
        'skin.ref', now()->addMinutes(10), ['uuid' => $skin->uuid]
        ) }}" target="_blank" class='purchase-btn'>Get</a>
    @elseif(Auth::guest() && $skin->amount == 0)
    <a href="/login?redirect=/themes#{{$skin->uuid}}" style="margin-bottom: 0.5rem; color: white; font-size: 0.8em; text-decoration: underline;">Login for unlimited downloads</a>
        <a class="purchase-btn" style="display: block;" href="{{ URL::temporarySignedRoute(
            'skin', now()->addMinutes(10), ['uuid' => $skin->uuid]
            ) }}">Download</a>
    @else
        <a href="/login?redirect=/themes#{{$skin->uuid}}" style="margin-bottom: 0.5rem; color: white; font-size: 0.8em; text-decoration: underline;">Login for unlimited downloads</a>
        <button class="purchase-btn" style="display: block;" data-ppuuid="{{$skin->uuid}}" data-price="{{ $skin->amount }}" onclick="showPP(this)">Purchase Now</button>
    @endif
    {{-- <a href="/login?redirect=/themes#{{$skin->uid}}" class="purchase-btn" style="display: block;">Login</a> --}}
@endif