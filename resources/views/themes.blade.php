<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap & Google Fonts CDN, Favicon Link -->
	<link rel="stylesheet" type="text/css" href="https://unpkg.com/swiper/swiper-bundle.min.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
	
	
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="/css/onepage-scroll.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/media.css">

	<title>iOS Skin Themes</title>
	
	<script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@17.1.2/dist/lazyload.min.js"></script>
	
	

  </head>
  <body>
  	<div class="main">
		  <!-- First Theme Section Starts Here -->
		@foreach($skins as $skin)
			@php
				$s = strtolower(implode("",explode(" ", $skin->name)));
				$bg_lg = "https://storage.ihvn.dev/theme-backgrounds/".$s."_bg_lg.webp";
				$bg_sm = "https://storage.ihvn.dev/theme-backgrounds/".$s."_bg_sm.webp";
				$phone_lg = "https://storage.ihvn.dev/theme-backgrounds/".$s."_phone_lg.webp";
				$phone_sm = "https://storage.ihvn.dev/theme-backgrounds/".$s."_phone_sm.webp";
			@endphp
			<section class="lazy img-section" id="{{$skin->uuid}}" data-bg="{{ $bg_lg }}" style="background-image: url('{{ $bg_sm }}'); height: 100vh;">
				<div class="product-details">
					<div class="col-md-6 product-text">
						<div>
							<h2 class="product-title">{{ $skin->name }}</h2>
							<p class="product-description">{{ $skin->description }}</p>
						</div>
						<div class="show-md" style="margin-top: 1rem;">
							@component('components.skinpricing', ['skin' => $skin])@endcomponent
						</div>
					</div>  
					<div class="col-md-6 product-image-wrapper" style="position: relative">
						@component('components.swiper', [
							"images" => $skin->covers,
							"phone_lg" => $phone_lg,
							"phone_sm" => $phone_sm
						])@endcomponent
					</div>
					<div class="col-md-6 product-text hide-md">
						@component('components.skinpricing', ['skin' => $skin])@endcomponent
					</div>
				</div>
			</section>
		  @endforeach
		  <!-- First Theme Section Ends Here -->
		  
  		
	  </div>
	  
	  <div class="paypal-modal hidden" id="paypal-modal" onclick="showPP()">
		<div class="paypal-button-wrapper">
		  <div id="paypal-button-container"></div>
		</div>
	  </div>



    <!-- jQuery -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    {{-- <script src="https://kit.fontawesome.com/948955ccc5.js" crossorigin="anonymous"></script> --}}
	<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
	<script src="js/jquery.onepage-scroll.js"></script>
	<script src="js/script.js"></script>
	<script src="https://www.paypal.com/sdk/js?client-id={{ config('paypal.client_id') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.20.0/axios.min.js" integrity="sha512-quHCp3WbBNkwLfYUMd+KwBAgpVukJu5MncuQaWXgCrfgcxCJAq/fo+oqrRKOj+UKEmyMCG3tb8RB63W+EmrOBg==" crossorigin="anonymous"></script>

<script>
  window.trypp = function () {
    axios.post('/paypal-log', {uuid:window.ppuuid}).then(res => {
      console.log(res)
    })
  };
  (function () {
    Array.from(document.querySelectorAll('.purchase-btn')).forEach(function (el) {
      el.ppuuid = el.getAttribute('data-ppuuid');
      el.price = el.getAttribute('data-price');
      el.removeAttribute('data-ppuuid');
      el.removeAttribute('data-price');
    })
  })();
  function showPP(el) {
	console.log(el)
    if (el) {
      window.ppuuid = el.ppuuid;
	  window.price = el.price;
	  console.log(window.price, window.ppuuid)
    }
    document.getElementById('paypal-modal').classList.toggle('hidden');
    document.getElementById('paypal-modal').classList.toggle('flex');
  }
//   function showDetail(detail) {
//     document.getElementById('detail-paragraph').innerHTML = detail
//     document.getElementById('detail-modal').classList.toggle('hidden');
//     document.getElementById('detail-modal').classList.toggle('flex');
//   }

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
		  console.log(res)
		  location.href = res.data.download
        // location.reload();
      }).catch(function (err) {
		console.error(err)
		console.error(err.response)
      });
    }
  }).render('#paypal-button-container');
  //This function displays Smart Payment Buttons on your web page.
</script>

	<script>
		$(".main").onepage_scroll({
			sectionContainer: "section",
			easing: "ease",
			animationTime: 700, 
			updateURL: true,
			pagination: false,
			responsiveFallback: 10000, // You can fallback to normal page scroll by defining the width of the browser in which
										// you want the responsive fallback to be triggered. For example, set this to 600 and whenever
										// the browser's width is less than 600, the fallback will kick in.
			loop: false	// You can have the page loop back to the top/bottom when the user navigates at up/down on the first/last page.
		});

		var lazyLoadInstance = new LazyLoad({
			// Your custom settings go here
		});
		lazyLoadInstance.update();

		var mySwiper = new Swiper('.swiper-container', {
			direction: 'horizontal',
			loop: false,
			pagination: {
				el: '.swiper-pagination',
			},
		})
		
	</script>

  </body>
</html>