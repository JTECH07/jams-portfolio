@extends('layouts.app')

@section('content')
<section class="section" id="about" style="background:var(--bg);">
  <div class="page-bg" aria-hidden="true">
    <img src="https://images.unsplash.com/photo-1516116216624-53e697fedbea?auto=format&fit=crop&w=1600&q=70" alt="" />
  </div>
  <div class="wrap">
    {{-- Hero --}}
    <div class="about-hero reveal" style="text-align:center;padding:100px 0 48px;">
      <div class="about-avatar" style="width:180px;height:180px;margin:0 auto 24px;border:4px solid var(--yellow);border-radius:50%;overflow:hidden;background:var(--surface);">
        <img src="{{ asset('images/me.png') }}" alt="Joseph ALAYE" onerror="this.src='{{ asset('images/mon_avatar.png') }}'; this.onerror=null;" style="width:100%;height:100%;object-fit:cover;" />
      </div>

      <span class="hero-availability" style="margin-bottom:22px;">
        <span class="hero-availability-dot"></span> Disponible pour de nouveaux projets
      </span>

      <h1 style="color:var(--white);font-size:clamp(2.5rem,6vw,4rem);letter-spacing:-.04em;margin-bottom:10px;">
        JOSEPH <span style="color:var(--yellow);">ALAYE</span>
      </h1>
      <p style="color:var(--text);font-size:1.15rem;font-weight:500;margin-bottom:6px;">
        Développeur Full-Stack — Web, Mobile &amp; IA
      </p>
      <p style="color:var(--muted);font-size:.95rem;margin-bottom:28px;">
        Porto-Novo, Bénin · Missions freelance, stages et collaborations
      </p>

      <div class="btn-row" style="justify-content:center;">
        <a href="{{ route('contact') }}" class="btn btn-main">
          <i class="bi bi-send-fill"></i> Travaillons ensemble
        </a>
        <a href="{{ route('timeline') }}" class="btn btn-outline">
          <i class="bi bi-signpost-split"></i> Voir mon parcours
        </a>
      </div>
    </div>

    {{-- Histoire + En bref --}}
    <div class="about-pro-grid" style="margin-bottom:28px;">
      <article class="glass about-pro-card">
        <p class="eyebrow" style="margin-bottom:14px;"><span class="eyebrow-line"></span> Mon histoire</p>
        <h2 style="color:var(--white);font-size:clamp(1.7rem,3vw,2.3rem);margin-bottom:18px;">
          Du code pensé pour l’usage réel
        </h2>
        <p>
          Je m’appelle Joseph ALAYE, développeur full-stack basé à Porto-Novo. Mon intérêt pour
          l’informatique est né d’une curiosité simple : comprendre comment fonctionnent les outils
          du quotidien, puis les reconstruire moi-même.
        </p>
        <p>
          Formé en Systèmes Informatiques et Logiciels à l’UATM Gasa Formation, j’ai consolidé mes
          bases par la pratique : stages, projets personnels et collaborations. De Laravel à React,
          de Flutter à Python, je choisis les technologies en fonction du problème à résoudre, pas
          l’inverse.
        </p>
        <p>
          Aujourd’hui, je conçois des applications web et mobiles et j’explore l’intelligence
          artificielle et l’automatisation. Ma conviction : un bon produit est celui qu’on comprend
          vite, qui tient dans le temps et qui rend réellement service.
        </p>
      </article>

      <aside class="glass about-pro-card about-pro-aside">
        <h3 style="color:var(--yellow);font-size:1rem;margin-bottom:18px;">
          <i class="bi bi-person-vcard"></i> En bref
        </h3>
        <ul class="about-pro-facts">
          <li><i class="bi bi-geo-alt-fill"></i> <span><strong>Localisation</strong>Porto-Novo, Bénin</span></li>
          <li><i class="bi bi-mortarboard-fill"></i> <span><strong>Formation</strong>Licence SIL · UATM Gasa</span></li>
          <li><i class="bi bi-code-slash"></i> <span><strong>Spécialité</strong>Full-stack web &amp; mobile</span></li>
          <li><i class="bi bi-cpu-fill"></i> <span><strong>Exploration</strong>IA &amp; automatisation</span></li>
          <li><i class="bi bi-translate"></i> <span><strong>Langues</strong>Français · Anglais technique</span></li>
          <li><i class="bi bi-clock-history"></i> <span><strong>Réactivité</strong>Réponse sous 24h</span></li>
        </ul>
        <a href="{{ asset('CV_Joseph_ALAYE.pdf') }}" target="_blank" rel="noopener" class="btn btn-outline" style="width:100%;margin-top:6px;">
          <i class="bi bi-file-earmark-pdf"></i> Télécharger le CV
        </a>
      </aside>
    </div>

    {{-- Valeurs --}}
    <div class="section-head reveal" style="text-align:center;margin:56px 0 28px;">
      <p class="eyebrow" style="justify-content:center;"><span class="eyebrow-line"></span> Ce qui me guide</p>
      <h2 style="color:var(--white);text-align:center;">Trois principes, un même cap</h2>
    </div>

    <div class="about-pro-values">
      <article class="glass about-pro-value reveal">
        <span class="about-pro-value-icon"><i class="bi bi-bullseye"></i></span>
        <h3>Le problème avant l’outil</h3>
        <p>Je commence par comprendre le besoin et les contraintes, puis je choisis la stack la plus adaptée — pas la plus à la mode.</p>
      </article>
      <article class="glass about-pro-value reveal">
        <span class="about-pro-value-icon"><i class="bi bi-patch-check-fill"></i></span>
        <h3>La qualité comme standard</h3>
        <p>Un code lisible, testé et documenté. Ce qui est livré doit pouvoir évoluer sans dépendre de son auteur.</p>
      </article>
      <article class="glass about-pro-value reveal">
        <span class="about-pro-value-icon"><i class="bi bi-globe-africa"></i></span>
        <h3>L’impact local</h3>
        <p>Créer des solutions utiles ici, au Bénin, et prouver qu’on peut construire des produits numériques de niveau international depuis chez soi.</p>
      </article>
    </div>

    {{-- Parcours résumé --}}
    <div class="about-pro-grid" style="margin-top:32px;">
      <article class="glass about-pro-card">
        <p class="eyebrow" style="margin-bottom:14px;"><span class="eyebrow-line"></span> Parcours</p>
        <h2 style="color:var(--white);font-size:clamp(1.6rem,2.6vw,2rem);margin-bottom:20px;">Des étapes, pas des raccourcis</h2>

        <div class="about-pro-timeline">
          <div class="about-pro-step">
            <small>En cours</small>
            <h4>Développeur Full-Stack · JAMS TECH</h4>
            <p>Conception de projets web et de solutions digitales orientées innovation et impact local.</p>
          </div>
          <div class="about-pro-step">
            <small>Juil — Sept 2025</small>
            <h4>Stage développement Laravel · DigiWeb SARL</h4>
            <p>CRUD de posts, gestion de bibliothèques et authentification avec confirmation par e-mail.</p>
          </div>
          <div class="about-pro-step">
            <small>2024 — 2026</small>
            <h4>Licence 2 · Systèmes Informatiques et Logiciels</h4>
            <p>UATM Gasa Formation : génie logiciel, développement applicatif et résolution de problèmes.</p>
          </div>
        </div>

        <a href="{{ route('timeline') }}" class="btn btn-outline" style="margin-top:8px;">
          Tout mon parcours <i class="bi bi-arrow-right"></i>
        </a>
      </article>

      <aside class="glass about-pro-card">
        <h3 style="color:var(--yellow);font-size:1rem;margin-bottom:16px;">
          <i class="bi bi-stars"></i> Compétences clés
        </h3>
        <div class="about-pro-tags">
          <span class="skill-tag">Web Full-Stack</span>
          <span class="skill-tag">Laravel</span>
          <span class="skill-tag">React</span>
          <span class="skill-tag">Flutter</span>
          <span class="skill-tag">Python</span>
          <span class="skill-tag">MySQL</span>
          <span class="skill-tag">UI/UX</span>
          <span class="skill-tag">IA &amp; Automatisation</span>
          <span class="skill-tag">Git</span>
        </div>

        <h3 style="color:var(--yellow);font-size:1rem;margin:26px 0 14px;">
          <i class="bi bi-compass"></i> En dehors du code
        </h3>
        <p style="color:var(--muted);font-size:.9rem;line-height:1.7;">
          Membre du Club IA du CAEB, je participe à des ateliers et projets autour du machine
          learning. J’aime aussi le design d’interface et la pédagogie : expliquer simplement des
          idées complexes.
        </p>
      </aside>
    </div>

    {{-- CTA --}}
    <div class="about-pro-cta reveal">
      <div>
        <h2 style="color:var(--white);font-size:clamp(1.6rem,3vw,2.2rem);margin-bottom:6px;">
          Une idée à concrétiser ?
        </h2>
        <p style="color:var(--muted);font-size:.95rem;">Parlons de votre projet, de vos contraintes et de la meilleure façon de le construire.</p>
      </div>
      <div class="btn-row">
        <a href="{{ route('contact') }}" class="btn btn-main"><i class="bi bi-envelope-fill"></i> Me contacter</a>
        <a href="{{ route('projects') }}" class="btn btn-outline"><i class="bi bi-grid-fill"></i> Voir mes projets</a>
      </div>
    </div>
  </div>
