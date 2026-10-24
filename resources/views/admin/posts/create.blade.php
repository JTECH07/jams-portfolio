@extends('layouts.app')

@section('content')
<section class="section" style="background:var(--bg);">
  <div class="wrap">
    <a href="{{ route('admin.posts') }}" style="display:inline-flex;align-items:center;gap:6px;font-size:.88rem;color:var(--muted);margin-bottom:20px;"><i class="bi bi-arrow-left"></i> Retour</a>
    <div class="section-head reveal">
      <p class="eyebrow" style="color:var(--yellow);">Admin</p>
      <h2>Nouvel article</h2>
    </div>

    <form class="glass reveal" style="padding:32px;border-radius:16px;max-width:700px;" action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="field">
        <label>Titre</label>
        <input type="text" name="title" value="{{ old('title') }}" required />
      </div>
      <div class="field" style="margin-top:16px;">
        <label>Slug (URL)</label>
        <input type="text" name="slug" value="{{ old('slug') }}" placeholder="généré depuis le titre si vide" />
      </div>
      <div class="field" style="margin-top:16px;">
        <label>Résumé</label>
        <textarea name="excerpt" rows="3" required>{{ old('excerpt') }}</textarea>
      </div>
      <div class="field" style="margin-top:16px;">
        <label>Contenu (HTML)</label>
        <textarea name="body" rows="12" required style="font-family:var(--font-mono);font-size:.88rem;">{{ old('body') }}</textarea>
      </div>
      <div class="form-row" style="margin-top:16px;">
        <div class="field">
          <label>Image de couverture</label>
          <input type="file" name="image_file" accept="image/jpeg,image/png,image/webp,image/gif" />
          <small style="color:var(--muted);font-size:.75rem;">JPG, PNG, WebP ou GIF — 4 Mo max.</small>
        </div>
        <div class="field">
          <label>Catégorie</label>
          <select name="category">
            @foreach($categories as $value => $label)
              <option value="{{ $value }}" {{ old('category') === $value ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <label style="display:flex;align-items:center;gap:8px;margin-top:16px;cursor:pointer;font-size:.9rem;color:var(--muted);">
        <input type="checkbox" name="published" {{ old('published') ? 'checked' : '' }} /> Publier immédiatement
      </label>
      <button class="btn btn-main" type="submit" style="margin-top:20px;"><i class="bi bi-check-lg"></i> Créer l'article</button>
    </form>
  </div>
</section>
@endsection
