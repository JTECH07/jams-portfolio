@extends('layouts.app')

@section('content')
<section class="section" style="background:var(--bg);">
  <div class="wrap">
    <a href="{{ route('blog') }}" class="blog-back reveal">
      <i class="bi bi-arrow-left"></i> Retour au blog
    </a>

    <article class="blog-article glass reveal" style="margin-top:24px;">
      @if($post->image)
        <figure class="blog-article-hero">
          <img src="{{ asset('images/' . $post->image) }}" alt="{{ $post->title }}" />
        </figure>
      @endif

      <div class="blog-article-content">
        <div class="blog-article-meta">
          <span class="blog-card-cat" style="position:static;">{{ $post->category }}</span>
          <small><i class="bi bi-calendar3"></i> {{ $post->created_at->format('d M Y') }}</small>
        </div>

        <h1>{{ $post->title }}</h1>

        <div class="blog-article-body">
          {!! $post->body !!}
        </div>
      </div>
    </article>

    {{-- Subscribe CTA --}}
    <div class="blog-article-sub glass reveal" style="margin-top:32px;text-align:center;padding:40px;">
      <h3>Vous avez aimé cet article ?</h3>
      <p style="color:var(--muted);margin-bottom:20px;">Abonnez-vous pour ne manquer aucun prochain article.</p>
      <form class="blog-sub-form" action="{{ route('blog.subscribe') }}" method="POST" style="max-width:400px;margin:0 auto;">
        @csrf
        <input type="email" name="email" placeholder="votre@email.com" required />
        <button class="btn btn-main" type="submit" style="width:100%;">
          <i class="bi bi-bell-fill"></i> S'abonner
        </button>
      </form>
    </div>
  </div>
</section>

<style>
  .blog-back{
    display:inline-flex;align-items:center;gap:6px;
    font-size:.88rem;color:var(--muted);transition:color .3s;
  }
  .blog-back:hover{color:var(--yellow)}
  .blog-article{border-radius:20px;overflow:hidden}
  .blog-article-hero{height:400px;overflow:hidden}
  .blog-article-hero img{width:100%;height:100%;object-fit:cover}
  .blog-article-content{padding:40px}
  .blog-article-meta{display:flex;align-items:center;gap:12px;margin-bottom:16px}
  .blog-article-meta small{font-size:.8rem;color:var(--muted);display:flex;align-items:center;gap:4px}
  .blog-article-content h1{font-size:clamp(1.6rem,3vw,2.4rem);margin-bottom:24px}
  .blog-article-body{color:var(--muted);font-size:1rem;line-height:1.8}
  .blog-article-body h2{color:var(--white);font-size:1.4rem;margin:28px 0 12px}
  .blog-article-body h3{color:var(--white);font-size:1.2rem;margin:24px 0 10px}
  .blog-article-body p{margin-bottom:16px}
  .blog-article-body code{
    background:rgba(37,99,235,.1);padding:2px 8px;border-radius:6px;
    font-family:var(--font-mono);font-size:.88rem;color:var(--accent);
  }
  .blog-article-body pre{
    background:rgba(0,0,0,.3);padding:20px;border-radius:12px;
    overflow-x:auto;margin:16px 0;
  }
  .blog-article-body pre code{background:none;padding:0;color:var(--text)}
  .blog-article-body ul,.blog-article-body ol{margin:12px 0;padding-left:24px}
  .blog-article-body li{margin-bottom:8px}
  .blog-article-body blockquote{
    border-left:3px solid var(--yellow);padding:12px 20px;
    background:rgba(255,215,0,.05);border-radius:0 10px 10px 0;
    margin:16px 0;font-style:italic;
  }
  .blog-article-body img{border-radius:12px;max-width:100%;margin:16px 0}

  body.light .blog-article{background:rgba(255,255,255,.7);border-color:rgba(0,0,0,.08)}
  body.light .blog-article-content h1{color:var(--black)}
  body.light .blog-article-body{color:#475569}
  body.light .blog-article-body h2,.blog-article-body h3{color:var(--black)}
  body.light .blog-article-sub{background:rgba(255,255,255,.7);border-color:rgba(0,0,0,.08)}
  body.light .blog-article-sub h3{color:var(--black)}

  @media(max-width:768px){
    .blog-article-hero{height:240px}
    .blog-article-content{padding:24px}
  }
</style>
@endsection
