@extends('layouts.app')

@section('content')
<section class="section" id="services" style="background:var(--bg);">
  <div class="wrap">
    {{-- Hero --}}
    <div class="section-head reveal" style="text-align:center;max-width:760px;margin:0 auto 56px;">
      <p class="eyebrow" style="justify-content:center;"><span class="eyebrow-line"></span> Services</p>
      <h1 style="color:var(--white);font-size:clamp(2.2rem,5vw,3.6rem);margin-bottom:16px;">
        Des services pensés pour <span style="color:var(--yellow);">livrer des résultats</span>
      </h1>
      <p style="color:var(--muted);font-size:1.05rem;line-height:1.8;">
        De la première maquette au déploiement, je conçois des produits numériques clairs,
        rapides et maintenables. Chaque mission part d’un besoin réel — pas d’une technologie.
      </p>
      <div class="btn-row" style="justify-content:center;margin-top:28px;">
        <a href="{{ route('contact') }}" class="btn btn-main"><i class="bi bi-send-fill"></i> Discuter de votre projet</a>
        <a href="{{ route('projects') }}" class="btn btn-outline"><i class="bi bi-grid-fill"></i> Voir mes réalisations</a>
      </div>
    </div>

    {{-- Offres --}}
    <div class="svc-grid">
      <article class="glass svc-card reveal">
        <span class="svc-icon"><i class="bi bi-window-stack"></i></span>
        <h3>Développement Web Full-Stack</h3>
        <p>Sites vitrines, e-commerce, applications métier et API. Un socle solide, rapide et pensé pour durer.</p>
        <ul class="svc-list">
          <li><i class="bi bi-check2"></i> Laravel / PHP &amp; React</li>
          <li><i class="bi bi-check2"></i> Back-office et tableaux de bord</li>
          <li><i class="bi bi-check2"></i> API REST sécurisée</li>
          <li><i class="bi bi-check2"></i> Mise en ligne &amp; maintenance</li>
        </ul>
      </article>

      <article class="glass svc-card reveal">
        <span class="svc-icon"><i class="bi bi-phone"></i></span>
        <h3>Applications Mobiles</h3>
        <p>Des applications iOS et Android avec Flutter, connectées à vos services et pensées pour le terrain.</p>
        <ul class="svc-list">
          <li><i class="bi bi-check2"></i> Flutter / Dart</li>
          <li><i class="bi bi-check2"></i> Authentification &amp; notifications</li>
          <li><i class="bi bi-check2"></i> Intégration API</li>
          <li><i class="bi bi-check2"></i> Publication sur les stores</li>
        </ul>
      </article>

      <article class="glass svc-card reveal">
        <span class="svc-icon"><i class="bi bi-palette"></i></span>
        <h3>UI/UX Design</h3>
        <p>Des interfaces claires, esthétiques et pensées pour l’usage réel — pas seulement pour la démo.</p>
        <ul class="svc-list">
          <li><i class="bi bi-check2"></i> Wireframes &amp; parcours</li>
          <li><i class="bi bi-check2"></i> Design system</li>
          <li><i class="bi bi-check2"></i> Prototype interactif</li>
          <li><i class="bi bi-check2"></i> Revue d’utilisabilité</li>
        </ul>
      </article>

      <article class="glass svc-card reveal">
        <span class="svc-icon"><i class="bi bi-cpu"></i></span>
        <h3>IA &amp; Automatisation</h3>
        <p>Gagnez du temps et exploitez vos données grâce à des workflows intelligents et mesurables.</p>
        <ul class="svc-list">
          <li><i class="bi bi-check2"></i> Intégration LLM / IA</li>
          <li><i class="bi bi-check2"></i> Automatisation de tâches</li>
          <li><i class="bi bi-check2"></i> Traitement de données</li>
          <li><i class="bi bi-check2"></i> Tableaux de bord</li>
        </ul>
      </article>
    </div>

    {{-- Process --}}
    <div class="section-head reveal" style="text-align:center;margin:80px 0 32px;">
      <p class="eyebrow" style="justify-content:center;"><span class="eyebrow-line"></span> Méthode</p>
      <h2 style="color:var(--white);text-align:center;">Un processus simple et transparent</h2>
    </div>

    <div class="svc-process">
      <div class="svc-step reveal">
        <span class="svc-step-num">01</span>
        <h4>Découverte &amp; cadrage</h4>
        <p>Nous clarifions l’objectif, les utilisateurs et les contraintes. Vous repartez avec un périmètre précis.</p>
      </div>
      <div class="svc-step reveal">
        <span class="svc-step-num">02</span>
        <h4>Conception &amp; maquettes</h4>
        <p>Parcours, wireframes et prototype interactif : on valide l’expérience avant d’écrire le code.</p>
      </div>
      <div class="svc-step reveal">
        <span class="svc-step-num">03</span>
        <h4>Développement &amp; itérations</h4>
        <p>Des livraisons régulières et démontrables, avec des points courts pour garder le cap.</p>
      </div>
      <div class="svc-step reveal">
        <span class="svc-step-num">04</span>
        <h4>Livraison &amp; suivi</h4>
        <p>Mise en ligne, documentation et accompagnement. Le produit reste entretenu après la livraison.</p>
      </div>
    </div>

    {{-- Inclus --}}
    <div class="svc-included reveal">
      <div>
        <p class="eyebrow" style="margin-bottom:10px;"><span class="eyebrow-line"></span> Inclus</p>
        <h2 style="color:var(--white);font-size:clamp(1.6rem,3vw,2.2rem);margin-bottom:8px;">Ce que vous obtenez à chaque mission</h2>
        <p style="color:var(--muted);font-size:.95rem;">Pas de boîte noire : vous gardez la main sur votre produit.</p>
      </div>
      <ul class="svc-included-list">
        <li><i class="bi bi-code-square"></i> Code source complet</li>
        <li><i class="bi bi-book"></i> Documentation technique</li>
        <li><i class="bi bi-person-video3"></i> Prise en main / formation</li>
        <li><i class="bi bi-shield-check"></i> Corrections après livraison</li>
      </ul>
    </div>

    {{-- CTA --}}
    <div class="svc-cta reveal">
      <div>
        <h2 style="color:var(--white);font-size:clamp(1.6rem,3vw,2.2rem);margin-bottom:6px;">Un besoin précis ?</h2>
        <p style="color:var(--muted);font-size:.95rem;">Décrivez votre projet : je vous réponds avec une proposition claire sous 24h.</p>
      </div>
      <div class="btn-row">
        <a href="{{ route('contact') }}" class="btn btn-main"><i class="bi bi-envelope-fill"></i> Me contacter</a>
        <a href="https://wa.me/22969423587" target="_blank" rel="noopener" class="btn btn-outline"><i class="bi bi-whatsapp"></i> WhatsApp</a>
      </div>
    </div>
  </div>
