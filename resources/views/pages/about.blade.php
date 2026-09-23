@extends('layouts.app')

@section('content')
<section class="section" id="about" style="background:var(--bg);">
  <div class="wrap">
    <div class="section-head reveal" style="text-align:center;margin-bottom:40px;">
      <p class="eyebrow" style="color: var(--accent);justify-content:center;">À propos</p>
      <h2 style="text-align:center;">Un profil construit sur la pratique et la valeur livrée</h2>
    </div>

    <div class="about-grid" style="grid-template-columns:1fr;gap:32px;margin-top:32px;">
      <figure class="about-image reveal" style="border-color: var(--accent);margin:0 auto;width:100%;max-width:400px;">
        <img src="{{ asset('images/me_thinking.png') }}" alt="Joseph en réflexion" onerror="this.src='{{ asset('images/me.png') }}'; this.onerror=null;" style="width:100%;height:auto;display:block;margin:0 auto;" />
      </figure>

      <article class="about-text glass reveal" style="padding:0;">
        <h3 style="color: var(--yellow);margin-bottom:16px;text-align:center;">Développeur orienté impact et fiabilité</h3>
        <p style="color:var(--muted);margin-bottom:16px;line-height:1.8;text-align:center;">
          Étudiant en Systèmes Informatiques et Logiciels (SIL) avec un intérêt fort pour le développement
          d'applications web/mobiles, l'IA et l'automatisation de workflows.
        </p>
        <p style="color:var(--muted);margin-bottom:20px;line-height:1.8;text-align:center;">
          Mon stage Laravel chez DigiWeb SARL m'a permis de réaliser des fonctionnalités concrètes :
          opérations CRUD, système de gestion de bibliothèque et authentification avec confirmation par e-mail.
        </p>

        <div class="chips" style="justify-content:center;flex-wrap:wrap;gap:12px;margin:24px 0;">
          <span class="chip" style="color: var(--bg); background: var(--yellow); border-color: var(--yellow);">IA & Robotique</span>
          <span class="chip" style="color: var(--white); background: var(--accent); border-color: var(--accent);">Web Full-Stack</span>
          <span class="chip" style="color: var(--white); background: var(--accent-2); border-color: var(--accent-2);">Mobile Flutter</span>
          <span class="chip">UI/UX</span>
          <span class="chip">Automatisation</span>
        </div>

        <div class="about-meta-grid" style="margin-top: 24px;grid-template-columns:1fr;gap:16px;">
          <article class="mini-panel" style="background: rgba(37, 99, 235, 0.1); border-color: var(--accent);padding:20px;">
            <h4 style="color: var(--accent);margin-bottom:12px;">Langues</h4>
            <ul class="plain-list" style="padding:0;margin:0;">
              <li style="padding:6px 0;"><i class="bi bi-check-circle-fill" style="color: var(--accent);"></i> Français courant</li>
              <li style="padding:6px 0;"><i class="bi bi-check-circle-fill" style="color: var(--accent);"></i> Anglais technique</li>
            </ul>
          </article>

          <article class="mini-panel" style="background: rgba(6, 182, 212, 0.1); border-color: var(--accent-2);padding:20px;">
            <h4 style="color: var(--accent-2);margin-bottom:12px;">Centres d'intérêt</h4>
            <ul class="plain-list" style="padding:0;margin:0;">
              <li style="padding:6px 0;"><i class="bi bi-cpu-fill" style="color: var(--accent-2);"></i> IA & Robotique</li>
              <li style="padding:6px 0;"><i class="bi bi-controller" style="color: var(--accent-2);"></i> Basket & Jeux</li>
            </ul>
          </article>
        </div>
      </article>
    </div>

    <div style="text-align:center;margin-top:40px;">
      <a href="{{ route('projets') }}" class="btn btn-main" style="font-size:.9rem;padding:10px 24px;">
        <i class="bi bi-grid-3x3-gap"></i> Voir mes projets
      </a>
      <a href="{{ route('contact') }}" class="btn btn-outline" style="font-size:.9rem;padding:10px 24px;margin-left:16px;">
        <i class="bi bi-envelope"></i> Me contacter
      </a>
    </div>
  </div>
</section>
@endsection