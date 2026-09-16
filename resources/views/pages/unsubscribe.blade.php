@extends('layouts.app')

@section('content')
<section class="section" style="background:var(--bg);min-height:80vh;display:flex;align-items:center;">
  <div class="wrap" style="max-width:480px;width:100%;margin:0 auto;text-align:center;">
    <div class="glass reveal" style="padding:40px 32px;border-radius:20px;">
      <div style="width:64px;height:64px;border-radius:50%;background:rgba(255,215,0,.1);display:grid;place-items:center;margin:0 auto 20px;">
        <i class="bi bi-envelope-check" style="color:var(--yellow);font-size:1.8rem;"></i>
      </div>
      <h2 style="margin-bottom:12px;">Désabonnement</h2>
      <p style="color:var(--muted);margin-bottom:24px;">
        Vous êtes sûr de vouloir vous désabonner des notifications par e-mail ?
      </p>
      <p style="color:var(--muted);font-size:.88rem;margin-bottom:24px;">
        <strong style="color:var(--white);">{{ $email }}</strong>
      </p>
      <div style="display:flex;gap:12px;justify-content:center;">
        <form action="{{ route('blog.unsubscribe.post', $email) }}" method="POST">
          @csrf
          <button class="btn btn-main" type="submit">
            <i class="bi bi-check-lg"></i> Oui, me désabonner
          </button>
        </form>
        <a class="btn btn-outline" href="{{ route('blog') }}">
          <i class="bi bi-arrow-left"></i> Rester abonné
        </a>
      </div>
    </div>
  </div>
</section>
@endsection
