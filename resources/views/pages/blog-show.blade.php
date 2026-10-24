@extends('layouts.app')

@section('meta_title', $post->title . ' — Blog de Joseph ALAYE')
@section('meta_description', $post->excerpt)
@section('og_title', $post->title)
@section('og_description', $post->excerpt)
@section('og_image', $post->image ? asset('images/' . $post->image) : asset('images/bg/blog.jpg'))

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
          <span class="blog-card-cat" style="position:static;">{{ $post->categoryLabel() }}</span>
          <small><i class="bi bi-calendar3"></i> {{ $post->created_at->format('d M Y') }}</small>
          <small><i class="bi bi-clock"></i> {{ $post->readingTime() }} min de lecture</small>
          <small><i class="bi bi-chat-dots"></i> {{ $post->totalComments() }} commentaire(s)</small>
          <small><i class="bi bi-eye"></i> {{ $views }} vue(s)</small>
          <small class="blog-article-stars" title="{{ $post->ratingCount() }} évaluation(s)">
            @for($i = 1; $i <= 5; $i++)
              <i class="bi bi-star{{ $i <= round($post->avgRating()) ? '-fill' : '' }}"></i>
            @endfor
            <span>{{ number_format($post->avgRating(), 1) }} ({{ $post->ratingCount() }})</span>
          </small>
        </div>

        <h1>{{ $post->title }}</h1>

        <div class="blog-article-body">
          {!! $post->body !!}
        </div>

        {{-- Social Share --}}
        <div class="blog-share">
          <span class="blog-share-label"><i class="bi bi-share"></i> Partager :</span>
          <a class="blog-share-btn twitter" href="https://twitter.com/intent/tweet?text={{ urlencode($post->title) }}&url={{ urlencode(url('/blog/' . $post->slug)) }}" target="_blank" rel="noopener">
            <i class="bi bi-twitter-x"></i>
          </a>
          <a class="blog-share-btn linkedin" href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url('/blog/' . $post->slug)) }}" target="_blank" rel="noopener">
            <i class="bi bi-linkedin"></i>
          </a>
          <a class="blog-share-btn whatsapp" href="https://wa.me/?text={{ urlencode($post->title . ' ' . url('/blog/' . $post->slug)) }}" target="_blank" rel="noopener">
            <i class="bi bi-whatsapp"></i>
          </a>
          <a class="blog-share-btn facebook" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url('/blog/' . $post->slug)) }}" target="_blank" rel="noopener">
            <i class="bi bi-facebook"></i>
          </a>
        </div>
      </div>
    </article>

    {{-- ═══════════ RATE THIS ARTICLE ═══════════ --}}
    <div class="glass reveal" style="margin-top:32px;padding:32px;border-radius:16px;">
      <h3 style="margin-bottom:4px;">Évaluez cet article</h3>
      <p style="color:var(--muted);font-size:.88rem;margin-bottom:16px;">Votre note aide les autres à trouver du contenu de qualité.</p>

      @if(session('rated'))
        <div class="blog-alert success">
          <i class="bi bi-check-circle-fill"></i> Merci pour votre évaluation !
        </div>
      @endif
      @if(session('rating_error'))
        <div class="blog-alert error">
          <i class="bi bi-exclamation-circle-fill"></i> {{ session('rating_error') }}
        </div>
      @endif
      @if($errors->has('stars') || $errors->has('author_name') || $errors->has('author_email') || $errors->has('review'))
        <div class="blog-alert error">
          <i class="bi bi-exclamation-circle-fill"></i> {{ $errors->first() }}
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
        <div class="blog-alert success">
          <i class="bi bi-check-circle-fill"></i> Commentaire publié !
        </div>
      @endif
      @if($errors->has('body') || ($errors->has('author_name') && !$errors->has('stars')))
        <div class="blog-alert error">
          <i class="bi bi-exclamation-circle-fill"></i> {{ $errors->first() }}
        </div>
      @endif

      {{-- Existing comments --}}
      @forelse($comments as $comment)
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

    {{-- Related posts --}}
    @if($related->isNotEmpty())
      <section class="blog-related reveal" aria-labelledby="blogRelatedTitle">
        <div class="blog-related-head">
          <p class="eyebrow" style="margin-bottom:6px;">À lire aussi</p>
          <h3 id="blogRelatedTitle">Dans la même catégorie</h3>
        </div>
        <div class="blog-related-grid">
          @foreach($related as $item)
            <a class="blog-related-card" href="{{ route('blog.show', $item->slug) }}">
              @if($item->image)
                <img src="{{ asset('images/' . $item->image) }}" alt="{{ $item->title }}" loading="lazy" />
              @endif
              <div>
                <small>{{ $item->categoryLabel() }} · {{ $item->readingTime() }} min</small>
                <h4>{{ $item->title }}</h4>
              </div>
            </a>
          @endforeach
        </div>
      </section>
    @endif

    {{-- Subscribe CTA --}}
    <section class="blog-follow reveal" aria-labelledby="blogFollowTitle">
      <div class="blog-follow-icon" aria-hidden="true">
        <i class="bi bi-envelope-paper-heart-fill"></i>
      </div>
      <div class="blog-follow-copy">
        <p class="blog-follow-eyebrow">Newsletter</p>
        <h3 id="blogFollowTitle">Vous avez aimé cet article ?</h3>
        <p>Recevez les prochains articles, retours d’expérience et ressources directement par e-mail. Pas de spam, désinscription en un clic.</p>
      </div>

      @if(session('subscribed'))
        <div class="blog-follow-success">
          <i class="bi bi-check-circle-fill"></i> Merci ! Votre abonnement est bien enregistré.
        </div>
      @endif

      <form class="blog-follow-form" action="{{ route('blog.subscribe') }}" method="POST">
        @csrf
        <input type="email" name="email" placeholder="votre@email.com" required aria-label="Votre adresse e-mail" />
        <button class="btn btn-main" type="submit">
          <i class="bi bi-send-fill"></i> S’abonner
        </button>
      </form>
    </section>
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

  /* Social Share */
  .blog-share{
    display:flex;align-items:center;gap:10px;margin-top:24px;
    padding-top:20px;border-top:1px solid var(--line);
  }
  .blog-share-label{font-size:.85rem;color:var(--muted);font-weight:500}
  .blog-share-btn{
    width:38px;height:38px;border-radius:50%;display:grid;place-items:center;
    border:1px solid var(--line);background:rgba(255,255,255,.03);
    color:var(--muted);font-size:1rem;transition:all .3s;
  }
  .blog-share-btn:hover{transform:translateY(-2px)}
  .blog-share-btn.twitter:hover{color:#fff;background:#000;border-color:#000}
  .blog-share-btn.linkedin:hover{color:#fff;background:#0077b5;border-color:#0077b5}
  .blog-share-btn.whatsapp:hover{color:#fff;background:#25d366;border-color:#25d366}
  .blog-share-btn.facebook:hover{color:#fff;background:#1877f2;border-color:#1877f2}

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

  .blog-alert{
    display:flex;align-items:center;gap:8px;padding:10px 14px;
    border-radius:10px;font-size:.85rem;margin-bottom:16px;
  }
  .blog-alert.success{background:rgba(16,185,129,.1);border:1px solid rgba(16,185,129,.3);color:var(--ok)}
  .blog-alert.error{background:rgba(239,68,68,.1);border:1px solid rgba(239,68,68,.3);color:#f87171}

  /* Related posts */
  .blog-related{
    margin-top:40px;padding:30px 32px;border-radius:20px;
    border:1px solid var(--line);background:rgba(255,255,255,.02);
  }
  .blog-related-head{margin-bottom:18px}
  .blog-related-head h3{color:var(--white);font-size:1.2rem;margin:0}
  .blog-related-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:14px}
  .blog-related-card{
    display:flex;flex-direction:column;overflow:hidden;border-radius:14px;
    border:1px solid var(--line);background:var(--surface-light);
    transition:transform .3s,border-color .3s,box-shadow .3s;
  }
  .blog-related-card:hover{
    transform:translateY(-3px);border-color:var(--accent);
    box-shadow:0 14px 30px rgba(0,0,0,.25);
  }
  .blog-related-card img{width:100%;height:110px;object-fit:cover;display:block}
  .blog-related-card div{padding:12px 14px}
  .blog-related-card small{
    font-family:var(--font-mono);font-size:.64rem;text-transform:uppercase;
    letter-spacing:.08em;color:var(--accent);
  }
  .blog-related-card h4{color:var(--white);font-size:.88rem;line-height:1.35;margin:6px 0 0}

  @media(max-width:768px){
    .blog-related{padding:22px}
    .blog-related-grid{grid-template-columns:1fr}
  }

  /* Newsletter CTA */
  .blog-follow{
    position:relative;overflow:hidden;margin-top:40px;padding:38px 40px;border-radius:22px;
    display:grid;grid-template-columns:auto 1fr;gap:22px 26px;align-items:center;
    border:1px solid rgba(232,197,71,.28);
    background:
      radial-gradient(ellipse at 12% 18%,rgba(232,197,71,.16),transparent 55%),
      rgba(255,255,255,.03);
  }
  .blog-follow-icon{
    width:62px;height:62px;border-radius:18px;display:grid;place-items:center;
    font-size:1.6rem;color:#000;
    background:linear-gradient(135deg,var(--yellow),#f59e0b);
    box-shadow:0 14px 36px rgba(232,197,71,.28);
  }
  .blog-follow-copy h3{color:var(--white);font-size:1.35rem;margin:0 0 6px}
  .blog-follow-copy p{color:var(--muted);font-size:.92rem;line-height:1.6;margin:0;max-width:560px}
  .blog-follow-eyebrow{
    font-family:var(--font-mono);font-size:.66rem;letter-spacing:.16em;
    text-transform:uppercase;color:var(--accent);margin-bottom:6px;
  }
  .blog-follow-form{grid-column:1/-1;display:flex;gap:10px;align-items:center;max-width:560px}
  .blog-follow-form input{
    flex:1;min-width:0;padding:13px 18px;border-radius:100px;border:1px solid var(--line);
    background:rgba(255,255,255,.06);color:var(--text);font-family:var(--font-body);
    font-size:.92rem;outline:none;transition:border-color .3s,box-shadow .3s;
  }
  .blog-follow-form input::placeholder{color:var(--muted)}
  .blog-follow-form input:focus{border-color:var(--accent);box-shadow:0 0 0 3px rgba(232,197,71,.12)}
  .blog-follow-form .btn{border-radius:100px;padding:13px 24px;white-space:nowrap}
  .blog-follow-success{
    grid-column:1/-1;display:inline-flex;align-items:center;gap:8px;
    font-size:.85rem;color:var(--ok);
  }

  body.light .blog-follow{
    background:
      radial-gradient(ellipse at 12% 18%,rgba(232,197,71,.18),transparent 55%),
      rgba(255,255,255,.7);
    border-color:rgba(232,197,71,.4);
  }
  body.light .blog-follow-copy h3{color:var(--black)}
  body.light .blog-follow-copy p{color:#475569}
  body.light .blog-follow-form input{background:rgba(255,255,255,.75);border-color:rgba(0,0,0,.12)}

  @media(max-width:640px){
    .blog-follow{padding:26px;grid-template-columns:1fr;gap:18px}
    .blog-follow-icon{width:52px;height:52px;font-size:1.35rem}
    .blog-follow-form{flex-direction:column;align-items:stretch;max-width:none}
    .blog-follow-form .btn{width:100%}
  }

  body.light .blog-related{background:rgba(255,255,255,.7);border-color:rgba(0,0,0,.08)}
  body.light .blog-related-head h3{color:var(--black)}
  body.light .blog-related-card{background:rgba(255,255,255,.7);border-color:rgba(0,0,0,.08)}
  body.light .blog-related-card h4{color:var(--black)}
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
