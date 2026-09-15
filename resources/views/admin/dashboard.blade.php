@extends('layouts.app')

@section('content')
<section class="section" style="background:var(--bg);">
  <div class="wrap">
    <div class="section-head reveal">
      <p class="eyebrow" style="color:var(--yellow);">Admin</p>
      <h2>Tableau de bord</h2>
    </div>

    <div class="admin-stats">
      <div class="admin-stat glass">
        <i class="bi bi-journal-text" style="color:var(--accent);"></i>
        <div class="admin-stat-n">{{ $stats['posts'] }}</div>
        <p>Articles</p>
      </div>
      <div class="admin-stat glass">
        <i class="bi bi-chat-dots" style="color:var(--accent-2);"></i>
        <div class="admin-stat-n">{{ $stats['comments'] }}</div>
        <p>Commentaires</p>
      </div>
      <div class="admin-stat glass">
        <i class="bi bi-envelope-check" style="color:var(--ok);"></i>
        <div class="admin-stat-n">{{ $stats['subscribers'] }}</div>
        <p>Abonnés</p>
      </div>
      <div class="admin-stat glass">
        <i class="bi bi-star-fill" style="color:var(--yellow);"></i>
        <div class="admin-stat-n">{{ $stats['ratings'] }}</div>
        <p>Évaluations</p>
      </div>
    </div>

    <div style="display:grid;grid-template-columns:1fr 1fr;gap:24px;margin-top:32px;">
      {{-- Quick links --}}
      <div class="glass reveal" style="padding:24px;border-radius:16px;">
        <h3 style="margin-bottom:16px;">Actions rapides</h3>
        <div style="display:flex;flex-direction:column;gap:10px;">
          <a class="btn btn-outline" href="{{ route('admin.posts.create') }}"><i class="bi bi-plus-circle"></i> Nouvel article</a>
          <a class="btn btn-outline" href="{{ route('admin.posts') }}"><i class="bi bi-journal-text"></i> Gérer les articles</a>
          <a class="btn btn-outline" href="{{ route('admin.comments') }}"><i class="bi bi-chat-dots"></i> Modérer les commentaires</a>
          <a class="btn btn-outline" href="{{ route('admin.subscribers') }}"><i class="bi bi-people"></i> Voir les abonnés</a>
        </div>
      </div>

      {{-- Recent comments --}}
      <div class="glass reveal" style="padding:24px;border-radius:16px;">
        <h3 style="margin-bottom:16px;">Derniers commentaires</h3>
        @forelse($recentComments as $comment)
          <div style="padding:10px 0;border-bottom:1px solid var(--line);">
            <div style="display:flex;justify-content:space-between;">
              <strong style="font-size:.88rem;">{{ $comment->author_name }}</strong>
              <small style="color:var(--muted);">{{ $comment->created_at->diffForHumans() }}</small>
            </div>
            <p style="font-size:.85rem;color:var(--muted);margin:4px 0 0;">{{ Str::limit($comment->body, 80) }}</p>
          </div>
        @empty
          <p style="color:var(--muted);text-align:center;">Aucun commentaire.</p>
        @endforelse
      </div>
    </div>
  </div>
</section>

<style>
  .admin-stats{display:grid;grid-template-columns:repeat(4,1fr);gap:16px}
  .admin-stat{padding:24px;text-align:center;display:flex;flex-direction:column;align-items:center;gap:8px;border-radius:16px}
  .admin-stat i{font-size:1.8rem}
  .admin-stat-n{font-size:2rem;font-weight:800;color:var(--white);font-family:var(--font-head)}
  .admin-stat p{font-size:.82rem;color:var(--muted)}
  body.light .admin-stat{background:rgba(255,255,255,.6);border-color:rgba(0,0,0,.08)}
  body.light .admin-stat-n{color:var(--black)}
  @media(max-width:768px){
    .admin-stats{grid-template-columns:repeat(2,1fr)}
    div[style*="grid-template-columns:1fr 1fr"]{grid-template-columns:1fr!important}
  }
</style>
@endsection
