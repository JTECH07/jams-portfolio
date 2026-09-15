@extends('layouts.app')

@section('content')
<section class="section" style="background:var(--bg);min-height:80vh;display:flex;align-items:center;">
  <div class="wrap" style="text-align:center;">
    <div class="error-404 reveal">
      <div class="error-code">404</div>
      <h2 style="margin-bottom:12px;">Page introuvable</h2>
      <p style="color:var(--muted);max-width:440px;margin:0 auto 32px;">
        La page que vous recherchez n'existe pas ou a été déplacée. Pas de panique, vous pouvez revenir à l'accueil.
      </p>
      <div class="btn-row" style="justify-content:center;">
        <a class="btn btn-main" href="{{ route('home') }}">
          <i class="bi bi-house-fill"></i> Accueil
        </a>
        <a class="btn btn-outline" href="{{ route('contact') }}">
          <i class="bi bi-envelope"></i> Contact
        </a>
      </div>
    </div>
  </div>
</section>

<style>
  .error-404{padding:40px 0}
  .error-code{
    font-family:var(--font-head);font-weight:900;
    font-size:clamp(6rem,20vw,14rem);line-height:1;
    background:linear-gradient(135deg,var(--yellow),var(--accent));
    -webkit-background-clip:text;-webkit-text-fill-color:transparent;
    opacity:.8;margin-bottom:16px;
  }
</style>
@endsection
