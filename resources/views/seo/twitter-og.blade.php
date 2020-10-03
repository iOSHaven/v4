@php 
    $pagename = $title ?? session("current_tab") ?? "IOS Haven";
    $text = config('app.name');
    $titletext = $pagename ? $text . " - $pagename" : $text;
@endphp


<meta property="og:title" content="{{ $titletext }}">
<meta property="og:type" content="article">
<meta property="og:url" content="{{ $url ?? url('/') }}">
<meta property="og:description" content="Search for the best hacked iOS Apps.">
<meta property="og:image" content="https://storage.ihvn.dev/icons/apps/ioshaven.jpg">
<meta property="twitter:site:id" content="715729557769166848">