@extends('layouts.app')

@section('content')
<section class="section" style="background:var(--bg);">
  <div class="wrap">
    <a href="{{ route('admin.posts') }}" style="display:inline-flex;align-items:center;gap:6px;font-size:.88rem;color:var(--muted);margin-bottom:20px;"><i class="bi bi-arrow-left"></i> Retour</a>
    <div class="section-head reveal">
      <p class="eyebrow" style="color:var(--yellow);">Admin</p>
      <h2>Modifier : {{ $post->title }}</h2>
    </div>

    @include('partials.form-errors')

    <form class="glass reveal" style="padding:32px;border-radius:16px;max-width:700px;" action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data">
      @csrf @method('PUT')
      <div class="field">
        <label>Titre</label>
        <input type="text" name="title" value="{{ old('title', $post->title) }}" required />
      </div>
      <div class="field" style="margin-top:16px;">
        <label>Slug (URL)</label>
        <input type="text" name="slug" value="{{ old('slug', $post->slug) }}" />
        <small style="color:var(--muted);font-size:.75rem;">Modifier le slug change l'adresse de l'article.</small>
      </div>
      <div class="field" style="margin-top:16px;">
        <label>Résumé</label>
        <textarea name="excerpt" rows="3" required>{{ old('excerpt', $post->excerpt) }}</textarea>
      </div>
      <div class="field" style="margin-top:16px;">
        <label>Contenu (HTML)</label>
        <textarea name="body" rows="12" required style="font-family:var(--font-mono);font-size:.88rem;">{{ old('body', $post->body) }}</textarea>
      </div>
      <div class="form-row" style="margin-top:16px;">
        <div class="field">
          <label>Image de couverture</label>
          @if($post->image)
            <img src="{{ asset('images/' . $post->image) }}" alt="" style="width:100%;max-width:240px;border-radius:8px;margin-bottom:8px;display:block;" />
          @endif
          <input type="file" name="image_file" accept="image/jpeg,image/png,image/webp,image/gif" />
          <small style="color:var(--muted);font-size:.75rem;">Laisser vide pour conserver l'image actuelle — 4 Mo max.</small>
        </div>
        <div class="field">
          <label>Catégorie</label>
          <select name="category">
            @foreach($categories as $value => $label)
              <option value="{{ $value }}" {{ old('category', $post->category) === $value ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="field" style="margin-top:16px;">
        <label>Date de publication</label>
        <input type="datetime-local" name="published_at" value="{{ old('published_at', $post->published_at?->format('Y-m-d\TH:i')) }}" />
        <small style="color:var(--muted);font-size:.75rem;">Laisser vide pour publier maintenant. Une date future planifie l'article.</small>
      </div>
      <label style="display:flex;align-items:center;gap:8px;margin-top:16px;cursor:pointer;font-size:.9rem;color:var(--muted);">
        <input type="checkbox" name="published" {{ old('published', $post->published) ? 'checked' : '' }} /> Publié
      </label>
      <button class="btn btn-main" type="submit" style="margin-top:20px;"><i class="bi bi-check-lg"></i> Enregistrer</button>
    </form>
  </div>
</section>
@endsection
