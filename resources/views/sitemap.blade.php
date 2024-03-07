<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach($languages as $language)
    <url>
        <loc>{{ LaravelLocalization::getLocalizedURL($language,route('home') )}}</loc>
        <lastmod>{{ $info->updated_at->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc>{{ LaravelLocalization::getLocalizedURL($language,route('about') )}}</loc>
        <lastmod>{{ $about->updated_at->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ LaravelLocalization::getLocalizedURL($language,route('contact') )}}</loc>
        <lastmod>{{ $contact->updated_at->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ LaravelLocalization::getLocalizedURL($language,route('services') )}}</loc>
        <lastmod>{{ $info->updated_at->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ LaravelLocalization::getLocalizedURL($language,route('blogs') )}}</loc>
        <lastmod>{{ $info->updated_at->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    @foreach ($services as $service)
    <url>
        <loc>{{ LaravelLocalization::getLocalizedURL($language,route('service', $service->slug ) )}}</loc>
        <lastmod>{{ $service->updated_at->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.9</priority>
    </url>
    @endforeach
    @foreach ($works as $work)
    <url>
        <loc>{{ LaravelLocalization::getLocalizedURL($language,route('work',$work->slug ) )}}</loc>
        <lastmod>{{ $work->updated_at->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach
    @foreach ($blogs as $blog)
    <url>
        <loc>{{ LaravelLocalization::getLocalizedURL($language,route('blog',$blog->slug ) )}}</loc>
        <lastmod>{{ $blog->updated_at->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach
    @endforeach
</urlset>
