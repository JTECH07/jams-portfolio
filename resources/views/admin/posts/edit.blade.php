@extends('layouts.app')

@section('content')
<section class="section" style="background:var(--bg);">
  <div class="wrap">
    <a href="{{ route('admin.posts') }}" style="display:inline-flex;align-items:center;gap:6px;font-size:.88rem;color:var(--muted);margin-bottom:20px;"><i class="bi bi-arrow-left"></i> Retour</a>
    <div class="section-head reveal">
      <p class="eyebrow" style="color:var(--yellow);">Admin</p>
      <h2>Modifier : {{ $post->title }}</h2>
    </div>

    <form class="glass reveal" style="padding:32px;border-radius:16px;max-width:700px;" action="{{ route('admin.posts.update', $post) }}" method="POST">
      @csrf @method('PUT')
      <div class="field">
        <label>Titre</label>
        <input type="text" name="title" value="{{ old('title', $post->title) }}" required />
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
          <label>Image</label>
          <input type="text" name="image" value="{{ old('image', $post->image) }}" />
        </div>
        <div class="field">
          <label>Catégorie</label>
          <select name="category">
            @foreach(['development','ia','mobile','design','conseil'] as $cat)
              <option value="{{ $cat }}" {{ $post->category === $cat ? 'selected' : '' }}>{{ ucfirst($cat) }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <label style="display:flex;align-items:center;gap:8px;margin-top:16px;cursor:pointer;font-size:.9rem;color:var(--muted);">
        <input type="checkbox" name="published" {{ old('published', $post->published) ? 'checked' : '' }} /> Publié
      </label>
      <button class="btn btn-main" type="submit" style="margin-top:20px;"><i class="bi bi-check-lg"></i> Enregistrer</button>
    </form>
  </div>
</section>
@endsection
