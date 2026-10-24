@extends('layouts.app')

@section('meta_title', 'Blog — Joseph ALAYE | Développement, IA & Mobile')
@section('meta_description', 'Articles et réflexions de Joseph ALAYE sur le développement web et mobile, l’IA générative, les outils et les retours d’expérience terrain.')
@section('og_title', 'Blog — Joseph ALAYE')
@section('og_description', 'Développement web & mobile, IA, outils et retours d’expérience.')
@section('og_image', asset('images/bg/blog.jpg'))

@section('content')
<section class="section blog-page" id="blog">
  <div class="page-bg" aria-hidden="true">
    <img src="{{ asset('images/bg/blog.jpg') }}" alt="" />
  </div>

  <div class="wrap">
    {{-- Hero --}}
    <div class="blog-hero reveal">
      <p class="eyebrow" style="justify-content:center;color:var(--yellow);"><span class="eyebrow-line"></span> Le carnet</p>
      <h1>Articles &amp; <span>réflexions</span></h1>
      <p class="blog-hero-lead">
        Développement web &amp; mobile, IA, outils et retours de terrain. J’écris ce que j’apprends
        en construisant — sans jargon inutile.
      </p>
      <div class="blog-tags">
        <a href="{{ route('blog', array_filter(['q' => request('q')])) }}"
           class="blog-tag {{ !request('category') || request('category') === 'all' ? 'active' : '' }}">
          <i class="bi bi-grid-fill"></i> Tous <span>{{ $categories->sum('total') }}</span>
        </a>
        @foreach($categories as $category)
          @php $slug = $category->category; @endphp
          <a href="{{ route('blog', array_filter(['q' => request('q'), 'category' => $slug])) }}"
             class="blog-tag {{ request('category') === $slug ? 'active' : '' }}">
            <i class="bi bi-tag-fill"></i>
            {{ \App\Models\Post::CATEGORIES[$slug] ?? ucfirst($slug) }}
            <span>{{ $category->total }}</span>
          </a>
        @endforeach
      </div>
    </div>

    {{-- Recherche --}}
    <form class="blog-search reveal" action="{{ route('blog') }}" method="GET">
      <i class="bi bi-search"></i>
      @if(request('category'))
        <input type="hidden" name="category" value="{{ request('category') }}" />
      @endif
      <input type="text" name="q" value="{{ request('q') }}" placeholder="Rechercher un article, une techno, un sujet..." aria-label="Rechercher un article" />
      <button class="btn btn-main" type="submit">Rechercher</button>
    </form>
    @if(request('q'))
      <p class="blog-search-info">
        Résultats pour « {{ request('q') }} » — <a href="{{ route('blog') }}">réinitialiser</a>
      </p>
    @endif

    <div class="blog-layout">
      {{-- Articles --}}
      <div class="blog-main">
        <div class="blog-grid">
        @forelse($posts as $post)
          <article class="blog-card glass reveal">
            <figure class="blog-card-img">
              @if($post->image)
                <img src="{{ asset('images/' . $post->image) }}" alt="{{ $post->title }}" loading="lazy" />
              @else
                <div class="blog-card-placeholder">
                  <i class="bi bi-journal-richtext"></i>
                </div>
              @endif
              <span class="blog-card-cat">{{ $post->categoryLabel() }}</span>
            </figure>
            <div class="blog-card-body">
              <small class="blog-card-date">
                <i class="bi bi-calendar3"></i> {{ $post->created_at->format('d M Y') }}
              </small>
              <h3>{{ $post->title }}</h3>
              <p>{{ $post->excerpt }}</p>
              <a class="btn btn-outline" href="{{ route('blog.show', $post->slug) }}" style="padding:6px 14px;font-size:.82rem;">
                Lire l’article <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </article>
        @empty
          <div class="blog-empty glass reveal">
            <div class="blog-empty-art">
              <i class="bi bi-journal-richtext"></i>
            </div>
            <h3>Les premiers articles arrivent</h3>
            <p>
              Je prépare des contenus concrets sur Laravel, React, l’IA appliquée et mes projets.
              Abonnez-vous pour être prévenu dès la publication.
            </p>
            <div class="btn-row" style="justify-content:center;">
              <a href="{{ route('projects') }}" class="btn btn-outline"><i class="bi bi-grid-fill"></i> Voir mes projets</a>
              <a href="{{ route('contact') }}" class="btn btn-main"><i class="bi bi-send-fill"></i> Me contacter</a>
            </div>
          </div>
        @endforelse
        </div>

        @if($posts->hasPages())
          <div class="blog-pagination">
            {{ $posts->links('partials.pagination') }}
          </div>
        @endif
      </div>

      {{-- Colonne latérale --}}
      <aside class="blog-sidebar reveal">
        <figure class="blog-side-visual">
          <img src="{{ asset('images/bg/blog-side.jpg') }}"
               alt="Espace de travail de développeur" loading="lazy" />
          <figcaption>Apprendre en construisant, chaque jour.</figcaption>
        </figure>

        <div class="blog-subscribe glass">
          <div class="blog-sub-icon">
            <i class="bi bi-envelope-paper-fill"></i>
          </div>
          <h3>Restez informé</h3>
          <p>Recevez les nouveaux articles directement dans votre boîte mail.</p>

          @if(session('subscribed'))
            <div class="blog-sub-success">
              <i class="bi bi-check-circle-fill"></i> Merci ! Vous êtes abonné(e).
            </div>
          @endif

          <form class="blog-sub-form" action="{{ route('blog.subscribe') }}" method="POST">
            @csrf
            <input type="email" name="email" placeholder="votre@email.com" required aria-label="Votre e-mail" />
            <input type="text" name="name" placeholder="Votre nom (optionnel)" aria-label="Votre nom" />
            <button class="btn btn-main" type="submit" style="width:100%;">
              <i class="bi bi-bell-fill"></i> S’abonner
            </button>
          </form>
        </div>

        <div class="blog-info glass">
          <h4><i class="bi bi-info-circle"></i> À propos du blog</h4>
          <p>Je partage ici mon expérience en développement web/mobile, des tutoriels, des retours d’expérience sur des projets concrets et mes réflexions sur l’IA et les nouvelles technologies.</p>
        </div>
      </aside>
    </div>

    <div class="blog-back reveal">
      <a href="{{ route('home') }}" class="btn btn-outline" style="font-size:.85rem;padding:8px 16px;">
        <i class="bi bi-house-door"></i> Retour à l’accueil
      </a>
    </div>
  </div>
