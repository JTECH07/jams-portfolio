@extends('layouts.app')

@php
  $devicon = fn ($name) => "https://cdn.jsdelivr.net/gh/devicons/devicon/icons/{$name}/{$name}-original.svg";

  $categories = [
    [
      'title' => 'Frontend',
      'icon' => 'bi-window-stack',
      'desc' => 'Interfaces rapides, accessibles et responsives.',
      'techs' => [
        ['React', 'react'], ['JavaScript', 'javascript'], ['HTML5', 'html5'],
        ['CSS3', 'css3'], ['Tailwind', 'tailwindcss'], ['Bootstrap', 'bootstrap'],
      ],
    ],
    [
      'title' => 'Backend',
      'icon' => 'bi-diagram-3',
      'desc' => 'APIs solides et logique métier maintenable.',
      'techs' => [
        ['Laravel', 'laravel'], ['PHP', 'php'], ['Python', 'python'],
        ['Node.js', 'nodejs'], ['Java', 'java'], ['C++', 'cplusplus'],
      ],
    ],
    [
      'title' => 'Mobile & Data',
      'icon' => 'bi-phone',
      'desc' => 'Applications mobiles et données structurées.',
      'techs' => [
        ['Flutter', 'flutter'], ['Dart', 'dart'], ['MySQL', 'mysql'],
        ['PostgreSQL', 'postgresql'], ['MongoDB', 'mongodb'],
      ],
    ],
    [
      'title' => 'Outils & Design',
      'icon' => 'bi-bezier2',
      'desc' => 'Un workflow propre, du design au déploiement.',
      'techs' => [
        ['Git', 'git'], ['GitHub', 'github'], ['Docker', 'docker'],
        ['Figma', 'figma'], ['Vite', 'vitejs'],
      ],
    ],
  ];

  $capabilities = [
    ['bi-diagram-2', 'Développer de bout en bout', 'De la maquette à la mise en ligne : front, back, base de données et déploiement.'],
    ['bi-shield-lock', 'Concevoir des APIs fiables', 'Endpoints clairs, validation, authentification et documentation pour des intégrations sereines.'],
    ['bi-cpu', 'Intégrer l’IA & automatiser', 'Scripts, pipelines et intégrations LLM qui font gagner du temps sans casser l’existant.'],
    ['bi-tools', 'Livrer un produit maintenable', 'Code lisible, tests ciblés et documentation : votre produit reste vivant après la livraison.'],
  ];
@endphp

