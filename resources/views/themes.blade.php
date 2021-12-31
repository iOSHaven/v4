<!DOCTYPE html>
<html lang="english">
  <head>
	    {{-- Google Tag Manager --}}
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-PVKPPPZ');</script>
	{{-- End Google Tag Manager --}}

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap & Google Fonts CDN, Favicon Link -->
	<link rel="stylesheet" type="text/css" href="https://unpkg.com/swiper/swiper-bundle.min.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
  
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
	
	
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="/css/onepage-scroll.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/media.css">

	<title>iOS Haven Themes</title>

	<script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@17.1.2/dist/lazyload.min.js"></script>
	
	

  </head>
  <body>
  	<div class="main">
		  <!-- First Theme Section Starts Here -->

		<section style="height: 100vh; max-height: 100%; background-color: #020202; text-align: center; padding: 2rem; display: flex; flex-direction: column; justify-content: space-between;">
			<div style="flex-grow: 1">
				<h1 style="font-weight: bold">Themes</h1>
				<p style="margin-top: -1rem">By iOS Haven</p>
				<br>
				<h5>A vast collection of free and premium iOS 14 icons</h5>
				<br>
				<a href="https://www.producthunt.com/posts/ios-haven-themes?utm_source=badge-featured&utm_medium=badge&utm_souce=badge-ios-haven-themes" target="_blank"><img src="https://api.producthunt.com/widgets/embed-image/v1/featured.svg?post_id=270477&theme=dark" alt="iOS Haven Themes - iOS 14 themes in one place | Product Hunt" style="width: 250px; height: 54px;" width="250" height="54" /></a>
				<br>
				<div style="margin-top: 3rem; color: black;">
					<a href="/" style="padding: 0.25rem 1rem; border-radius: 10rem; background-color: #fff; color: black;">
						<i class="fas fa-home" style="margin-right: 0.5rem"></i>
						Main site
					  </a>
				</div>
				
			
			</div>
			<div class="animate__animated animate__bounce animate__delay-1s animate__repeat-3">
				<i class="fal fa-arrow-down fa-2x"></i>
			</div>
		</section>

		@foreach($skins as $skin)
			@php
				$s = strtolower(implode("",explode(" ", $skin->name)));
				$bg_lg = "https://storage.ihvn.dev/theme-backgrounds/".$s."_bg_lg.webp";
				$bg_sm = "https://storage.ihvn.dev/theme-backgrounds/".$s."_bg_sm.webp";
				$phone_lg = "https://storage.ihvn.dev/theme-backgrounds/".$s."_phone_lg.webp";
				$phone_sm = "https://storage.ihvn.dev/theme-backgrounds/".$s."_phone_sm.webp";
			@endphp
			<section class="lazy img-section" id="{{$s}}" data-bg="{{ $bg_lg }}" style="background-image: url('{{ $bg_sm }}'); height: 100%;">
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
		function executeLazyFunction(element) {
			var lazyFunctionName = element.getAttribute(
					"data-lazy-function"
			);
			var lazyFunction = window[lazyFunctionName];
			if (!lazyFunction) return;
			lazyFunction(element);
		}
		var lazyLoadInstance = new LazyLoad({
			unobserve_entered: true, // <- Avoid executing the function multiple times
			callback_enter: executeLazyFunction // Assigning the function defined above
		});
		lazyLoadInstance.update();
	</script>

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

		var hashtable = {
			@foreach($skins as $skin)
				@php
					$s = strtolower(implode("",explode(" ", $skin->name)));
				@endphp
		'#{{ $s }}': {{$loop->index + 1}},
			@endforeach
		}

		function goToHash(hash) {
			console.log(hash, hashtable[hash], hashtable[hash] || 1)
			$(".main").moveTo(hashtable[hash] || 1)
		}

		function afterMove(index) {
			var hash = Array.from(document.querySelectorAll('.img-section'))[index-1].getAttribute('id')
			history.pushState({index: index}, hash, '#' + hash)
		}

		$(".main").onepage_scroll({
			sectionContainer: "section",
			easing: "ease",
			animationTime: 400, 
			updateURL: true,
			pagination: false,
			// afterMove: afterMove,
			responsiveFallback: 0, // You can fallback to normal page scroll by defining the width of the browser in which
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

		// window.addEventListener('hashchange', function () {
		// 	goToHash(location.hash)
		// })
		// $(document).ready(function (){
		// 	goToHash(location.hash)
		// })
		
		// afterMove();
		
	</script>


{{-- Google Tag Manager (noscript) --}}
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PVKPPPZ"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  {{-- End Google Tag Manager (noscript) --}}
  {{-- ====END INSIDE BODY==== --}}
  </body>
</html>