@extends('layouts.app')

@section('content')
<section class="section" style="background:var(--bg);">
  <div class="wrap">
    <a href="{{ route('admin.dashboard') }}" style="display:inline-flex;align-items:center;gap:6px;font-size:.88rem;color:var(--muted);margin-bottom:20px;"><i class="bi bi-arrow-left"></i> Retour</a>
    <div class="section-head reveal">
      <p class="eyebrow" style="color:var(--yellow);">Admin</p>
      <h2>Commentaires ({{ $comments->count() }})</h2>
    </div>

    @if(session('success'))
      <div style="padding:12px 18px;border-radius:10px;background:rgba(16,185,129,.1);border:1px solid rgba(16,185,129,.3);color:var(--ok);margin-bottom:20px;font-size:.9rem;">
        <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
      </div>
    @endif

    <div style="display:flex;flex-direction:column;gap:12px;">
      @forelse($comments as $comment)
        <div class="glass reveal" style="padding:20px;border-radius:12px;display:flex;gap:16px;align-items:flex-start;">
          <div style="width:40px;height:40px;border-radius:50%;background:linear-gradient(135deg,var(--accent),var(--accent-2));display:grid;place-items:center;color:var(--white);font-weight:700;flex-shrink:0;">
            {{ substr($comment->author_name, 0, 1) }}
          </div>
          <div style="flex:1;">
            <div style="display:flex;justify-content:space-between;align-items:center;">
              <strong style="font-size:.9rem;">{{ $comment->author_name }}</strong>
              <div style="display:flex;align-items:center;gap:8px;">
                @if(!$comment->approved)
                  <form action="{{ route('admin.comments.approve', $comment) }}" method="POST" style="display:inline;">
                    @csrf
                    <button class="btn btn-outline" style="padding:4px 10px;font-size:.75rem;color:var(--ok);border-color:var(--ok);" type="submit"><i class="bi bi-check"></i> Approuver</button>
                  </form>
                @else
                  <span style="font-size:.72rem;color:var(--ok);"><i class="bi bi-check-circle-fill"></i> Approuvé</span>
                @endif
                <form action="{{ route('admin.comments.delete', $comment) }}" method="POST" onsubmit="return confirm('Supprimer ?')">
                  @csrf @method('DELETE')
                  <button class="btn btn-outline" style="padding:4px 10px;font-size:.75rem;" type="submit"><i class="bi bi-trash"></i></button>
                </form>
              </div>
            </div>
            <p style="font-size:.88rem;color:var(--muted);margin:6px 0 0;line-height:1.6;">{{ $comment->body }}</p>
            <small style="color:var(--muted);font-size:.75rem;">{{ $comment->created_at->diffForHumans() }}</small>
          </div>
        </div>
      @empty
        <div class="glass" style="padding:40px;text-align:center;border-radius:12px;">
          <p style="color:var(--muted);">Aucun commentaire.</p>
        </div>
      @endforelse
    </div>
  </div>
</section>
@endsection
