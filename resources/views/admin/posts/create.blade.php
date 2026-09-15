@extends('layouts.app')

@section('content')
<section class="section" style="background:var(--bg);">
  <div class="wrap">
    <a href="{{ route('admin.posts') }}" style="display:inline-flex;align-items:center;gap:6px;font-size:.88rem;color:var(--muted);margin-bottom:20px;"><i class="bi bi-arrow-left"></i> Retour</a>
    <div class="section-head reveal">
      <p class="eyebrow" style="color:var(--yellow);">Admin</p>
      <h2>Nouvel article</h2>
    </div>

    <form class="glass reveal" style="padding:32px;border-radius:16px;max-width:700px;" action="{{ route('admin.posts.store') }}" method="POST">
      @csrf
      <div class="field">
        <label>Titre</label>
        <input type="text" name="title" value="{{ old('title') }}" required />
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
          <label>Image (fichier dans images/)</label>
          <input type="text" name="image" value="{{ old('image') }}" placeholder="code.jpg" />
        </div>
        <div class="field">
          <label>Catégorie</label>
          <select name="category">
            <option value="development">Development</option>
            <option value="ia">IA</option>
            <option value="mobile">Mobile</option>
            <option value="design">Design</option>
            <option value="conseil">Conseil</option>
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
