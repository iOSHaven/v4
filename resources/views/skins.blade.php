@extends('layouts.redesign', ["title" => "Skins"])


@section('header')
{{-- <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css"> --}}
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

{{-- <script src="https://unpkg.com/swiper/swiper-bundle.js"></script> --}}
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
@endsection

@section('content')

<section>
  <div class="container">
    <div class="mb-4 {{ theme('text-black') }}">
      <div class="text-4xl">Skins</div>
      <p>Download icon packs to customize your iOS 14 experience. Get <span class="font-bold uppercase underline">free updates</span> on all icon packs! <a href="https://www.macrumors.com/how-to/change-app-icons/" class="text-blue-dark underline">Tutorial</a></p>
    </div>
    {{-- <div class="w-full bg-yellow-light p-3 rounded-lg text-black-light text-center uppercase mb-4">
      iOS 14 Required
    </div>

    <div class="w-full bg-green-light p-3 rounded-lg text-black-light text-center uppercase mb-4">
      Unlimited Free Updates
    </div> --}}


    @foreach($skins as $skin)
      <div class="{{ theme('bg-white', 'text-black') }} rounded-lg overflow-hidden mb-3 shadow relative">
        <div class="absolute top-0 right-0 mr-3 mt-3 hidden" id="skintag-{{$skin->uuid}}" style="z-index: 2">
          @if($skin->amount == 0)
            <span class="bg-green-light uppcase font-bold text-black-light px-3 py-1 rounded-lg">free</span>
          @elseif($skin->onSale)
            <i class="fas fa-tag fa-2x text-green-dark"></i>
          @endif
        </div>
        <div class="swiper-container">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                @foreach($skin->covers as $cover)
                  <div class="swiper-slide">
                    <img data-src="{{ $cover }}" 
                      alt="image preview"
                      data-tag-id="skintag-{{$skin->uuid}}"
                      onload="showTag(this)"
                      class="lazy">
                  </div>
                @endforeach
            </div>

            @if(count($skin->covers) > 1)
              <div class="swiper-pagination"></div>
              {{-- <div class="slide-button-prev absolute top-0 left-0 bottom-0 ml-2 flex items-center" style="z-index: 100000">
                <div class="p-3 rounded-full relative {{ theme('bg-white') }}">
                  <i class="fas fa-chevron-left fa-lg absolute left-0 right-0 bottom-0 top-0 flex items-center justify-center {{ theme('text-black') }}" style="margin-left: -3px;"></i>
                </div>
              </div>

              <div class="slide-button-next absolute top-0 right-0 bottom-0 mr-2 flex items-center" style="z-index: 100000">
                <div class="p-3 rounded-full relative {{ theme('bg-white') }}">
                  <i class="fas fa-chevron-right fa-lg absolute left-0 right-0 bottom-0 top-0 flex items-center justify-center {{ theme('text-black') }}" style="margin-right: -3px;"></i>
                </div>
              </div> --}}
            @endif
        
        </div>
        <div class="flex justify-between align-center p-3">
          <div>
            <div class="text-2xl font-bold mr-2">{{ $skin->name }}</div>
            @if (!$skin->amount == 0)
                @if($skin->onSale)
                  <span class="mr-1 font-bold">${{ $skin->salePrice }}</span>
                  <span class="line-through" style="opacity: 0.5">${{ $skin->price }}</span>
                @else
                  <span class="font-bold">${{ $skin->price }}</span>
                @endif
            @endif
          </div>
            
            
          
          <div class="flex items-center">
            <button class='flex mr-3 items-center font-bold rounded-full pointer-events-auto shadow text-sm -mt-1 {{ theme("bg-white", "text-black") }}' onclick="showDetail('{{ $skin->description }}')"><i class="fas fa-info-circle fa-2x -mb-1"></i></button>
            @auth
              @if(Auth::user()->skins->contains($skin->id) || $skin->amount == 0)
                <a href="{{ URL::temporarySignedRoute(
                  'skin', now()->addMinutes(10), ['uuid' => $skin->uuid]
                  ) }}" download class='ppbtn flex items-center font-bold rounded-full pointer-events-auto shadow text-sm px-5 py-1 text-white-light {{ theme("bg-green") }}'>Download</a>
              @else
                <button class='ppbtn flex items-center font-bold rounded-full pointer-events-auto shadow text-sm px-5 py-1 text-white-light {{ theme("bg-blue") }}' data-ppuuid="{{$skin->uuid}}" data-price="{{ $skin->amount }}" onclick="showPP(this)">
                  <span class="mr-1">Buy</span>
                </button>
              @endif
            @else
                <a href="/login" class='flex items-center font-bold rounded-full pointer-events-auto shadow text-sm px-5 py-1 text-white-light {{ theme("bg-blue") }}'>Login</a>
            @endauth
          </div>
        </div>
        
      </div>
    @endforeach

    <div class="mt-4">
      Contact us on <a class="underline text-blue-dark" href="https://twitter.com/ioshavencom">Twitter</a> for more skins.
    </div>


    <div class="fixed items-center justify-center top-0 left-0 right-0 bottom-0 overflow-scroll scrolling-touch hidden" style="z-index: 10000; background-color: rgba(0,0,0,0.8)" id="paypal-modal" onclick="showPP()">
      <div class="p-3 {{ theme('bg-white') }} rounded-lg overflow-scroll scrolling-touch" style="max-width: 680px; width: 100%; max-height: 90vh;">
        <div id="paypal-button-container"></div>
      </div>
    </div>

    <div class="fixed items-center justify-center top-0 left-0 right-0 bottom-0 overflow-scroll scrolling-touch hidden" style="z-index: 10000; background-color: rgba(0,0,0,0.8)" id="detail-modal" onclick="showDetail()">
      <div class="p-3 {{ theme('bg-white') }} rounded-lg overflow-scroll scrolling-touch" style="max-width: 680px; width: 100%; max-height: 90vh;">
        <div id="detail-paragraph"></div>
      </div>
    </div>
    




  </div>
