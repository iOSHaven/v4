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
    <title>{{ config('app.name', 'IOS Haven') }}</title>
  @endif

  <script type="application/ld+json">
[ {
  "@context" : "http://schema.org",
  "@type" : "SoftwareApplication",
  "name" : "Minecraft",
  "image" : "https://ioshaven.com/apps",
  "aggregateRating" : {
    "@type" : "AggregateRating",
    "bestRating" : "Free game",
    "ratingValue": 9.4,
    "reviewCount": 213
  }
},{
  "@context" : "http://schema.org",
  "@type" : "SoftwareApplication",
  "name" : "Cercube 5",
  "image" : "https://ioshaven.com/apps",
  "aggregateRating" : {
    "@type" : "AggregateRating",
    "bestRating" : "Tweaked YouTube",
    "ratingValue": 8.3,
    "reviewCount": 174
  }
}, {
  "@context" : "http://schema.org",
  "@type" : "SoftwareApplication",
  "name" : "iPoGo - Pokémon Go Spoofer",
  "image" : "https://ioshaven.com/apps",
  "aggregateRating" : {
    "@type" : "AggregateRating",
    "bestRating" : "Pokémon Go Hack",
    "ratingValue": 9.1,
    "reviewCount": 122
  }
}, {
  "@context" : "http://schema.org",
  "@type" : "SoftwareApplication",
  "name" : "Unc0ver iOS 11.0 - 14.3 Jailbreak",
  "image" : "https://ioshaven.com/apps",
  "aggregateRating" : {
    "@type" : "AggregateRating",
    "bestRating" : "Jailbreak App",
    "ratingValue": 8.6,
    "reviewCount": 98
  }
} ]
</script>