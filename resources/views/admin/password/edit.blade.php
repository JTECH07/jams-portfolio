@extends('layouts.app')

@section('content')
<section class="section" style="background:var(--bg);min-height:80vh;display:flex;align-items:center;">
  <div class="wrap" style="max-width:480px;width:100%;margin:0 auto;">
    <a href="{{ route('admin.dashboard') }}" style="display:inline-flex;align-items:center;gap:6px;font-size:.88rem;color:var(--muted);margin-bottom:20px;"><i class="bi bi-arrow-left"></i> Retour</a>
    <div class="section-head reveal" style="text-align:center;margin-bottom:24px;">
      <p class="eyebrow" style="color:var(--yellow);justify-content:center;">Admin</p>
      <h2>Changer de mot de passe</h2>
    </div>

    @if(session('success'))
      <div style="padding:12px 18px;border-radius:10px;background:rgba(16,185,129,.1);border:1px solid rgba(16,185,129,.3);color:var(--ok);margin-bottom:20px;font-size:.9rem;">
        <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
      </div>
    @endif

    @include('partials.form-errors')

    <form class="glass reveal" style="padding:32px;border-radius:16px;" action="{{ route('admin.password.update') }}" method="POST">
      @csrf @method('PUT')
      <div class="field">
        <label>Mot de passe actuel</label>
        <input type="password" name="current_password" required autocomplete="current-password" />
      </div>
      <div class="field" style="margin-top:16px;">
        <label>Nouveau mot de passe</label>
        <input type="password" name="password" required minlength="8" autocomplete="new-password" />
        <small style="color:var(--muted);font-size:.75rem;">8 caractères minimum.</small>
      </div>
      <div class="field" style="margin-top:16px;">
        <label>Confirmer le nouveau mot de passe</label>
        <input type="password" name="password_confirmation" required minlength="8" autocomplete="new-password" />
      </div>
      <button class="btn btn-main" type="submit" style="margin-top:24px;width:100%;justify-content:center;">
        <i class="bi bi-shield-lock-fill"></i> Mettre à jour
      </button>
    </form>
  </div>
</section>
@endsection