@section('content')
<section class="section" id="skills" style="background:var(--bg);">
  <div class="page-bg" aria-hidden="true">
    <img src="{{ asset('images/bg/skills.jpg') }}" alt="" />
  </div>
  <div class="wrap">
    {{-- Hero --}}
    <div class="section-head reveal" style="text-align:center;max-width:760px;margin:0 auto 52px;">
      <p class="eyebrow" style="justify-content:center;"><span class="eyebrow-line"></span> Compétences</p>
      <h1 style="color:var(--white);font-size:clamp(2.2rem,5vw,3.6rem);margin-bottom:16px;">
        Une stack choisie pour <span style="color:var(--yellow);">construire</span>
      </h1>
      <p style="color:var(--muted);font-size:1.05rem;line-height:1.8;">
        Pas une liste de logos : des technologies que j’utilise réellement pour livrer des
        produits fiables, du composant d’interface à la base de données.
      </p>
    </div>

    {{-- Catégories --}}
    <div class="skp-grid">
      @foreach ($categories as $category)
        <article class="glass skp-card reveal">
          <header class="skp-card-head">
            <span class="skp-card-icon"><i class="bi {{ $category['icon'] }}"></i></span>
            <div>
              <h3>{{ $category['title'] }}</h3>
              <p>{{ $category['desc'] }}</p>
            </div>
            <span class="skp-card-count">{{ str_pad(count($category['techs']), 2, '0', STR_PAD_LEFT) }}</span>
          </header>

          <ul class="skp-chips">
            @foreach ($category['techs'] as [$name, $icon])
              <li class="skp-chip">
                <span class="skp-chip-icon">
                  <img src="{{ $devicon($icon) }}" alt="" loading="lazy" decoding="async" />
                </span>
                <span>{{ $name }}</span>
              </li>
            @endforeach
          </ul>
        </article>
      @endforeach
    </div>

    {{-- En pratique : visuel à gauche + fond + lien services --}}
    <div class="skp-practice reveal" id="en-pratique">
      <div class="skp-practice-bg" aria-hidden="true">
        <img src="{{ asset('images/bg/skills-practice.jpg') }}" alt="" loading="lazy" />
      </div>
      <div class="skp-practice-inner">
        <figure class="skp-practice-visual">
          <img src="{{ asset('images/services.svg') }}" alt="Illustration des services proposés" loading="lazy" />
        </figure>
        <div class="skp-practice-copy">
          <p class="eyebrow" style="margin-bottom:10px;"><span class="eyebrow-line"></span> En pratique</p>
          <h2>Ce que je sais faire avec ces outils</h2>
          <p class="skp-practice-lead">
            Des compétences testées sur des projets réels : interfaces, API, applications mobiles
            et automatisations. Chaque outil est choisi pour résoudre un problème concret.
          </p>
          <div class="skp-cap-grid">
            @foreach ($capabilities as [$icon, $title, $desc])
              <article class="skp-cap">
                <span class="skp-cap-icon"><i class="bi {{ $icon }}"></i></span>
                <h4>{{ $title }}</h4>
                <p>{{ $desc }}</p>
              </article>
            @endforeach
          </div>
          <div class="btn-row" style="margin-top:24px;">
            <a href="{{ route('services') }}" class="btn btn-main"><i class="bi bi-briefcase-fill"></i> Découvrir mes services</a>
            <a href="{{ route('contact') }}" class="btn btn-outline"><i class="bi bi-send-fill"></i> Me contacter</a>
          </div>
        </div>
      </div>
    </div>

    {{-- Note veille --}}
    <div class="skp-note reveal">
      <i class="bi bi-lightning-charge-fill"></i>
      <p>
        <strong>Toujours en veille.</strong> J’apprends une technologie quand elle sert réellement
        le produit — pas pour cocher une case sur un CV. Aujourd’hui, j’approfondis l’IA appliquée
        et l’automatisation.
      </p>
    </div>

    {{-- CTA --}}
    <div class="skp-cta reveal">
      <div>
        <h2 style="color:var(--white);font-size:clamp(1.6rem,3vw,2.2rem);margin-bottom:6px;">Besoin de ces compétences ?</h2>
        <p style="color:var(--muted);font-size:.95rem;">Parlons de votre projet ou de l’équipe que vous voulez renforcer.</p>
      </div>
      <div class="btn-row">
        <a href="{{ route('contact') }}" class="btn btn-main"><i class="bi bi-envelope-fill"></i> Me contacter</a>
        <a href="{{ route('projects') }}" class="btn btn-outline"><i class="bi bi-grid-fill"></i> Voir mes projets</a>
      </div>
    </div>
  </div>
</section>

