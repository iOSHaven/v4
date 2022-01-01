<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">
    <url>
        <loc>{{ url('/') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>1.00</priority>
    </url>
    <url>
        <loc>{{ url('/login') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.51</priority>
    </url>
    <url>
        <loc>{{ url('/register') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.41</priority>
    </url>
    <url>
        <loc>{{ url('/password-reset') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.41</priority>
    </url>
    <url>
        <loc>{{ url('/apps') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>hourly</changefreq>
        <priority>0.81</priority>
    </url>
    <url>
        <loc>{{ url('/games') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>hourly</changefreq>
        <priority>0.71</priority>
    </url>
    <url>
        <loc>{{ url('/updates') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>hourly</changefreq>
        <priority>0.71</priority>
    </url>
    <url>
        <loc>{{ url('/search') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>hourly</changefreq>
        <priority>0.71</priority>
    </url>
    <url>
        <loc>{{ url('/contact/index') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.61</priority>
    </url>
    <url>
        <loc>{{ url('/contact/general') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.41</priority>
    </url>
    <url>
        <loc>{{ url('/contact/bug') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.41</priority>
    </url>
    <url>
        <loc>{{ url('/contact/request') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.41</priority>
    </url>
    <url>
        <loc>{{ url('/jailbreaks') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.61</priority>
    </url>
    <url>
        <loc>{{ url('/betas') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.61</priority>
    </url>
    <url>
        <loc>{{ url('/tutorials/Cydia_Impactor.md') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.61</priority>
    </url>
    <url>
        <loc>{{ url('/aboutUs') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.61</priority>
    </url>
    <url>
        <loc>{{ url('/credits') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.61</priority>
    </url>
    @foreach($apps as $app)
        <url>
            <loc>{{ url("/app/$app->uid") }}</loc>
            <lastmod>{{ date('Y-m-d') }}</lastmod>
            <changefreq>hourly</changefreq>
            <priority>0.41</priority>
        </url>

        @foreach($app->ipas as $ipa)
            <url>
                <loc>{{ url("/download/$ipa->id") }}</loc>
                <lastmod>{{ date('Y-m-d') }}</lastmod>
                <changefreq>hourly</changefreq>
                <priority>0.9</priority>
            </url>
        @endforeach

        @foreach($app->itms as $link)
            <url>
                <loc>{{ url("/install/$link->id") }}</loc>
                <lastmod>{{ date('Y-m-d') }}</lastmod>
                <changefreq>hourly</changefreq>
                <priority>0.9</priority>
            </url>
        @endforeach
    @endforeach

    @foreach($shortcuts as $shortcut)
        <url>
            <loc>{{ $shortcut->perm }}</loc>
            <lastmod>{{ date('Y-m-d') }}</lastmod>
            <changefreq>hourly</changefreq>
            <priority>0.41</priority>
        </url>
    @endforeach

    @foreach($posts as $post)
        <url>
            <loc>{{ $post->url }}</loc>
            <lastmod>{{ date('Y-m-d') }}</lastmod>
            <changefreq>daily</changefreq>
            <priority>1</priority>
        </url>
    @endforeach

    
</urlset>