</section>

<style>
  .blog-page{overflow:hidden}
  .blog-hero{text-align:center;max-width:780px;margin:0 auto 34px;padding-top:24px}
  .blog-hero h1{color:var(--white);font-size:clamp(2.4rem,6vw,4rem);letter-spacing:-.04em;margin-bottom:14px}
  .blog-hero h1 span{color:var(--yellow)}
  .blog-hero-lead{color:var(--muted);font-size:1.05rem;line-height:1.8;margin:0 auto 22px;max-width:640px}
  .blog-tags{display:flex;flex-wrap:wrap;gap:10px;justify-content:center}
  .blog-tag{
    display:inline-flex;align-items:center;gap:7px;padding:8px 14px;border-radius:100px;
    border:1px solid var(--line);background:rgba(255,255,255,.04);color:var(--text);
    font-size:.8rem;transition:border-color .3s,color .3s,background .3s;
  }
  .blog-tag span{font-family:var(--font-mono);font-size:.68rem;color:var(--muted)}
  .blog-tag i{color:var(--accent)}
  .blog-tag:hover{border-color:rgba(232,197,71,.5);color:var(--yellow)}
  .blog-tag.active{background:var(--yellow);border-color:var(--yellow);color:#000;font-weight:600}
  .blog-tag.active i,.blog-tag.active span{color:#000}

  .blog-search{display:flex;align-items:center;gap:10px;max-width:640px;margin:0 auto 12px;padding:8px 8px 8px 18px;border-radius:100px;border:1px solid var(--line);background:rgba(255,255,255,.04)}
  .blog-search>i{color:var(--muted);font-size:1rem}
  .blog-search input{flex:1;background:none;border:none;outline:none;color:var(--text);font-size:.92rem;font-family:var(--font-body);padding:8px 0;min-width:0}
  .blog-search input::placeholder{color:var(--muted)}
  .blog-search .btn{padding:10px 22px;border-radius:100px}
  .blog-search-info{text-align:center;color:var(--muted);font-size:.85rem;margin-bottom:26px}
  .blog-search-info a{color:var(--yellow)}

  .blog-layout{display:grid;grid-template-columns:1fr 320px;gap:32px;align-items:start;margin-top:34px}
  .blog-main{min-width:0}
  .blog-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:20px}

  .blog-pagination{margin-top:30px}
  .pager{display:flex;justify-content:center;align-items:center;gap:8px;flex-wrap:wrap}
  .pager-btn{
    min-width:40px;height:40px;padding:0 12px;border-radius:12px;
    border:1px solid var(--line);background:rgba(255,255,255,.03);color:var(--text);
    display:inline-flex;align-items:center;justify-content:center;
    font-size:.88rem;transition:border-color .3s,color .3s,background .3s;
  }
  .pager-btn:hover{border-color:var(--accent);color:var(--accent)}
  .pager-btn.active{background:var(--yellow);color:#000;border-color:var(--yellow);font-weight:700}
  .pager-btn.disabled{opacity:.35;pointer-events:none}
  .pager-dots{color:var(--muted);padding:0 4px}
  .blog-card{border-radius:16px;overflow:hidden;transition:all .3s}
  .blog-card:hover{transform:translateY(-4px);border-color:var(--yellow)}
  .blog-card-img{height:180px;overflow:hidden;position:relative;margin:0}
  .blog-card-img img{width:100%;height:100%;object-fit:cover;transition:transform .5s}
  .blog-card:hover .blog-card-img img{transform:scale(1.05)}
  .blog-card-placeholder{
    width:100%;height:100%;display:grid;place-items:center;
    background:linear-gradient(135deg,rgba(37,99,235,.15),rgba(6,182,212,.1));
  }
  .blog-card-placeholder i{font-size:3rem;color:var(--accent)}
  .blog-card-cat{
    position:absolute;top:12px;left:12px;
    padding:4px 12px;border-radius:100px;font-size:.72rem;font-weight:600;
    background:var(--yellow);color:var(--black);text-transform:uppercase;letter-spacing:.05em;
  }
  .blog-card-body{padding:20px;display:flex;flex-direction:column;gap:8px}
  .blog-card-date{font-size:.75rem;color:var(--muted);display:flex;align-items:center;gap:4px}
  .blog-card-body h3{font-size:1.1rem;color:var(--white);margin:0}
  .blog-card-body p{font-size:.88rem;color:var(--muted);line-height:1.5;margin:0}

  .blog-empty{
    grid-column:1/-1;text-align:center;padding:52px 28px;border-radius:20px;
    display:flex;flex-direction:column;align-items:center;gap:8px;
  }
  .blog-empty-art{
    width:72px;height:72px;border-radius:20px;display:grid;place-items:center;
    font-size:1.9rem;color:var(--black);margin-bottom:8px;
    background:linear-gradient(135deg,var(--yellow),#f59e0b);
    box-shadow:0 12px 30px rgba(232,197,71,.25);
  }
  .blog-empty h3{color:var(--white);font-size:1.3rem;margin:0}
  .blog-empty p{color:var(--muted);font-size:.92rem;line-height:1.7;max-width:520px;margin:0 0 10px}

  .blog-sidebar{display:flex;flex-direction:column;gap:20px;position:sticky;top:100px}
  .blog-side-visual{position:relative;border-radius:18px;overflow:hidden;border:1px solid var(--line);margin:0}
  .blog-side-visual img{width:100%;height:170px;object-fit:cover;display:block}
  .blog-side-visual::after{content:'';position:absolute;inset:0;background:linear-gradient(to top,rgba(0,0,0,.78),transparent 62%);pointer-events:none}
  .blog-side-visual figcaption{position:absolute;left:14px;right:14px;bottom:12px;z-index:1;color:#fff;font-size:.8rem;font-weight:500}

  .blog-subscribe{padding:28px;text-align:center;display:flex;flex-direction:column;align-items:center;gap:12px}
  .blog-sub-icon{width:56px;height:56px;border-radius:50%;background:linear-gradient(135deg,var(--yellow),#f59e0b);display:grid;place-items:center;font-size:1.4rem;color:var(--black);box-shadow:0 8px 24px rgba(255,215,0,.3)}
  .blog-subscribe h3{font-size:1.1rem;color:var(--white)}
  .blog-subscribe p{font-size:.85rem;color:var(--muted);margin:0}
  .blog-sub-success{
    padding:10px 16px;border-radius:10px;font-size:.85rem;font-weight:500;
    background:rgba(16,185,129,.1);border:1px solid rgba(16,185,129,.3);color:var(--ok);
    width:100%;
  }
  .blog-sub-form{display:flex;flex-direction:column;gap:10px;width:100%}
  .blog-sub-form input{
    padding:10px 14px;border-radius:10px;border:1px solid var(--line);
    background:rgba(255,255,255,.04);color:var(--text);font-size:.88rem;
    font-family:var(--font-body);outline:none;transition:border-color .3s;
  }
  .blog-sub-form input:focus{border-color:var(--accent)}
  .blog-info{padding:20px}
  .blog-info h4{font-size:.95rem;color:var(--white);margin-bottom:8px;display:flex;align-items:center;gap:6px}
  .blog-info p{font-size:.82rem;color:var(--muted);line-height:1.6;margin:0}

  .blog-back{text-align:center;margin-top:36px}

  body.light .blog-card{background:rgba(255,255,255,.7);border-color:rgba(0,0,0,.08)}
  body.light .blog-card:hover{border-color:var(--yellow)}
  body.light .blog-card-body h3{color:var(--black)}
  body.light .blog-card-body p{color:#475569}
  body.light .blog-card-cat{background:var(--yellow);color:var(--black)}
  body.light .blog-empty h3{color:var(--black)}
  body.light .blog-empty p{color:#475569}
  body.light .blog-tag{background:rgba(255,255,255,.6);border-color:rgba(0,0,0,.1)}
  body.light .pager-btn{background:rgba(255,255,255,.7);border-color:rgba(0,0,0,.1)}
  body.light .pager-btn.active{background:var(--yellow);border-color:var(--yellow);color:#000}
  body.light .blog-search{background:rgba(255,255,255,.6);border-color:rgba(0,0,0,.1)}
  body.light .blog-subscribe{background:rgba(255,255,255,.7);border-color:rgba(0,0,0,.08)}
  body.light .blog-subscribe h3{color:var(--black)}
  body.light .blog-subscribe p{color:#475569}
  body.light .blog-sub-form input{background:rgba(255,255,255,.6);border-color:rgba(0,0,0,.1);color:var(--text)}
  body.light .blog-info{background:rgba(255,255,255,.7);border-color:rgba(0,0,0,.08)}
  body.light .blog-info h4{color:var(--black)}
  body.light .blog-info p{color:#475569}

  @media(max-width:900px){
    .blog-layout{grid-template-columns:1fr}
    .blog-grid{grid-template-columns:1fr}
    .blog-sidebar{position:static}
  }
  @media(max-width:560px){
    .blog-search{padding:6px 6px 6px 14px;flex-wrap:wrap}
    .blog-search .btn{padding:9px 16px}
  }
</style>
@endsection
