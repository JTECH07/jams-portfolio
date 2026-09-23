@extends('layouts.app')

@section('content')
<section class="section" id="timeline">
  <div class="wrap">
    <div class="section-head reveal">
      <p class="eyebrow" style="color: var(--white);">Parcours</p>
      <h2>Formation et expériences</h2>
      <p>Mon parcours est marqué par une progression constante et des expériences concrètes.</p>
    </div>

    <div class="timeline" style="border-left: 2px solid var(--accent); padding-left: 30px;">
      <article class="tl-item glass reveal">
        <div style="position:absolute;left:-42px;top:20px;width:20px;height:20px;background:var(--accent);border-radius:50%;box-shadow:0 0 10px var(--accent);"></div>
        <small>2024 - 2026 | Porto-Novo, Bénin</small>
        <h3>Licence 2 - Systèmes Informatiques et Logiciels</h3>
        <p>SIL - UATM Gasa Formation. Renforcement en génie logiciel, développement applicatif et résolution de problèmes techniques.</p>
      </article>

      <article class="tl-item glass reveal">
        <div style="position:absolute;left:-42px;top:20px;width:20px;height:20px;background:var(--yellow);border-radius:50%;box-shadow:0 0 10px var(--yellow);"></div>
        <small>2025 - Now | Porto-Novo, Bénin</small>
        <h3>Membre du Club IA - CAEB</h3>
        <p>Exploration de l'IA, programmation Python, Machine Learning et applications pratiques au sein du laboratoire numérique du CAEB.</p>
      </article>

      <article class="tl-item glass reveal">
        <div style="position:absolute;left:-42px;top:20px;width:20px;height:20px;background:var(--accent);border-radius:50%;box-shadow:0 0 10px var(--accent);"></div>
        <small>Juil - Sept 2025 | Porto-Novo, Bénin</small>
        <h3>Stagiaire Développement Web Laravel - DigiWeb SARL</h3>
        <p>Réalisation de projets fonctionnels : CRUD de posts, gestion de bibliothèques et système d'authentification avec confirmation par mail.</p>
      </article>

      <article class="tl-item glass reveal">
        <div style="position:absolute;left:-42px;top:20px;width:20px;height:20px;background:var(--accent-2);border-radius:50%;box-shadow:0 0 10px var(--accent-2);"></div>
        <small>Déc 2024 | Sèmè-Podji, Bénin</small>
        <h3>Formation IA Générative - FuturCraft Institut</h3>
        <p>Programme FUTUR orienté usages concrets de l'IA générative, productivité et nouvelles méthodes de création numérique.</p>
      </article>

      <article class="tl-item glass reveal">
        <div style="position:absolute;left:-42px;top:20px;width:20px;height:20px;background:var(--ok);border-radius:50%;box-shadow:0 0 10px var(--ok);"></div>
        <small>Avr 2025 | Porto-Novo, Bénin</small>
        <h3>Apprenti en maintenance informatique - SENANTIC</h3>
        <p>Support technique, maintenance de base des équipements et assistance à la continuité opérationnelle.</p>
      </article>

      <article class="tl-item glass reveal">
        <div style="position:absolute;left:-42px;top:20px;width:20px;height:20px;background:var(--white);border-radius:50%;box-shadow:0 0 10px var(--white);"></div>
        <small>En cours</small>
        <h3>Développeur Full-Stack - JAMS TECH</h3>
        <p>Développement de projets web et solutions digitales, avec une orientation forte vers l'innovation et l'impact local.</p>
      </article>

      <article class="tl-item glass reveal">
        <div style="position:absolute;left:-42px;top:20px;width:20px;height:20px;background:var(--muted);border-radius:50%;box-shadow:0 0 6px var(--muted);"></div>
        <small>2023 - 2024 | Porto-Novo, Bénin</small>
        <h3>Baccalauréat D - CEG AGBOKOU</h3>
        <p>Base scientifique solide qui soutient l'approche analytique en programmation et en conception de solutions.</p>
      </article>
    </div>

    {{-- ═══════════ CERTIFICATIONS ═══════════ --}}
    <div class="section-head reveal" style="margin-top: 80px;">
      <p class="eyebrow" style="color: var(--yellow);">Certifications</p>
      <h2>Formations & validations</h2>
    </div>
  </div>

  {{-- Diagonal upward scroll --}}
  <div class="cert-diagonal-wrap">
    <div class="cert-diagonal-track">
      {{-- Cert 1 --}}
      <article class="cert-diag-card">
        <div class="cert-diag-img">
          <img src="{{ asset('images/cert_uiux.png') }}" alt="Certificat UI/UX" onerror="this.parentElement.innerHTML='<div class=\'cert-placeholder\'><i class=\'bi bi-palette-fill\'></i><span>UI/UX Design</span></div>'" />
        </div>
        <div class="cert-diag-info">
          <small>Google · 2024</small>
          <h4>UI/UX Design</h4>
          <p>Fondamentaux du design d'interface et expérience utilisateur</p>
        </div>
      </article>

      {{-- Cert 2 --}}
      <article class="cert-diag-card">
        <div class="cert-diag-img">
          <img src="{{ asset('images/cert_ia.png') }}" alt="Certificat IA" onerror="this.parentElement.innerHTML='<div class=\'cert-placeholder\'><i class=\'bi bi-robot\'></i><span>IA Générative</span></div>'" />
        </div>
        <div class="cert-diag-info">
          <small>FuturCraft · 2024</small>
          <h4>IA Générative</h4>
          <p>Usages concrets de l'IA générative et productivité numérique</p>
        </div>
      </article>

      {{-- Cert 3 --}}
      <article class="cert-diag-card">
        <div class="cert-diag-img">
          <img src="{{ asset('images/cert_maintenance.png') }}" alt="Certificat Maintenance" onerror="this.parentElement.innerHTML='<div class=\'cert-placeholder\'><i class=\'bi bi-laptop\'></i><span>Maintenance</span></div>'" />
        </div>
        <div class="cert-diag-info">
          <small>SENANTIC · 2025</small>
          <h4>Maintenance Informatique</h4>
          <p>Support technique et maintenance d'équipements</p>
        </div>
      </article>

      {{-- Cert 4 --}}
      <article class="cert-diag-card">
        <div class="cert-diag-img">
          <img src="{{ asset('images/cert_sil.png') }}" alt="Licence SIL" onerror="this.parentElement.innerHTML='<div class=\'cert-placeholder\'><i class=\'bi bi-file-earmark-check\'></i><span>Licence SIL</span></div>'" />
        </div>
        <div class="cert-diag-info">
          <small>UATM GASA · 2024-2026</small>
          <h4>Licence SIL</h4>
          <p>Systèmes Informatiques et Logiciels — L2</p>
        </div>
      </article>

      {{-- Duplicates for seamless loop --}}
      <article class="cert-diag-card">
        <div class="cert-diag-img">
          <img src="{{ asset('images/cert_uiux.png') }}" alt="Certificat UI/UX" onerror="this.parentElement.innerHTML='<div class=\'cert-placeholder\'><i class=\'bi bi-palette-fill\'></i><span>UI/UX Design</span></div>'" />
        </div>
        <div class="cert-diag-info">
          <small>Google · 2024</small>
          <h4>UI/UX Design</h4>
          <p>Fondamentaux du design d'interface et expérience utilisateur</p>
        </div>
      </article>

      <article class="cert-diag-card">
        <div class="cert-diag-img">
          <img src="{{ asset('images/cert_ia.png') }}" alt="Certificat IA" onerror="this.parentElement.innerHTML='<div class=\'cert-placeholder\'><i class=\'bi bi-robot\'></i><span>IA Générative</span></div>'" />
        </div>
        <div class="cert-diag-info">
          <small>FuturCraft · 2024</small>
          <h4>IA Générative</h4>
          <p>Usages concrets de l'IA générative et productivité numérique</p>
        </div>
      </article>

      <article class="cert-diag-card">
        <div class="cert-diag-img">
          <img src="{{ asset('images/cert_maintenance.png') }}" alt="Certificat Maintenance" onerror="this.parentElement.innerHTML='<div class=\'cert-placeholder\'><i class=\'bi bi-laptop\'></i><span>Maintenance</span></div>'" />
        </div>
        <div class="cert-diag-info">
          <small>SENANTIC · 2025</small>
          <h4>Maintenance Informatique</h4>
          <p>Support technique et maintenance d'équipements</p>
        </div>
      </article>

      <article class="cert-diag-card">
        <div class="cert-diag-img">
          <img src="{{ asset('images/cert_sil.png') }}" alt="Licence SIL" onerror="this.parentElement.innerHTML='<div class=\'cert-placeholder\'><i class=\'bi bi-file-earmark-check\'></i><span>Licence SIL</span></div>'" />
        </div>
        <div class="cert-diag-info">
          <small>UATM GASA · 2024-2026</small>
          <h4>Licence SIL</h4>
          <p>Systèmes Informatiques et Logiciels — L2</p>
        </div>
      </article>
    </div>
  </div>
