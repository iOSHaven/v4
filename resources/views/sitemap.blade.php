<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">
    <url>
        <loc>{{ url('/') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>monthly</changefreq>
    </url>
    <url>
        <loc>{{ url('/login') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>monthly</changefreq>
    </url>
    <url>
        <loc>{{ url('/register') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>monthly</changefreq>
    </url>
    <url>
        <loc>{{ url('/password-reset') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>monthly</changefreq>
    </url>
    <url>
        <loc>{{ url('/apps') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>hourly</changefreq>
    </url>
    <url>
        <loc>{{ url('/games') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>hourly</changefreq>
    </url>
    <url>
        <loc>{{ url('/updates') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>hourly</changefreq>
    </url>
    <url>
        <loc>{{ url('/search') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>hourly</changefreq>
    </url>
    <url>
        <loc>{{ url('/contact/index') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>monthly</changefreq>
    </url>
    <url>
        <loc>{{ url('/contact/general') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>monthly</changefreq>
    </url>
    <url>
        <loc>{{ url('/contact/bug') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>monthly</changefreq>
    </url>
    <url>
        <loc>{{ url('/contact/request') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>monthly</changefreq>
    </url>
    <url>
        <loc>{{ url('/jailbreaks') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>monthly</changefreq>
    </url>
    <url>
        <loc>{{ url('/betas') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>monthly</changefreq>
    </url>
    <url>
        <loc>{{ url('/tutorials/Cydia_Impactor.md') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>monthly</changefreq>
    </url>
    <url>
        <loc>{{ url('/aboutUs') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>monthly</changefreq>
    </url>
    <url>
        <loc>{{ url('/credits') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>monthly</changefreq>
    </url>
    @foreach($apps as $app)
        <url>
            <loc>{{ url("/app/$app->uid") }}</loc>
            <lastmod>{{ date('Y-m-d') }}</lastmod>
            <changefreq>hourly</changefreq>
            <priority>0.9</priority>
        </url>
    @endforeach
</urlset>
