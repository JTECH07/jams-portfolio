@extends('layouts.app')

@section('content')
<section class="section" style="background:var(--bg);">
  <div class="wrap">
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:32px;">
      <div class="section-head reveal" style="margin-bottom:0;">
        <p class="eyebrow" style="color:var(--yellow);">Admin</p>
        <h2>Articles</h2>
      </div>
      <a class="btn btn-main" href="{{ route('admin.posts.create') }}"><i class="bi bi-plus-circle"></i> Nouveau</a>
    </div>

    @if(session('success'))
      <div style="padding:12px 18px;border-radius:10px;background:rgba(16,185,129,.1);border:1px solid rgba(16,185,129,.3);color:var(--ok);margin-bottom:20px;font-size:.9rem;">
        <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
      </div>
    @endif

    <div class="glass reveal" style="border-radius:16px;overflow:hidden;">
      <table class="admin-table">
        <thead>
          <tr>
            <th>Titre</th>
            <th>Catégorie</th>
            <th>Statut</th>
            <th>Date</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($posts as $post)
            <tr>
              <td><strong style="color:var(--white);">{{ $post->title }}</strong></td>
              <td><span style="padding:3px 10px;border-radius:100px;font-size:.72rem;background:rgba(37,99,235,.1);color:var(--accent);">{{ $post->category }}</span></td>
              <td>
                @if($post->published)
                  <span style="color:var(--ok);"><i class="bi bi-check-circle-fill"></i> Publié</span>
                @else
                  <span style="color:var(--muted);"><i class="bi bi-clock"></i> Brouillon</span>
                @endif
              </td>
              <td style="color:var(--muted);font-size:.85rem;">{{ $post->created_at->format('d/m/Y') }}</td>
              <td>
                <div style="display:flex;gap:6px;">
                  <a class="btn btn-outline" href="{{ route('admin.posts.edit', $post) }}" style="padding:4px 10px;font-size:.78rem;"><i class="bi bi-pencil"></i></a>
                  <form action="{{ route('admin.posts.delete', $post) }}" method="POST" onsubmit="return confirm('Supprimer cet article ?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-outline" style="padding:4px 10px;font-size:.78rem;color:var(--ok);border-color:var(--ok);" type="submit"><i class="bi bi-trash"></i></button>
                  </form>
                </div>
              </td>
            </tr>
          @empty
            <tr><td colspan="5" style="text-align:center;color:var(--muted);padding:40px;">Aucun article.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</section>
@endsection
