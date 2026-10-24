@extends('layouts.app')

@php
  $certifications = [
    [
      'title' => 'UI/UX Design',
      'issuer' => 'Google',
      'year' => '2024',
      'image' => 'images/desktop-code.jpg',
      'desc' => "Fondamentaux du design d'interface et de l'expérience utilisateur.",
    ],
    [
      'title' => 'IA Générative',
      'issuer' => 'FuturCraft',
      'year' => '2024',
      'image' => 'images/me-thinking.png',
      'desc' => "Usages concrets de l'IA générative et productivité numérique.",
    ],
    [
      'title' => 'Maintenance Informatique',
      'issuer' => 'SENANTIC',
      'year' => '2025',
      'image' => 'images/desktop_code.jpg',
      'desc' => "Support technique et maintenance d'équipements.",
    ],
    [
      'title' => 'Licence SIL',
      'issuer' => 'UATM GASA',
      'year' => '2024-2026',
      'image' => 'images/laptop-code.jpg',
      'desc' => 'Systèmes Informatiques et Logiciels — L2.',
    ],
    [
      'title' => 'Développement Web',
      'issuer' => 'DigiWeb SARL',
      'year' => '2025',
      'image' => 'images/me-in-workspace.png',
      'desc' => 'Cycle complet de développement en équipe.',
    ],
    [
      'title' => 'Python & Data',
      'issuer' => 'Club IA · CAEB',
      'year' => '2025',
      'image' => 'images/me-coding.png',
      'desc' => 'Machine learning et applications pratiques.',
    ],
  ];
@endphp

@section('content')
<section class="section" id="timeline">
  <div class="page-bg" aria-hidden="true">
    <img src="{{ asset('images/bg/timeline.jpg') }}" alt="" />
  </div>
  <div class="wrap">
    <div class="section-head reveal" style="text-align:center;max-width:740px;margin:0 auto 48px;">
      <p class="eyebrow" style="justify-content:center;"><span class="eyebrow-line"></span> Parcours</p>
      <h2 style="text-align:center;">Un parcours construit par la pratique</h2>
      <p style="text-align:center;">Formation, stages et projets : chaque étape a ajouté une compétence concrète et une méthode de travail plus solide.</p>
    </div>

    <div class="tl-zig">
      <div class="tl-row reveal">
        <article class="tl-item glass">
          <small>En cours · Porto-Novo, Bénin</small>
          <h3>Développeur Full-Stack — JAMS TECH</h3>
          <p>Conception de projets web et de solutions digitales orientées innovation et impact local. Du cadrage à la mise en ligne, avec une attention particulière à la qualité et à la maintenabilité.</p>
        </article>
        <span class="tl-dot" style="--dot:var(--white);" aria-hidden="true"></span>
      </div>

      <div class="tl-row reveal">
        <article class="tl-item glass">
          <small>Juil — Sept 2025 · Porto-Novo, Bénin</small>
          <h3>Stagiaire Développement Web Laravel — DigiWeb SARL</h3>
          <p>Réalisation de fonctionnalités en conditions réelles : CRUD de posts, gestion de bibliothèques et authentification avec confirmation par e-mail. Première expérience d’un cycle de développement complet en équipe.</p>
        </article>
        <span class="tl-dot" style="--dot:var(--accent);" aria-hidden="true"></span>
      </div>

      <div class="tl-row reveal">
        <article class="tl-item glass">
          <small>2025 — aujourd’hui · Porto-Novo, Bénin</small>
          <h3>Membre du Club IA — CAEB</h3>
          <p>Exploration de l’intelligence artificielle, programmation Python et machine learning, avec des applications pratiques au sein du laboratoire numérique du CAEB.</p>
        </article>
        <span class="tl-dot" style="--dot:var(--yellow);" aria-hidden="true"></span>
      </div>

      <div class="tl-row reveal">
        <article class="tl-item glass">
          <small>2024 — 2026 · Porto-Novo, Bénin</small>
          <h3>Licence 2 — Systèmes Informatiques et Logiciels</h3>
          <p>UATM Gasa Formation : génie logiciel, développement applicatif et résolution de problèmes techniques. Le socle théorique qui structure ma pratique.</p>
        </article>
        <span class="tl-dot" style="--dot:var(--accent);" aria-hidden="true"></span>
      </div>

      <div class="tl-row reveal">
        <article class="tl-item glass">
          <small>Avr 2025 · Porto-Novo, Bénin</small>
          <h3>Apprenti en maintenance informatique — SENANTIC</h3>
          <p>Support technique, maintenance des équipements et assistance à la continuité opérationnelle. Une immersion dans le terrain et le service aux utilisateurs.</p>
        </article>
        <span class="tl-dot" style="--dot:var(--ok);" aria-hidden="true"></span>
      </div>

      <div class="tl-row reveal">
        <article class="tl-item glass">
          <small>Déc 2024 · Sèmè-Podji, Bénin</small>
          <h3>Formation IA Générative — FuturCraft Institut</h3>
          <p>Programme FUTUR orienté usages concrets de l’IA générative, productivité et nouvelles méthodes de création numérique.</p>
        </article>
        <span class="tl-dot" style="--dot:var(--accent-2);" aria-hidden="true"></span>
      </div>

      <div class="tl-row reveal">
        <article class="tl-item glass">
          <small>2023 — 2024 · Porto-Novo, Bénin</small>
          <h3>Baccalauréat D — CEG AGBOKOU</h3>
          <p>Base scientifique solide, qui soutient encore aujourd’hui l’approche analytique en programmation et en conception de solutions.</p>
        </article>
        <span class="tl-dot" style="--dot:var(--muted);" aria-hidden="true"></span>
      </div>
    </div>

    <div class="btn-row reveal" style="justify-content:center;margin-top:36px;">
      <a href="{{ route('contact') }}" class="btn btn-main"><i class="bi bi-send-fill"></i> Travaillons ensemble</a>
      <a href="{{ route('projects') }}" class="btn btn-outline"><i class="bi bi-grid-fill"></i> Voir mes projets</a>
    </div>
  </div>
