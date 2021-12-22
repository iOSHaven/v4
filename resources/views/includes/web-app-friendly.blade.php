{{-- WEB APPLICATION FRIENDLY --}}
<meta name="application-name" content="{{ config('app.name') }}">
<meta name="theme-color" content="{{ theme() === 'light' ? '#ffffff' : '#000000' }}">
<meta name="apple-mobile-web-app-title" content="{{ config('app.name') }}">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="{{ theme() === 'light' ? 'default' : 'black' }}" id="status-bar-style">
<link rel="manifest" href="/manifest-{{ theme() }}.json">