<style>
  .skp-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:20px}
  .skp-card{padding:26px;border-radius:18px;transition:transform .3s ease,border-color .3s ease}
  .skp-card:hover{transform:translateY(-4px);border-color:var(--accent)}
  .skp-card-head{display:flex;align-items:flex-start;gap:14px;margin-bottom:20px}
  .skp-card-icon{
    display:grid;place-items:center;width:44px;height:44px;flex-shrink:0;border-radius:12px;
    background:var(--gold-soft);color:var(--accent);font-size:1.15rem;
  }
  .skp-card-head h3{color:var(--white);font-size:1.12rem;margin-bottom:2px}
  .skp-card-head p{color:var(--muted);font-size:.84rem;line-height:1.5;margin:0}
  .skp-card-count{margin-left:auto;font-family:var(--font-mono);font-size:.72rem;color:var(--accent);opacity:.7}

  .skp-chips{display:flex;flex-wrap:wrap;gap:10px}
  .skp-chip{
    display:inline-flex;align-items:center;gap:8px;padding:8px 12px;border-radius:11px;
    border:1px solid var(--line);background:var(--surface-light);
    color:var(--text);font-size:.84rem;font-weight:500;
    transition:border-color .3s ease,background .3s ease,transform .3s ease;
  }
  .skp-chip:hover{border-color:rgba(232,197,71,.5);background:var(--gold-subtle);transform:translateY(-2px)}
  .skp-chip-icon{display:grid;place-items:center;width:22px;height:22px}
  .skp-chip-icon img{width:18px;height:18px;object-fit:contain}

  .skp-cap-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:18px}
  .skp-cap{
    padding:26px;border-radius:16px;
    border:1px solid var(--line);background:var(--surface-light);
  }
  .skp-cap-icon{
    display:grid;place-items:center;width:42px;height:42px;border-radius:12px;
    background:var(--gold-soft);color:var(--accent);font-size:1.1rem;margin-bottom:16px;
  }
  .skp-cap h4{color:var(--white);font-size:1rem;margin-bottom:8px}
  .skp-cap p{color:var(--muted);font-size:.87rem;line-height:1.65;margin:0}

  /* En pratique */
  .skp-practice{
    position:relative;margin-top:80px;border-radius:24px;overflow:hidden;
    border:1px solid var(--line);background:var(--surface);
  }
  .skp-practice-bg{position:absolute;inset:0;z-index:0;pointer-events:none}
  .skp-practice-bg img{
    width:100%;height:100%;object-fit:cover;opacity:.22;
    filter:grayscale(.3) brightness(.55);transform:scale(1.02);
  }
  .skp-practice::after{
    content:'';position:absolute;inset:0;z-index:0;pointer-events:none;
    background:linear-gradient(120deg,rgba(0,0,0,.82),rgba(0,0,0,.55));
  }
  .skp-practice-inner{
    position:relative;z-index:1;display:grid;
    grid-template-columns:minmax(0,.9fr) minmax(0,1.1fr);
    gap:40px;align-items:center;padding:44px;
  }
  .skp-practice-visual{
    margin:0;border-radius:18px;overflow:hidden;border:1px solid var(--line);
    background:rgba(255,255,255,.04);display:grid;place-items:center;padding:18px;
  }
  .skp-practice-visual img{
    width:100%;height:auto;max-height:420px;object-fit:contain;display:block;
  }
  .skp-practice-copy h2{
    color:var(--white);font-size:clamp(1.7rem,3vw,2.3rem);margin-bottom:12px;
  }
  .skp-practice-lead{
    color:var(--muted);font-size:.95rem;line-height:1.75;margin-bottom:22px;max-width:560px;
  }
  .skp-practice .skp-cap-grid{grid-template-columns:repeat(2,1fr);gap:14px}
  .skp-practice .skp-cap{
    padding:18px;background:rgba(255,255,255,.05);
    backdrop-filter:blur(6px);-webkit-backdrop-filter:blur(6px);
  }
  .skp-practice .skp-cap-icon{width:36px;height:36px;font-size:.95rem;margin-bottom:12px}
  .skp-practice .skp-cap h4{font-size:.95rem}
  .skp-practice .skp-cap p{font-size:.82rem}

  body.light .skp-practice{background:rgba(255,255,255,.75);border-color:rgba(0,0,0,.08)}
  body.light .skp-practice-bg img{opacity:.16;filter:grayscale(.1) brightness(1)}
  body.light .skp-practice::after{
    background:linear-gradient(120deg,rgba(250,250,250,.92),rgba(250,250,250,.74));
  }
  body.light .skp-practice-visual{background:rgba(255,255,255,.7);border-color:rgba(0,0,0,.08)}
  body.light .skp-practice-lead{color:#475569}
  body.light .skp-practice .skp-cap{background:rgba(255,255,255,.7);border-color:rgba(0,0,0,.08)}

  .skp-note{
    display:flex;align-items:flex-start;gap:14px;margin-top:28px;padding:22px 26px;
    border-radius:16px;border:1px solid var(--line);background:var(--surface-light);
  }
  .skp-note i{color:var(--accent);font-size:1.2rem;margin-top:2px}
  .skp-note p{color:var(--muted);font-size:.9rem;line-height:1.7;margin:0}
  .skp-note strong{color:var(--white)}

  .skp-cta{
    display:flex;align-items:center;justify-content:space-between;gap:24px;flex-wrap:wrap;
    margin-top:24px;padding:32px 36px;border-radius:20px;
    background:var(--gold-subtle);border:1px solid rgba(232,197,71,.25);
  }

  @media(max-width:900px){
    .skp-grid,.skp-cap-grid{grid-template-columns:1fr}
    .skp-cta{flex-direction:column;align-items:flex-start;text-align:left}
    .skp-practice-inner{grid-template-columns:1fr;gap:28px;padding:28px}
    .skp-practice-visual img{max-height:300px}
  }
  @media(max-width:560px){
    .skp-practice-inner{padding:22px}
    .skp-practice .skp-cap-grid{grid-template-columns:1fr}
  }
</style>
@endsection
