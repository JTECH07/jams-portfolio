<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
  <channel>
    <title>Blog — Joseph ALAYE</title>
    <link>{{ url('/blog') }}</link>
    <description>Articles sur le développement web, l'IA et les technologies.</description>
    <language>fr</language>
    <lastBuildDate>{{ now()->toRfc2822String() }}</lastBuildDate>
    <atom:link href="{{ url('/feed') }}" rel="self" type="application/rss+xml" />
    @foreach($posts as $post)
    <item>
      <title><![CDATA[{{ $post->title }}]]></title>
      <link>{{ url('/blog/' . $post->slug) }}</link>
      <guid>{{ url('/blog/' . $post->slug) }}</guid>
      <pubDate>{{ $post->created_at->toRfc2822String() }}</pubDate>
      <description><![CDATA[{{ $post->excerpt }}]]></description>
    </item>
    @endforeach
  </channel>
</rss>
