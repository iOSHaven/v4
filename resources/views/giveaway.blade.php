<!DOCTYPE html>
<html lang="en">

<head>

  {{-- Google Tag Manager --}}
  <script>
    (function(w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src =
        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-PVKPPPZ');
  </script>
  {{-- End Google Tag Manager --}}
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>iOS Haven Giveaway</title>

  <meta property="og:url" content="https://gleam.io/kWIW3/ios-haven-holiday-giveaway" />
  <meta property="og:title" content="Apple Airpods Pro">
  <meta property="twitter:card" content="summary" />
  <meta property="fb:app_id" content="152351391599356" />
  <meta property="og:description" content="We're giving away 3 AirPods Pro">

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&family=Roboto:wght@400;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/css/giveaway.css">

  {{-- MOBILE FRIENDLY --}}
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, viewport-fit=cover">

  {{-- WEB APPLICATION FRIENDLY --}}
  <meta name="application-name" content="{{ config('app.name') }}">
  <meta name="theme-color" content="{{ theme() === 'light' ? '#ffffff' : '#000000' }}">
  <meta name="apple-mobile-web-app-title" content="{{ config('app.name') }}">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="{{ theme() === 'light' ? 'default' : 'black' }}" id="status-bar-style">
  <link rel="manifest" href="/manifest-{{ theme() }}.json">

  {{-- FAVICONS --}}
  <link rel="apple-touch-icon" href="/favicons/apple-touch-icon.png?v=QEMYzE9pb35555" sizes="180x180">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicons/favicon-32x32.png?v=QEMYzE9pb35555">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicons/favicon-16x16.png?v=QEMYzE9pb35555">
  <link rel="manifest" href="/favicons/site.webmanifest?v=QEMYzE9pb35555">
  <link rel="mask-icon" href="/favicons/safari-pinned-tab.svg?v=QEMYzE9pb35555" color="#e81e1e">
  <link rel="shortcut icon" href="/favicons/favicon.ico?v=QEMYzE9pb35555">

  {{-- GOOGLE TAG --}}
  {{-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-106909262-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-106909262-1');
  </script> --}}
</head>

<body>

  <div id="particles-js"></div>

  <div class="wrapper">
    <!-- <h1>iOS Haven Giveaway</h1>
    <p>Enter for a chance to win new AirPods Pro!</p> -->

    <p>Sorry there are no giveaways at this time.</p>

    <a href="/apps">Main Site</a>

    @include('ads.social-bar')


    <!-- <a class="e-widget no-button" href="https://gleam.io/kWIW3/ios-haven-holiday-giveaway" rel="nofollow">iOS Haven Holiday Giveaway</a> -->
    <script type="text/javascript" src="https://widget.gleamjs.io/e.js" async="true"></script>
  </div>

  <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
  <script src="/js/giveaway.js"></script>
</body>

</html>