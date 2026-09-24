@extends('layouts.app')

@section('content')
<section class="section" id="about" style="background:var(--bg);">
  <div class="wrap">
    {{-- Hero about --}}
    <div class="about-hero reveal" style="text-align:center;padding:120px 0 60px;margin-bottom:40px;">
      <div class="about-avatar" style="width:180px;height:180px;margin:0 auto 24px;border:4px solid var(--yellow);border-radius:50%;overflow:hidden;background:var(--surface);">
        <img src="{{ asset('images/me.png') }}" alt="Joseph ALAYE" onerror="this.src='{{ asset('images/mon_avatar.png') }}'; this.onerror=null;" style="width:100%;height:100%;object-fit:cover;" />
      </div>
      <h1 style="color:var(--white);font-size:clamp(2.5rem,6vw,4rem);letter-spacing:-.04em;margin-bottom:8px;">JOSEPH <span style="color:var(--yellow);">ALAYE</span></h1>
      <p style="color:var(--muted);font-size:1.1rem;max-width:600px;margin:0 auto;">Développeur Web & Mobile · Porto-Novo, Bénin</p>
    </div>

    {{-- Section Identité --}}
    <div class="about-identity reveal" style="background:var(--surface);border:1px solid var(--line);border-radius:20px;padding:32px 40px;margin-bottom:32px;">
      <div class="about-info" style="max-width:600px;margin:0 auto;">
        <h2 style="color:var(--white);font-size:clamp(1.8rem,3vw,2.2rem);letter-spacing:-.03em;margin-bottom�24px;">Un profil construit sur la pratique et la valeur livrée</h2>
        <p style="color:var(--muted);line-height:1.8;font-size:0.95rem;">
          Mon parcours repose sur une approche pragmatique : comprendre un besoin, cadrer une solution et la livrer avec qualité. Les stages et projets personnels m'ont permis de développer des compétences solides en développement full-stack, de la maquette au déploiement.
        </p>
      </div>
    </div>

    {{-- Section Compétences --}}
    <div class="about-skills reveal" style="margin-bottom:32px;">
      <h3 style="color:var(--yellow);margin-bottom:20px;font-size:1.1rem;">Compétences clés</h3>
      <div class="skills-tags" style="display:flex;flex-wrap:wrap;gap:12px;justify-content:center;">
        <span class="skill-tag" style="background:rgba(37,99,235,.1);border:1px solid rgba(37,99,235,.3);color:var(--accent);padding:8px 16px;border-radius:100px;font-size:.78rem;font-weight:500;">Web Full-Stack</span>
        <span class="skill-tag" style="background:rgba(6,182,212,.1);border:1px solid rgba(6,182,212,.3);color:var(--accent-2);padding:8px 16px;border-radius:100px;font-size:.78rem;font-weight:500;">Mobile Flutter</span>
        <span class="skill-tag" style="background:rgba(255,215,0,.1);border:1px solid rgba(255,215,0,.3);color:var(--yellow);padding:8px 16px;border-radius:100px;font-size:.78rem;font-weight:500;">IA & Robotique</span>
        <span class="skill-tag" style="background:rgba(16,185,129,.1);border:1px solid rgba(16,185,129,.3);color:var(--ok);padding:8px 16px;border-radius:100px;font-size:.78rem;font-weight:500;">Communication</span>
        <span class="skill-tag" style="background:rgba(255,215,0,.1);border:1px solid rgba(255,215,0,.3);color:var(--yellow);padding:8px 16px;border-radius:100px;font-size:.78rem;font-weight:500;">Architecture</span>
      </div>
    </div>

    {{-- Section Expérience --}}
    <div class="about-experience reveal" style="background:var(--surface);border:1px solid var(--line);border-radius:16px;padding:24px;">
      <div class="about-exp-timeline" style="position:relative;padding-left:30px;margin-bottom:24px;">
        <div class="about-exp-dot" style="position:absolute;left:0;top:8px;width:12px;height:12px;border-radius:50%;background:var(--accent);box-shadow:0 0 8px var(--accent);"></div>
        <span style="color:var(--muted);font-size:.85rem;">2024 - 2026 | Porto-Novo, Bénin</span>
      </div>
      <div style="color:var(--muted);line-height:1.8;font-size:0.95rem;">
        <strong>Stage Laravel - DigiWeb SARL</strong> <span style="color:var(--accent);">(Juil - Sep 2025)</span><br>
        <p>Réalisation de projets fonctionnels : CRUD de posts, gestion de bibliothèques et système d'authentification avec confirmation par e-mail.</p>
      </div>
    </div>

    {{-- Section Contact --}}
    <div class="about-contact reveal" style="margin-top:32px;">
      <a href="{{ route('contact') }}" class="btn btn-main" style="font-size:.85rem;padding:10px 24px;margin-top:12px;">
        <i class="bi bi-envelope"></i> Me contacter
      </a>
    </div>
  </div>
</section>
@endsection