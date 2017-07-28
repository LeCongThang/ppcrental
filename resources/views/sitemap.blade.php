<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>https://ppcrentals.com/</loc>
    </url>
    <url>
        <loc>https://ppcrentals.com/for-agent.html</loc>
    </url>
    <url>
        <loc>https://ppcrentals.com/about-ppcrental.html</loc>
    </url>

    <url>
        <loc>https://ppcrentals.com/ppcrental-news.html</loc>
    </url>
    <url>
        <loc>https://ppcrentals.com/contact-to-ppcrental.html</loc>
    </url>
    <url>
        <loc>https://ppcrentals.com/favorite.html</loc>
    </url>

    @foreach($news as $post)
        <url>
            <loc>https://ppcrentals.com/news/{{ $post->id}}-{{ $post->slug }}.html</loc>
        </url>
    @endforeach
    @foreach($p as $i)
        <url>
            <loc>https://ppcrentals.com/property/{{ $i->id}}-{{ $i->slug }}.html</loc>
        </url>
    @endforeach
    @foreach($c as $i)
        <url>
            <loc>https://ppcrentals.com/{{ $i->id}}-{{ $i->slug }}.html</loc>
        </url>
    @endforeach
    @foreach($d as $i)
        <url>
            <loc>https://ppcrentals.com/search/{{ $i->id}}-{{ str_slug($i->name) }}.html</loc>
        </url>
    @endforeach
</urlset>