</section>

<style>
  .svc-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:20px}
  .svc-card{padding:30px;border-radius:18px;transition:transform .3s ease,border-color .3s ease}
  .svc-card:hover{transform:translateY(-4px);border-color:var(--accent)}
  .svc-icon{
    display:grid;place-items:center;width:50px;height:50px;border-radius:14px;
    background:var(--gold-soft);color:var(--accent);font-size:1.35rem;margin-bottom:18px;
  }
  .svc-card h3{color:var(--white);font-size:1.2rem;margin-bottom:10px}
  .svc-card > p{color:var(--muted);font-size:.92rem;line-height:1.7;margin-bottom:16px}
  .svc-list{display:flex;flex-direction:column;gap:8px}
  .svc-list li{display:flex;align-items:center;gap:8px;color:var(--text);font-size:.86rem;opacity:.9}
  .svc-list i{color:var(--accent);font-size:.95rem}

  .svc-process{display:grid;grid-template-columns:repeat(4,1fr);gap:18px}
  .svc-step{padding:24px;border-radius:16px;border:1px solid var(--line);background:var(--surface-light)}
  .svc-step-num{
    display:block;font-family:var(--font-mono);font-size:.75rem;letter-spacing:.12em;
    color:var(--accent);margin-bottom:12px;
  }
  .svc-step h4{color:var(--white);font-size:1rem;margin-bottom:8px}
  .svc-step p{color:var(--muted);font-size:.85rem;line-height:1.6}

  .svc-included{
    display:flex;align-items:center;justify-content:space-between;gap:32px;flex-wrap:wrap;
    margin-top:56px;padding:32px 36px;border-radius:20px;
    background:var(--surface-light);border:1px solid var(--line);
  }
  .svc-included-list{display:grid;grid-template-columns:repeat(2,auto);gap:12px 28px}
  .svc-included-list li{display:flex;align-items:center;gap:9px;color:var(--text);font-size:.88rem}
  .svc-included-list i{color:var(--accent);font-size:1.05rem}

  .svc-cta{
    display:flex;align-items:center;justify-content:space-between;gap:24px;flex-wrap:wrap;
    margin-top:24px;padding:32px 36px;border-radius:20px;
    background:var(--gold-subtle);border:1px solid rgba(232,197,71,.25);
  }

  @media(max-width:900px){
    .svc-grid{grid-template-columns:1fr}
    .svc-process{grid-template-columns:repeat(2,1fr)}
    .svc-included,.svc-cta{flex-direction:column;align-items:flex-start;text-align:left}
    .svc-included-list{grid-template-columns:1fr}
  }
  @media(max-width:560px){
    .svc-process{grid-template-columns:1fr}
  }
</style>
@endsection
