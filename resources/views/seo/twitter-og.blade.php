@php 
    $pagename = $title ?? session("current_tab") ?? "IOS Haven";
    $text = config('app.name');
    $titletext = $pagename ? $text . " - $pagename" : $text;
@endphp

<meta property="og:locale" content="en_US">
<meta property="og:title" content="{{ $title ?? session("current_tab") ?? "iOS Haven" }}">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ $url ?? url()->current() }}">
<meta property="og:site_name" content="iOS Haven">
<meta property="article:modified_time" content="{{ now()->tz('UTC') }}">
<meta property="og:description" content="{{ $description ?? "Search for the best hacked iOS Apps." }}">
<meta property="og:image" content="https://storage.ihvn.dev/icons/apps/ioshaven.jpg">
<meta property="twitter:site:id" content="715729557769166848">
<meta property="twitter:card" content="summary">
<meta property="twitter:label1" content="Est. reading time">
<meta property="twitter:data1" content="1 minute">