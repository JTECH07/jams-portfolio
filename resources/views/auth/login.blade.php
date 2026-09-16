@extends('layouts.app')

@section('content')
<section class="section" style="background:var(--bg);min-height:80vh;display:flex;align-items:center;">
  <div class="wrap" style="max-width:420px;width:100%;margin:0 auto;">
    <div class="section-head reveal" style="text-align:center;margin-bottom:32px;">
      <p class="eyebrow" style="color:var(--yellow);justify-content:center;">Admin</p>
      <h2>Connexion</h2>
    </div>

    @if($errors->any())
      <div style="padding:12px 18px;border-radius:10px;background:rgba(239,68,68,.1);border:1px solid rgba(239,68,68,.3);color:#ef4444;margin-bottom:20px;font-size:.9rem;">
        <i class="bi bi-exclamation-circle-fill"></i> {{ $errors->first() }}
      </div>
    @endif

    <form class="glass reveal" style="padding:32px;border-radius:16px;" action="{{ route('login') }}" method="POST">
      @csrf
      <div class="field">
        <label>E-mail</label>
        <input type="email" name="email" value="{{ old('email') }}" required autofocus />
      </div>
      <div class="field" style="margin-top:16px;">
        <label>Mot de passe</label>
        <input type="password" name="password" required />
      </div>
      <button class="btn btn-main" type="submit" style="margin-top:24px;width:100%;justify-content:center;">
        <i class="bi bi-box-arrow-in-right"></i> Se connecter
      </button>
    </form>
  </div>
</section>
@endsection
