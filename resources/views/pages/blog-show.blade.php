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
          <small><i class="bi bi-chat-dots"></i> {{ $post->totalComments() }} commentaire(s)</small>
          <small class="blog-article-stars">
            @for($i = 1; $i <= 5; $i++)
              <i class="bi bi-star{{ $i <= round($post->avgRating()) ? '-fill' : '' }}"></i>
            @endfor
            <span>{{ number_format($post->avgRating(), 1) }}</span>
          </small>
        </div>

        <h1>{{ $post->title }}</h1>

        <div class="blog-article-body">
          {!! $post->body !!}
        </div>
      </div>
    </article>

    {{-- ═══════════ RATE THIS ARTICLE ═══════════ --}}
    <div class="glass reveal" style="margin-top:32px;padding:32px;border-radius:16px;">
      <h3 style="margin-bottom:4px;">Évaluez cet article</h3>
      <p style="color:var(--muted);font-size:.88rem;margin-bottom:16px;">Votre note aide les autres à trouver du contenu de qualité.</p>

      @if(session('rated'))
        <div style="padding:10px 16px;border-radius:10px;font-size:.85rem;background:rgba(16,185,129,.1);border:1px solid rgba(16,185,129,.3);color:var(--ok);margin-bottom:16px;">
          <i class="bi bi-check-circle-fill"></i> Merci pour votre évaluation !
        </div>
      @endif

      <form class="rating-form" action="{{ route('rating.store') }}" method="POST">
        @csrf
        <input type="hidden" name="rateable_type" value="post" />
        <input type="hidden" name="rateable_id" value="{{ $post->id }}" />

        <div class="star-input" id="starInput">
          @for($i = 1; $i <= 5; $i++)
            <button type="button" class="star-btn" data-star="{{ $i }}">
              <i class="bi bi-star"></i>
            </button>
          @endfor
          <input type="hidden" name="stars" id="starsValue" value="5" />
          <span class="star-label" id="starLabel">5/5 — Excellent</span>
        </div>

        <div class="form-row" style="margin-top:12px;">
          <div class="field">
            <label>Votre nom</label>
            <input type="text" name="author_name" placeholder="Jean Dupont" required />
          </div>
          <div class="field">
            <label>E-mail (optionnel)</label>
            <input type="email" name="author_email" placeholder="jean@email.com" />
          </div>
        </div>

        <div class="field" style="margin-top:12px;">
          <label>Avis (optionnel)</label>
          <textarea name="review" rows="3" placeholder="Partagez votre expérience avec cet article..." style="resize:vertical;"></textarea>
        </div>

        <button class="btn btn-main" type="submit" style="margin-top:12px;">
          <i class="bi bi-send-fill"></i> Envoyer mon évaluation
        </button>
      </form>
    </div>

    {{-- ═══════════ COMMENTS ═══════════ --}}
    <div class="glass reveal" style="margin-top:24px;padding:32px;border-radius:16px;">
      <h3 style="margin-bottom:16px;">
        <i class="bi bi-chat-dots"></i> Commentaires ({{ $post->totalComments() }})
      </h3>

      @if(session('commented'))
        <div style="padding:10px 16px;border-radius:10px;font-size:.85rem;background:rgba(16,185,129,.1);border:1px solid rgba(16,185,129,.3);color:var(--ok);margin-bottom:16px;">
          <i class="bi bi-check-circle-fill"></i> Commentaire publié !
        </div>
      @endif

      {{-- Existing comments --}}
      @forelse($post->comments as $comment)
        <div class="comment-item">
          <div class="comment-avatar">{{ substr($comment->author_name, 0, 1) }}</div>
          <div class="comment-content">
            <div class="comment-header">
              <strong>{{ $comment->author_name }}</strong>
              <small>{{ $comment->created_at->diffForHumans() }}</small>
            </div>
            <p>{{ $comment->body }}</p>
          </div>
        </div>
      @empty
        <p style="color:var(--muted);font-size:.9rem;text-align:center;padding:20px 0;">
          Aucun commentaire pour l'instant. Soyez le premier !
        </p>
      @endforelse

      {{-- Add comment form --}}
      <form class="comment-form" action="{{ route('comment.store') }}" method="POST" style="margin-top:20px;">
        @csrf
        <input type="hidden" name="commentable_type" value="post" />
        <input type="hidden" name="commentable_id" value="{{ $post->id }}" />

        <div class="form-row">
          <div class="field">
            <label>Votre nom</label>
            <input type="text" name="author_name" placeholder="Jean Dupont" required />
          </div>
          <div class="field">
            <label>E-mail (optionnel)</label>
            <input type="email" name="author_email" placeholder="jean@email.com" />
          </div>
        </div>

        <div class="field" style="margin-top:12px;">
          <label>Commentaire</label>
          <textarea name="body" rows="3" placeholder="Votre commentaire..." required style="resize:vertical;"></textarea>
        </div>

        <button class="btn btn-main" type="submit" style="margin-top:12px;">
          <i class="bi bi-chat-left-text-fill"></i> Publier
        </button>
      </form>
    </div>

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
  .blog-article-meta{display:flex;align-items:center;gap:12px;margin-bottom:16px;flex-wrap:wrap}
  .blog-article-meta small{font-size:.8rem;color:var(--muted);display:flex;align-items:center;gap:4px}
  .blog-article-stars{color:var(--yellow);display:flex;align-items:center;gap:2px}
  .blog-article-stars span{margin-left:4px;color:var(--muted)}
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
  .blog-article-body blockquote{
    border-left:3px solid var(--yellow);padding:12px 20px;
    background:rgba(255,215,0,.05);border-radius:0 10px 10px 0;
    margin:16px 0;font-style:italic;
  }
  .blog-article-body img{border-radius:12px;max-width:100%;margin:16px 0}

  /* Star rating input */
  .star-input{display:flex;align-items:center;gap:4px}
  .star-btn{
    background:none;border:none;cursor:pointer;font-size:1.5rem;
    color:rgba(255,255,255,.2);transition:all .2s;padding:2px;
  }
  .star-btn.active,.star-btn:hover{color:var(--yellow);transform:scale(1.15)}
  .star-label{margin-left:12px;font-size:.85rem;color:var(--muted);font-family:var(--font-mono)}

  /* Comments */
  .comment-item{
    display:flex;gap:12px;padding:16px 0;
    border-bottom:1px solid var(--line);
  }
  .comment-item:last-child{border-bottom:none}
  .comment-avatar{
    width:38px;height:38px;border-radius:50%;flex-shrink:0;
    background:linear-gradient(135deg,var(--accent),var(--accent-2));
    display:grid;place-items:center;
    color:var(--white);font-weight:700;font-size:.85rem;
  }
  .comment-content{flex:1}
  .comment-header{display:flex;align-items:center;gap:8px;margin-bottom:4px}
  .comment-header strong{font-size:.9rem;color:var(--white)}
  .comment-header small{font-size:.75rem;color:var(--muted)}
  .comment-content p{font-size:.9rem;color:var(--muted);line-height:1.6;margin:0}

  body.light .blog-article{background:rgba(255,255,255,.7);border-color:rgba(0,0,0,.08)}
  body.light .blog-article-content h1{color:var(--black)}
  body.light .blog-article-body{color:#475569}
  body.light .blog-article-body h2,.blog-article-body h3{color:var(--black)}
  body.light .blog-article-sub{background:rgba(255,255,255,.7);border-color:rgba(0,0,0,.08)}
  body.light .blog-article-sub h3{color:var(--black)}
  body.light .comment-avatar{color:var(--white)}
  body.light .comment-header strong{color:var(--black)}
  body.light .comment-content p{color:#475569}
  body.light .star-btn{color:rgba(0,0,0,.2)}
  body.light .star-btn.active,.star-btn:hover{color:var(--yellow)}
  body.light .blog-sub-form input{background:rgba(255,255,255,.6);border-color:rgba(0,0,0,.1);color:var(--text)}

  @media(max-width:768px){
    .blog-article-hero{height:240px}
    .blog-article-content{padding:24px}
  }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
  const labels = ['1/5 — Médiocre', '2/5 — Passable', '3/5 — Correct', '4/5 — Bien', '5/5 — Excellent'];
  const starBtns = document.querySelectorAll('.star-btn');
  const starsInput = document.getElementById('starsValue');
  const starLabel = document.getElementById('starLabel');
  let current = 5;

  function updateStars(n) {
    current = n;
    starsInput.value = n;
    starLabel.textContent = labels[n - 1];
    starBtns.forEach((btn, i) => {
      const icon = btn.querySelector('i');
      if (i < n) {
        icon.className = 'bi bi-star-fill';
        btn.classList.add('active');
      } else {
        icon.className = 'bi bi-star';
        btn.classList.remove('active');
      }
    });
  }

  starBtns.forEach((btn, i) => {
    btn.addEventListener('click', (e) => { e.preventDefault(); updateStars(i + 1); });
    btn.addEventListener('mouseenter', () => {
      starBtns.forEach((b, j) => {
        b.querySelector('i').className = j <= i ? 'bi bi-star-fill' : 'bi bi-star';
      });
    });
  });

  document.querySelector('.star-input')?.addEventListener('mouseleave', () => updateStars(current));
  updateStars(5);
});
</script>
@endsection
