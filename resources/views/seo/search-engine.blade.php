  {{-- SEARCH ENGINE FRIENDLY --}}
  <meta name="keywords" content="iphone,jailbreak,sideload,hack,crack,signed,download,ipa,free">
  <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
  <meta name="web_author" content="IOS Haven Development Team">
  <meta name="language" content="English">
  <link rel="canonical" href="https://ioshaven.com">


  @php
    $context = $title ?? session("current_tab")
  @endphp
  @if(!empty($context))
    <title>{{ $context }} | {{ config('app.name', 'IOS Haven') }}</title>
  @else
    <title>{{ config('app.name', 'IOS Haven') }} | The Community Driven App Store</title>
  @endif

  <script type="application/ld+json">
[ {
  "@context" : "http://schema.org",
  "@type" : "SoftwareApplication",
  "name" : "Minecraft",
  "image" : "https://storage.ihvn.dev/icons/apps/minecraft.jpg",
  "operatingSystem": "iOS",
  "applicationCategory": "GameApplication",
  "aggregateRating" : {
    "@type" : "AggregateRating",
    "bestRating": "10",
    "worstRating": "1",
    "ratingValue": "9.4",
    "reviewCount": "213"
  },
  "offers": {
    "@type": "Offer",
    "price": "0",
    "priceCurrency": "USD"
  }
},{
  "@context" : "http://schema.org",
  "@type" : "SoftwareApplication",
  "name" : "Cercube 5",
  "image" : "https://ioshaven.com/apps",
  "operatingSystem": "iOS",
  "applicationCategory": "SocialNetworkingApplication",
  "aggregateRating" : {
    "@type" : "AggregateRating",
    "bestRating": "10",
    "worstRating": "1",
    "ratingValue": "8.3",
    "reviewCount": "174"
  },
  "offers": {
    "@type": "Offer",
    "price": "0",
    "priceCurrency": "USD"
  }
}, {
  "@context" : "http://schema.org",
  "@type" : "SoftwareApplication",
  "name" : "iPoGo - Pokémon Go Spoofer",
  "image" : "https://storage.ihvn.dev/icons/b4cf627abe479a71e714566b06df1886192c8a350f4962fc45f79601eacbd243.png",
  "operatingSystem": "iOS",
  "applicationCategory": "GameApplication",
  "aggregateRating" : {
    "@type" : "AggregateRating",
    "bestRating": "10",
    "worstRating": "1",
    "ratingValue": "9.1",
    "reviewCount": "122"
  },
  "offers": {
    "@type": "Offer",
    "price": "0",
    "priceCurrency": "USD"
  }
}, {
  "@context" : "http://schema.org",
  "@type" : "SoftwareApplication",
  "name" : "Unc0ver iOS 11.0 - 14.3 Jailbreak",
  "image" : "https://storage.ihvn.dev/icons/apps/uncover.png",
  "operatingSystem": "iOS",
  "applicationCategory": "UtilitiesApplication",
  "aggregateRating" : {
    "@type" : "AggregateRating",
    "bestRating": "10",
    "worstRating": "1",
    "ratingValue": "8.6",
    "reviewCount": "98"
  },
  "offers": {
    "@type": "Offer",
    "price": "0",
    "priceCurrency": "USD"
  }
} ]
</script>