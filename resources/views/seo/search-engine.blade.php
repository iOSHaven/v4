  {{-- SEARCH ENGINE FRIENDLY --}}
  <meta name="keywords" content="iphone,jailbreak,sideload,hack,crack,signed,download,ipa,free">
  <meta name="robots" content="index, follow">
  <meta name="web_author" content="IOS Haven Development Team">
  <meta name="language" content="English">

  @if(!empty($title))
    <title>{{ $title}} | {{ config('app.name', 'IOS Haven') }}</title>
  @else
    <title>{{ config('app.name', 'IOS Haven') }}</title>
  @endif