</section>

@endsection

@section('footer')
<script src="https://www.paypal.com/sdk/js?client-id={{ config('paypal.client_id') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.20.0/axios.min.js" integrity="sha512-quHCp3WbBNkwLfYUMd+KwBAgpVukJu5MncuQaWXgCrfgcxCJAq/fo+oqrRKOj+UKEmyMCG3tb8RB63W+EmrOBg==" crossorigin="anonymous"></script>

<script>
  window.trypp = function () {
    axios.post('/paypal-log', {uuid:window.ppuuid}).then(res => {
      console.log(res)
    })
  };
  (function () {
    Array.from(document.querySelectorAll('.ppbtn')).forEach(function (el) {
      el.ppuuid = el.getAttribute('data-ppuuid');
      el.price = el.getAttribute('data-price');
      el.removeAttribute('data-ppuuid');
      el.removeAttribute('data-price');
    })
  })();
  function showPP(el) {
    if (el) {
      window.ppuuid = el.ppuuid;
      window.price = el.price;
    }
    document.getElementById('paypal-modal').classList.toggle('hidden');
    document.getElementById('paypal-modal').classList.toggle('flex');
  }
  function showDetail(detail) {
    document.getElementById('detail-paragraph').innerHTML = detail
    document.getElementById('detail-modal').classList.toggle('hidden');
    document.getElementById('detail-modal').classList.toggle('flex');
  }

  function showTag(el) {
    // console.log(el)
    document.getElementById(el.getAttribute('data-tag-id')).classList.remove('hidden')
  }

  var mySwiper = new Swiper('.swiper-container', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,

    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
    },

    // Navigation arrows
    // navigation: {
    //   nextEl: '.slide-button-next',
    //   prevEl: '.slide-button-prev',
    // },
  })

  paypal.Buttons({
    createOrder: function(data, actions) {
      // This function sets up the details of the transaction, including the amount and line item details.
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: window.price.toString() + '.00'
          }
        }]
      });
    },
    onApprove: function(data, actions) {
      // axios.post('/paypal-log', {details:details, uuid:window.ppuuid}).then(res => {
      //   console.log(res)
      // })
      // This function captures the funds from the transaction.
      return actions.order.capture().then(function(details) {
        // This function shows a transaction success message to your buyer.
        // alert('Transaction completed by ' + details.payer.name.given_name);
        // console.log(details)
        document.getElementById('paypal-modal').classList.add('hidden');
        document.getElementById('paypal-modal').classList.remove('flex');
        return axios.post('/paypal-log', {details:details, uuid:window.ppuuid})
      }).then(function (res) {
        location.reload();
      });
    }
  }).render('#paypal-button-container');
  //This function displays Smart Payment Buttons on your web page.
</script>
@endsection