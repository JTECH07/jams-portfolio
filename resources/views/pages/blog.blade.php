@extends('layouts.app')

@section('content')
<section class="section" id="blog" style="background:var(--bg);">
  <div class="wrap">
    <div style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:16px;margin-bottom:32px;">
      <div class="section-head reveal" style="margin-bottom:0;">
        <p class="eyebrow" style="color:var(--yellow);">Blog</p>
        <h2>Articles & réflexions</h2>
        <p>Partages sur le développement, l'IA, les outils et mon expérience terrain.</p>
      </div>
      <form class="blog-search" action="{{ route('blog') }}" method="GET" style="display:flex;gap:8px;">
        <input type="text" name="q" value="{{ request('q') }}" placeholder="Rechercher..." style="
          padding:10px 16px;border-radius:100px;border:1px solid var(--line);
          background:rgba(255,255,255,.04);color:var(--text);font-size:.88rem;
          font-family:var(--font-body);outline:none;width:220px;transition:border-color .3s;
        " />
        <button class="btn btn-main" type="submit" style="border-radius:100px;padding:10px 18px;">
          <i class="bi bi-search"></i>
        </button>
      </form>
    </div>

    <div class="blog-layout">
      {{-- Articles grid --}}
      <div class="blog-grid">
        @forelse($posts as $post)
          <article class="blog-card glass reveal">
            <figure class="blog-card-img">
              @if($post->image)
                <img src="{{ asset('images/' . $post->image) }}" alt="{{ $post->title }}" />
              @else
                <div class="blog-card-placeholder">
                  <i class="bi bi-journal-richtext"></i>
                </div>
              @endif
              <span class="blog-card-cat">{{ $post->category }}</span>
            </figure>
            <div class="blog-card-body">
              <small class="blog-card-date">
                <i class="bi bi-calendar3"></i> {{ $post->created_at->format('d M Y') }}
              </small>
              <h3>{{ $post->title }}</h3>
              <p>{{ $post->excerpt }}</p>
              <a class="btn btn-outline" href="{{ route('blog.show', $post->slug) }}" style="padding:6px 14px;font-size:.82rem;">
                Lire <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </article>
        @empty
          <div class="blog-empty glass reveal" style="grid-column:1/-1;text-align:center;padding:60px 20px;">
            <i class="bi bi-journal-plus" style="font-size:3rem;color:var(--yellow);margin-bottom:16px;display:block;"></i>
            <h3 style="margin-bottom:8px;">Bientôt disponible</h3>
            <p style="color:var(--muted);">Les articles arrivent. En attendant, abonnez-vous pour être notifié.</p>
          </div>
        @endforelse
      </div>

      {{-- Sidebar: Subscribe --}}
      <aside class="blog-sidebar reveal">
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
            <input type="email" name="email" placeholder="votre@email.com" required />
            <input type="text" name="name" placeholder="Votre nom (optionnel)" />
            <button class="btn btn-main" type="submit" style="width:100%;">
              <i class="bi bi-bell-fill"></i> S'abonner
            </button>
          </form>
        </div>

        <div class="blog-info glass">
          <h4><i class="bi bi-info-circle"></i> À propos du blog</h4>
          <p>Je partage ici mon expérience en développement web/mobile, des tutoriels, des retours d'expérience sur des projets concrets et mes réflexions sur l'IA et les nouvelles technologies.</p>
        </div>
      </aside>
    </div>
  </div>
</section>

<style>
  .blog-layout{display:grid;grid-template-columns:1fr 320px;gap:32px;align-items:start}
  .blog-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:20px}
  .blog-card{border-radius:16px;overflow:hidden;transition:all .3s}
  .blog-card:hover{transform:translateY(-4px);border-color:var(--yellow)}
  .blog-card-img{height:180px;overflow:hidden;position:relative}
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

  .blog-sidebar{display:flex;flex-direction:column;gap:20px;position:sticky;top:100px}
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

  body.light .blog-card{background:rgba(255,255,255,.7);border-color:rgba(0,0,0,.08)}
  body.light .blog-card:hover{border-color:var(--yellow)}
  body.light .blog-card-body h3{color:var(--black)}
  body.light .blog-card-body p{color:#475569}
  body.light .blog-card-cat{background:var(--yellow);color:var(--black)}
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
</style>
@endsection

<!-- Navigation -->
<div style="text-align:center;margin-top:32px;">
  <a href="{{ route('home') }}" class="btn btn-outline" style="font-size:.85rem;padding:8px 16px;">
    <i class="bi bi-house-door"></i> Accueil
  </a>
</div>
