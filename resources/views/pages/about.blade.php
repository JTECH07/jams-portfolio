@extends('layouts.app')

@section('content')
<section class="section" id="about">
  <div class="wrap">
    <div class="section-head reveal">
      <p class="eyebrow" style="color: var(--accent);">À propos</p>
      <h2>Un profil construit sur la pratique et la valeur livrée</h2>
      <p>
        Mon parcours repose sur une approche pragmatique: comprendre un besoin, cadrer une solution et la livrer
        avec qualité. Les stages et projets personnels m'ont permis de développer des compétences solides.
      </p>
    </div>

    <div class="about-grid">
      <figure class="about-image reveal" style="border-color: var(--accent);">
        <img src="{{ asset('images/me_thinking.png') }}" alt="Joseph en réflexion" onerror="this.src='{{ asset('images/me.png') }}'; this.onerror=null;" />
      </figure>

      <article class="about-text glass reveal">
        <h3 style="color: var(--yellow);">Développeur orienté impact et fiabilité</h3>
        <p>
          Je suis étudiant en Systèmes Informatiques et Logiciels (SIL) avec un intérêt fort pour le développement
          d'applications web/mobiles, l'IA et l'automatisation de workflows.
        </p>
        <p>
          Mon stage Laravel chez DigiWeb SARL m'a permis de réaliser des fonctionnalités concrètes: opérations CRUD,
          système de gestion de bibliothèque et authentification avec confirmation par e-mail.
        </p>
        
        <div class="chips">
          <span class="chip" style="color: var(--bg); background: var(--yellow); border-color: var(--yellow);">IA & Robotique</span>
          <span class="chip" style="color: var(--white); background: var(--accent); border-color: var(--accent);">Web Full-Stack</span>
          <span class="chip" style="color: var(--white); background: var(--accent-2); border-color: var(--accent-2);">Mobile Flutter</span>
          <span class="chip">UI/UX</span>
          <span class="chip">Automatisation</span>
        </div>

        <div class="about-meta-grid" style="margin-top: 30px;">
          <article class="mini-panel" style="background: rgba(37, 99, 235, 0.1); border-color: var(--accent);">
            <h4 style="color: var(--accent);">Langues</h4>
            <ul class="plain-list">
              <li><i class="bi bi-check-circle-fill" style="color: var(--accent);"></i> Français courant</li>
              <li><i class="bi bi-check-circle-fill" style="color: var(--accent);"></i> Anglais technique</li>
            </ul>
          </article>

          <article class="mini-panel" style="background: rgba(6, 182, 212, 0.1); border-color: var(--accent-2);">
            <h4 style="color: var(--accent-2);">Centres d'intérêt</h4>
            <ul class="plain-list">
              <li><i class="bi bi-cpu-fill" style="color: var(--accent-2);"></i> IA & Robotique</li>
              <li><i class="bi bi-controller" style="color: var(--accent-2);"></i> Basket & Jeux</li>
            </ul>
          </article>
        </div>
      </article>
    </div>
  </div>
</section>
@endsection
