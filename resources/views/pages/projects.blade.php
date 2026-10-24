@extends('layouts.app')

@section('meta_title', 'Projets | Joseph ALAYE')
@section('meta_description', 'Études de cas et réalisations : plateformes web, applications mobiles, projets IA et design. Découvrez le contexte, la solution et le résultat de chaque projet.')

@section('content')
  <div id="projects-showcase-root"></div>

  {{-- ═══════════ TÉMOIGNAGES ═══════════ --}}
  <section class="section" style="background: var(--bg-soft); border-top: 1px solid var(--line); padding: 80px 0;">
    <div class="wrap">
      <div class="section-head" style="text-align:center;">
        <p class="eyebrow" style="justify-content:center;">
          <span class="eyebrow-line" />
          Témoignages
        </p>
        <h2 style="text-align:center;">Ce qu'ils disent de moi</h2>
      </div>
    </div>

    <div class="marquee-wrap" style="padding: 20px 0;">
      <div class="marquee-track" style="animation-duration:35s;">
        <article class="testimonial-card glass" style="min-width:340px;max-width:340px;">
          <div class="testimonial-stars"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></div>
          <p class="testimonial-text">"Joseph a su comprendre rapidement nos besoins et livrer une plateforme fonctionnelle dans les délais."</p>
          <div class="testimonial-author">
            <div class="testimonial-avatar">GW</div>
            <div class="testimonial-info"><strong>Green World Builders</strong><span>Client — Plateforme web</span></div>
          </div>
        </article>
        <article class="testimonial-card glass" style="min-width:340px;max-width:340px;">
          <div class="testimonial-stars"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></div>
          <p class="testimonial-text">"Un développeur rigoureux et créatif. L'application est devenue un outil indispensable pour notre établissement."</p>
          <div class="testimonial-author">
            <div class="testimonial-avatar" style="background:linear-gradient(135deg,var(--yellow),var(--ok));">UA</div>
            <div class="testimonial-info"><strong>UATM GASA Formation</strong><span>Institution — App mobile</span></div>
          </div>
        </article>
        <article class="testimonial-card glass" style="min-width:340px;max-width:340px;">
          <div class="testimonial-stars"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i></div>
          <p class="testimonial-text">"Très professionnel pendant son stage. Il a rapidement maîtrisé notre stack et livré des fonctionnalités solides."</p>
          <div class="testimonial-author">
            <div class="testimonial-avatar" style="background:linear-gradient(135deg,var(--accent-2),var(--accent));">DW</div>
            <div class="testimonial-info"><strong>DigiWeb SARL</strong><span>Encadrant de stage — Laravel</span></div>
          </div>
        </article>
        <article class="testimonial-card glass" style="min-width:340px;max-width:340px;">
          <div class="testimonial-stars"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></div>
          <p class="testimonial-text">"Joseph a su comprendre rapidement nos besoins et livrer une plateforme fonctionnelle dans les délais."</p>
          <div class="testimonial-author">
            <div class="testimonial-avatar">GW</div>
            <div class="testimonial-info"><strong>Green World Builders</strong><span>Client — Plateforme web</span></div>
          </div>
        </article>
        <article class="testimonial-card glass" style="min-width:340px;max-width:340px;">
          <div class="testimonial-stars"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></div>
          <p class="testimonial-text">"Un développeur rigoureux et créatif. L'application est devenue un outil indispensable pour notre établissement."</p>
          <div class="testimonial-author">
            <div class="testimonial-avatar" style="background:linear-gradient(135deg,var(--yellow),var(--ok));">UA</div>
            <div class="testimonial-info"><strong>UATM GASA Formation</strong><span>Institution — App mobile</span></div>
          </div>
        </article>
        <article class="testimonial-card glass" style="min-width:340px;max-width:340px;">
          <div class="testimonial-stars"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i></div>
          <p class="testimonial-text">"Très professionnel pendant son stage. Il a rapidement maîtrisé notre stack et livré des fonctionnalités solides."</p>
          <div class="testimonial-author">
            <div class="testimonial-avatar" style="background:linear-gradient(135deg,var(--accent-2),var(--accent));">DW</div>
            <div class="testimonial-info"><strong>DigiWeb SARL</strong><span>Encadrant de stage — Laravel</span></div>
          </div>
        </article>
      </div>
    </div>
  </section>
@endsection
