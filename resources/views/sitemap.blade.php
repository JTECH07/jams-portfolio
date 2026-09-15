<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <url>
    <loc>{{ url('/') }}</loc>
    <changefreq>weekly</changefreq>
    <priority>1.0</priority>
  </url>
  <url>
    <loc>{{ url('/profil') }}</loc>
    <changefreq>monthly</changefreq>
    <priority>0.8</priority>
  </url>
  <url>
    <loc>{{ url('/competences') }}</loc>
    <changefreq>monthly</changefreq>
    <priority>0.8</priority>
  </url>
  <url>
    <loc>{{ url('/services') }}</loc>
    <changefreq>monthly</changefreq>
    <priority>0.8</priority>
  </url>
  <url>
    <loc>{{ url('/projets') }}</loc>
    <changefreq>weekly</changefreq>
    <priority>0.9</priority>
  </url>
  <url>
    <loc>{{ url('/parcours') }}</loc>
    <changefreq>monthly</changefreq>
    <priority>0.7</priority>
  </url>
  <url>
    <loc>{{ url('/contact') }}</loc>
    <changefreq>monthly</changefreq>
    <priority>0.8</priority>
  </url>
  <url>
    <loc>{{ url('/blog') }}</loc>
    <changefreq>weekly</changefreq>
    <priority>0.9</priority>
  </url>
  @foreach(\App\Models\Post::published()->get() as $post)
  <url>
    <loc>{{ url('/blog/' . $post->slug) }}</loc>
    <lastmod>{{ $post->updated_at->format('Y-m-d') }}</lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.7</priority>
  </url>
  @endforeach
</urlset>