</section>

<style>
  .about-pro-grid{display:grid;grid-template-columns:1.4fr .8fr;gap:24px;align-items:start}
  .about-pro-card{padding:32px;border-radius:18px}
  .about-pro-card > p{color:var(--muted);font-size:.95rem;line-height:1.8;margin-bottom:14px}
  .about-pro-card > p:last-of-type{margin-bottom:0}
  .about-pro-aside{position:sticky;top:100px}
  .about-pro-facts{display:flex;flex-direction:column;gap:14px;margin-bottom:22px}
  .about-pro-facts li{display:flex;align-items:flex-start;gap:10px;font-size:.86rem;color:var(--muted)}
  .about-pro-facts li i{color:var(--accent);font-size:.95rem;margin-top:3px}
  .about-pro-facts li span{display:flex;flex-direction:column;line-height:1.4}
  .about-pro-facts li strong{color:var(--white);font-size:.82rem;font-weight:600}

  .about-pro-values{display:grid;grid-template-columns:repeat(3,1fr);gap:20px}
  .about-pro-value{padding:28px;border-radius:18px;transition:transform .3s ease,border-color .3s ease}
  .about-pro-value:hover{transform:translateY(-4px);border-color:var(--accent)}
  .about-pro-value-icon{
    display:grid;place-items:center;width:46px;height:46px;border-radius:12px;
    background:var(--gold-soft);color:var(--accent);font-size:1.2rem;margin-bottom:16px;
  }
  .about-pro-value h3{color:var(--white);font-size:1.05rem;margin-bottom:8px}
  .about-pro-value p{color:var(--muted);font-size:.88rem;line-height:1.65}

  .about-pro-timeline{display:flex;flex-direction:column;gap:18px;margin-bottom:24px;padding-left:18px;border-left:2px solid var(--line)}
  .about-pro-step{position:relative}
  .about-pro-step::before{
    content:'';position:absolute;left:-25px;top:6px;width:10px;height:10px;border-radius:50%;
    background:var(--accent);box-shadow:0 0 8px var(--accent);
  }
  .about-pro-step small{font-family:var(--font-mono);font-size:.72rem;color:var(--accent);letter-spacing:.06em;text-transform:uppercase}
  .about-pro-step h4{color:var(--white);font-size:.98rem;margin:4px 0 4px}
  .about-pro-step p{color:var(--muted);font-size:.87rem;line-height:1.6;margin:0}

  .about-pro-tags{display:flex;flex-wrap:wrap;gap:8px}
  .about-pro-tags .skill-tag{
    padding:7px 14px;border-radius:100px;font-size:.76rem;font-weight:500;
    background:var(--gold-subtle);border:1px solid rgba(232,197,71,.28);color:var(--accent);
  }

  .about-pro-cta{
    display:flex;align-items:center;justify-content:space-between;gap:24px;flex-wrap:wrap;
    margin-top:32px;padding:32px 36px;border-radius:20px;
    background:var(--gold-subtle);border:1px solid rgba(232,197,71,.25);
  }

  body.light .about-pro-value-icon{background:rgba(139,105,20,.1)}
  body.light .about-pro-cta{background:rgba(139,105,20,.06);border-color:rgba(139,105,20,.2)}
  body.light .about-pro-tags .skill-tag{background:rgba(139,105,20,.08);border-color:rgba(139,105,20,.25);color:#8B6914}

  @media(max-width:900px){
    .about-pro-grid{grid-template-columns:1fr}
    .about-pro-aside{position:static}
    .about-pro-values{grid-template-columns:1fr}
    .about-pro-cta{flex-direction:column;align-items:flex-start;text-align:left}
  }
</style>
@endsection
