<div class="swiper-container" style="position: absolute; top:0; left:0; right:0; bottom:0;">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <img src="{{ $phone_sm }}" 
                data-src="{{ $phone_lg }}" 
                alt="" 
                class="lazy slide-image">
        </div>
        @foreach($images as $image)
            <div class="swiper-slide">
                <img src="/SVG/loading-ellipse.svg"
                    data-src="{{ $image }}" 
                    alt="slide" 
                    class="lazy slide-image">
            </div>
        @endforeach
    </div>
    <div class="swiper-pagination" style="margin-bottom: -0.5rem;"></div>
</div>