</section>

<style>
  .cert-diagonal-wrap{
    overflow:hidden;width:100vw;position:relative;
    padding:40px 0;
    /* clip to show only the diagonal movement area */
    height:420px;
  }
  .cert-diagonal-track{
    display:flex;gap:28px;width:max-content;
    animation:certDiagScroll 25s linear infinite;
    /* start from bottom-left, move to top-right */
    transform:rotate(-8deg) translateX(0);
    transform-origin:center center;
  }
  .cert-diag-card{
    min-width:260px;max-width:260px;flex-shrink:0;
    background:rgba(255,255,255,.06);
    border:1px solid rgba(255,255,255,.1);
    border-radius:16px;overflow:hidden;
    transition:all .3s;
  }
  .cert-diag-card:hover{
    border-color:var(--yellow);
    transform:translateY(-6px);
    box-shadow:0 16px 48px rgba(255,215,0,.15);
  }
  .cert-diag-img{
    width:100%;height:170px;overflow:hidden;
    background:rgba(0,0,0,.2);
    display:grid;place-items:center;
  }
  .cert-diag-img img{width:100%;height:100%;object-fit:cover}
  .cert-placeholder{
    display:flex;flex-direction:column;align-items:center;gap:8px;
    color:var(--muted);
  }
  .cert-placeholder i{font-size:2.5rem;color:var(--yellow)}
  .cert-placeholder span{font-size:.85rem;font-weight:500}
  .cert-diag-info{padding:16px;display:flex;flex-direction:column;gap:4px}
  .cert-diag-info small{font-family:var(--font-mono);font-size:.7rem;color:var(--accent);text-transform:uppercase;letter-spacing:.08em}
  .cert-diag-info h4{font-size:.95rem;color:var(--white);margin:0}
  .cert-diag-info p{font-size:.8rem;color:var(--muted);line-height:1.4;margin:0}

  @keyframes certDiagScroll{
    0%{transform:rotate(-8deg) translateX(0)}
    100%{transform:rotate(-8deg) translateX(-50%)}
  }

  body.light .cert-diag-card{background:rgba(255,255,255,.7);border-color:rgba(0,0,0,.08)}
  body.light .cert-diag-card:hover{border-color:var(--yellow);box-shadow:0 16px 48px rgba(255,215,0,.1)}
  body.light .cert-diag-info h4{color:var(--black)}
  body.light .cert-diag-info p{color:#475569}
  body.light .cert-placeholder{color:#64748b}
  body.light .cert-placeholder i{color:var(--yellow)}
</style>
@endsection

<!-- Navigation -->
<div style="text-align:center;margin-top:32px;">
  <a href="{{ route('home') }}" class="btn btn-outline" style="font-size:.85rem;padding:8px 16px;">
    <i class="bi bi-house-door"></i> Accueil
  </a>
</div>