</section>

{{-- ═══════════ CERTIFICATIONS ═══════════ --}}
<section class="section cert-section" id="certifications">
  <div class="cert-bg" aria-hidden="true">
    <img src="{{ asset('images/bg/certifications.jpg') }}" alt="" loading="lazy" />
  </div>

  <div class="wrap">
    <div class="cert-head reveal">
      <div class="cert-head-copy">
        <p class="eyebrow" style="color:var(--yellow);"><span class="eyebrow-line"></span> Certifications</p>
        <h2>Formations &amp; validations</h2>
        <p>
          Des preuves concrètes de montée en compétence : programmes suivis, projets validés et
          bases académiques. Survolez le ruban pour l’explorer.
        </p>
        <div class="cert-head-facts">
          <span><i class="bi bi-patch-check-fill"></i> {{ count($certifications) }} certifications</span>
          <span><i class="bi bi-calendar3"></i> 2024 — 2026</span>
        </div>
      </div>

      <figure class="cert-head-art">
        <img src="{{ asset('images/certification-animate.svg') }}" alt="Illustration de certification animée" loading="lazy" />
      </figure>
    </div>

    <div id="cert-ribbon-root" class="cert-ribbon-root" aria-live="polite"></div>

    <noscript>
      <div class="cert-noscript">
        @foreach($certifications as $cert)
          <article>
            <img src="{{ asset($cert['image']) }}" alt="{{ $cert['title'] }}" />
            <h4>{{ $cert['title'] }}</h4>
            <small>{{ $cert['issuer'] }} · {{ $cert['year'] }}</small>
          </article>
        @endforeach
      </div>
    </noscript>

    <script type="application/json" id="cert-ribbon-data">{!! json_encode($certifications, JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}</script>
  </div>
</section>

<style>
  /* ── Timeline zigzag ── */
  .tl-zig{position:relative;max-width:980px;margin:0 auto;padding:10px 0}
  .tl-zig::before{
    content:'';position:absolute;top:0;bottom:0;left:50%;width:2px;transform:translateX(-50%);
    background:linear-gradient(to bottom,transparent,var(--line) 6%,var(--line) 94%,transparent);
  }
  .tl-row{position:relative;display:flex;margin-bottom:28px}
  .tl-row:nth-child(odd){justify-content:flex-start;padding-right:calc(50% + 36px)}
  .tl-row:nth-child(even){justify-content:flex-end;padding-left:calc(50% + 36px)}
  .tl-zig .tl-item{flex:1;position:relative;padding:22px 26px;border-radius:16px}
  .tl-zig .tl-item::before{display:none}
  .tl-dot{
    position:absolute;top:28px;left:50%;width:18px;height:18px;border-radius:50%;
    transform:translateX(-50%);background:var(--dot);
    box-shadow:0 0 0 6px var(--bg),0 0 16px var(--dot);
    z-index:1;
  }
  .tl-row:nth-child(odd) .tl-item::after,
  .tl-row:nth-child(even) .tl-item::after{
    content:'';position:absolute;top:35px;width:22px;height:2px;background:var(--line);
  }
  .tl-row:nth-child(odd) .tl-item::after{right:-22px}
  .tl-row:nth-child(even) .tl-item::after{left:-22px}

  /* ── Certifications ── */
  .cert-section{position:relative;overflow:hidden;background:var(--bg)}
  .cert-bg{position:absolute;inset:0;z-index:0;pointer-events:none}
  .cert-bg img{width:100%;height:100%;object-fit:cover;opacity:.2;filter:grayscale(.35) brightness(.5)}
  .cert-section::after{
    content:'';position:absolute;inset:0;z-index:0;pointer-events:none;
    background:
      radial-gradient(ellipse at 18% 8%,rgba(232,197,71,.1),transparent 55%),
      linear-gradient(to bottom,rgba(0,0,0,.5),rgba(0,0,0,.2) 42%,rgba(0,0,0,.86));
  }
  .cert-section .wrap{position:relative;z-index:2}
  .cert-head{display:grid;grid-template-columns:1.15fr .85fr;gap:30px;align-items:center;margin-bottom:32px}
  .cert-head-copy h2{color:var(--white);font-size:clamp(1.8rem,3.4vw,2.6rem);margin-bottom:12px}
  .cert-head-copy p{color:var(--muted);line-height:1.8;max-width:560px}
  .cert-head-facts{display:flex;flex-wrap:wrap;gap:16px;margin-top:18px}
  .cert-head-facts span{
    display:inline-flex;align-items:center;gap:8px;font-size:.82rem;color:var(--text);
    padding:8px 14px;border-radius:100px;border:1px solid var(--line);background:rgba(255,255,255,.04);
  }
  .cert-head-facts i{color:var(--accent)}
  .cert-head-art{display:flex;justify-content:center;align-items:center;margin:0}
  .cert-head-art img{
    width:min(100%,360px);height:auto;
    filter:drop-shadow(0 20px 40px rgba(232,197,71,.18));
  }
  .cert-ribbon-root{position:relative;margin-top:10px}
  .cert-noscript{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:16px}
  .cert-noscript article{padding:14px;border:1px solid var(--line);border-radius:16px}
  .cert-noscript img{width:100%;height:130px;object-fit:cover;border-radius:10px;margin-bottom:10px}
  .cert-noscript h4{color:var(--white);font-size:.95rem;margin-bottom:4px}
  .cert-noscript small{color:var(--muted);font-size:.8rem}

  body.light .tl-zig::before{background:linear-gradient(to bottom,transparent,rgba(0,0,0,.12) 6%,rgba(0,0,0,.12) 94%,transparent)}
  body.light .tl-dot{box-shadow:0 0 0 6px #fafafa,0 0 16px var(--dot)}
  body.light .cert-bg img{opacity:.12;filter:grayscale(.1) brightness(1)}
  body.light .cert-section::after{
    background:
      radial-gradient(ellipse at 18% 8%,rgba(232,197,71,.14),transparent 55%),
      linear-gradient(to bottom,rgba(250,250,250,.72),rgba(250,250,250,.42) 42%,rgba(250,250,250,.94));
  }
  body.light .cert-head-facts span{background:rgba(255,255,255,.6);border-color:rgba(0,0,0,.1)}
  body.light .cert-noscript h4{color:var(--black)}

  @media(max-width:760px){
    .tl-zig{max-width:100%}
    .tl-zig::before{left:10px;transform:none}
    .tl-row:nth-child(odd),.tl-row:nth-child(even){justify-content:flex-start;padding:0 0 0 44px}
    .tl-dot{left:10px;transform:translateX(-50%)}
    .tl-row:nth-child(odd) .tl-item::after,.tl-row:nth-child(even) .tl-item::after{display:none}
    .cert-head{grid-template-columns:1fr;text-align:left}
    .cert-head-art{order:-1}
    .cert-head-art img{width:min(100%,250px)}
  }
</style>
@endsection
