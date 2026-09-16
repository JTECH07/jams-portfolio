@extends('layouts.app')

@push('styles')
<style>
  .hero-bg-slider{position:absolute;inset:0;z-index:0;overflow:hidden}
  .hero-bg-slider .slide{
    position:absolute;inset:0;
    opacity:0;transition:opacity 1.2s ease;
  }
  .hero-bg-slider .slide.active{opacity:1}
  .hero-bg-slider .slide img{
    width:100%;height:100%;object-fit:cover;
    filter:brightness(.45) contrast(1.15) saturate(.9);
  }
  .hero-bg-slider::after{
    content:'';position:absolute;inset:0;z-index:1;
    background:linear-gradient(135deg,rgba(15,23,42,.75) 0%,rgba(15,23,42,.35) 50%,rgba(15,23,42,.8) 100%);
  }
  .hero-bg-dots{
    position:absolute;bottom:28px;left:50%;transform:translateX(-50%);z-index:5;
    display:flex;gap:10px;
  }
  .hero-bg-dots span{
    width:10px;height:10px;border-radius:50%;
    background:rgba(255,255,255,.25);cursor:pointer;transition:all .3s;
  }
  .hero-bg-dots span.active{background:var(--yellow);box-shadow:0 0 10px var(--yellow);transform:scale(1.3)}
</style>
@endpush

@section('content')
  {{-- ═══════════ HERO ═══════════ --}}
  <section class="section hero" id="home">
    <div class="hero-bg-slider" id="heroSlider">
      <div class="slide active"><img src="{{ asset('images/me_professionnel.png') }}" alt="" /></div>
      <div class="slide"><img src="{{ asset('images/me_coding.png') }}" alt="" /></div>
      <div class="slide"><img src="{{ asset('images/me_in_workspace.png') }}" alt="" /></div>
      <div class="slide"><img src="{{ asset('images/me_thinking.png') }}" alt="" /></div>
    </div>
    <div class="hero-bg-dots" id="heroDots"></div>

    <div class="wrap">
      <div class="hero-layout">
        {{-- LEFT --}}
        <div class="hero-left reveal">
          <div class="hero-tag">
            <span class="dot"></span> Disponible pour projets
          </div>
          <h1>Développeur Web<br/>&amp; Mobile</h1>
          <p class="hero-subtitle">Basé à Porto-Novo, Bénin</p>
          <div class="cursor-typing" id="cursorTyping">
            <span class="cursor-text" id="cursorText"></span><span class="cursor-bar">|</span>
          </div>
          <div class="btn-row" style="margin-top:28px;">
            <a class="btn btn-main" href="{{ asset('CV_Joseph_ALAYE.pdf') }}" target="_blank" rel="noopener">
              <i class="bi bi-download"></i> Mon CV
            </a>
            <a class="btn btn-outline" href="{{ route('projects') }}">
              <i class="bi bi-arrow-right"></i> Voir mes travaux
            </a>
            <a class="btn btn-outline" href="{{ route('contact') }}">
              <i class="bi bi-envelope"></i> Me contacter
            </a>
          </div>
        </div>

        {{-- CENTER IMAGE --}}
        <div class="hero-center reveal">
          <img src="{{ asset('images/me.png') }}" alt="Photo de Joseph ALAYE" onerror="this.src='{{ asset('images/mon_avatar.png') }}'" />
        </div>

        {{-- RIGHT --}}
        <div class="hero-right reveal">
          <p class="hero-intro-text">
            Hi, je suis <strong class="hero-name-highlight" id="heroNameTyped"></strong><span class="hero-name-cursor">|</span>
          </p>
          <p class="hero-role-text">développeur web &amp; mobile</p>
          <p>
            Passionné par la création d'expériences numériques fluides, performantes et utiles.
            Je combine rigueur logicielle, sens du détail UX/UI et communication fluide pour livrer des produits qui servent un objectif concret.
          </p>
          <div class="hero-tech-stack">
            <span class="tech-tag"><i class="bi bi-boxes"></i> Laravel</span>
            <span class="tech-tag"><i class="bi bi-phone"></i> Flutter</span>
            <span class="tech-tag"><i class="bi bi-filetype-py"></i> Python</span>
            <span class="tech-tag"><i class="bi bi-filetype-js"></i> JavaScript</span>
          </div>
          <div class="hero-cta-row" style="margin-top:24px;display:flex;gap:12px;flex-wrap:wrap;">
            <a class="holo-btn" href="{{ route('contact') }}">
              <span class="holo-btn-frame"></span>
              <span class="holo-btn-glow"></span>
              <span class="holo-btn-text"><i class="bi bi-envelope"></i> Me contacter</span>
            </a>
            <a class="holo-btn holo-btn-alt" href="{{ route('projects') }}">
              <span class="holo-btn-frame"></span>
              <span class="holo-btn-glow"></span>
              <span class="holo-btn-text"><i class="bi bi-arrow-right"></i> Projets</span>
            </a>
          </div>
        </div>

        <div class="hero-big-name" aria-hidden="true">JOSEPH</div>
      </div>
    </div>
  </section>

  {{-- ═══════════ WHAT I BRING ═══════════ --}}
  <section class="section home-value" style="background:var(--bg);border-top:1px solid var(--line);">
    <div class="wrap">
      <div class="section-head" style="text-align:center;margin-bottom:48px;">
        <p class="eyebrow" style="justify-content:center;color:var(--yellow);">
          <span style="width:32px;height:2px;background:var(--yellow);border-radius:2px;"></span>
          Pourquoi me faire confiance
        </p>
        <h2 style="text-align:center;">Des solutions digitales qui <span style="background:linear-gradient(135deg,var(--accent),var(--yellow));-webkit-background-clip:text;-webkit-text-fill-color:transparent;">font la différence</span></h2>
        <p style="text-align:center;max-width:640px;margin:12px auto 0;color:var(--muted);">Je ne me contente pas de coder. Je comprends votre besoin, je le traduis en une solution concrète et je l'accompagne jusqu'à la livraison.</p>
      </div>

      <div class="value-grid">
        <div class="value-card glass reveal">
          <div class="value-icon" style="background:rgba(37,99,235,.1);border-color:rgba(37,99,235,.25);">
            <i class="bi bi-lightning-charge-fill" style="color:var(--accent);font-size:1.5rem;"></i>
          </div>
          <h4 style="color:var(--white);margin-bottom:8px;">Livraison rapide</h4>
          <p style="color:var(--muted);font-size:.9rem;">Des délais clairs et un suivi régulier. Vous savez toujours où en est votre projet.</p>
        </div>
        <div class="value-card glass reveal">
          <div class="value-icon" style="background:rgba(6,182,212,.1);border-color:rgba(6,182,212,.25);">
            <i class="bi bi-phone-fill" style="color:var(--accent-2);font-size:1.5rem;"></i>
          </div>
          <h4 style="color:var(--white);margin-bottom:8px;">Mobile-first</h4>
          <p style="color:var(--muted);font-size:.9rem;">Chaque interface est pensée pour fonctionner parfaitement sur mobile comme sur desktop.</p>
        </div>
        <div class="value-card glass reveal">
          <div class="value-icon" style="background:rgba(255,215,0,.1);border-color:rgba(255,215,0,.25);">
            <i class="bi bi-braces-asterisk" style="color:var(--yellow);font-size:1.5rem;"></i>
          </div>
          <h4 style="color:var(--white);margin-bottom:8px;">Code propre</h4>
          <p style="color:var(--muted);font-size:.9rem;">Architecture maintenable, documentation claire, bonnes pratiques respectées.</p>
        </div>
        <div class="value-card glass reveal">
          <div class="value-icon" style="background:rgba(16,185,129,.1);border-color:rgba(16,185,129,.25);">
            <i class="bi bi-people-fill" style="color:var(--ok);font-size:1.5rem;"></i>
          </div>
          <h4 style="color:var(--white);margin-bottom:8px;">Communication fluide</h4>
          <p style="color:var(--muted);font-size:.9rem;">Écoute active, retours clairs et posture collaborative tout au long du projet.</p>
        </div>
      </div>

      <div style="text-align:center;margin-top:40px;" class="reveal">
        <img src="{{ asset('images/binary-code-script.svg') }}" alt="Développeur au travail" style="max-width:480px;width:100%;margin:0 auto;opacity:.85;filter:brightness(1.1);" onerror="this.style.display='none'" />
      </div>
    </div>
  </section>

  {{-- ═══════════ FACTS ═══════════ --}}
  <section class="section" style="padding:60px 0;background:var(--bg-soft);border-top:1px solid var(--line);border-bottom:1px solid var(--line);">
    <div class="wrap">
      <div class="facts">
        <article class="fact reveal" style="background:rgba(37,99,235,.08);border-color:rgba(37,99,235,.2);">
          <div class="n plus" data-count="20" style="color:var(--white);">0</div>
          <p style="color:var(--accent-2);">Projets réalisés</p>
        </article>
        <article class="fact reveal" style="background:rgba(255,215,0,.08);border-color:rgba(255,215,0,.2);">
          <div class="n" data-count="95" data-suffix="%" style="color:var(--white);">0</div>
          <p style="color:var(--yellow);">Clients satisfaits (%)</p>
        </article>
        <article class="fact reveal" style="background:rgba(255,215,0,.08);border-color:rgba(255,215,0,.2);">
          <div class="n plus" data-count="4" style="color:var(--white);">0</div>
          <p style="color:var(--yellow);">Services JAMS TECH</p>
        </article>
        <article class="fact reveal" style="background:rgba(6,182,212,.08);border-color:rgba(6,182,212,.2);">
          <div class="n plus" data-count="10" style="color:var(--white);">0</div>
          <p style="color:var(--accent-2);">Compétences clés</p>
        </article>
        <article class="fact reveal" style="background:rgba(37,99,235,.08);border-color:rgba(37,99,235,.2);">
          <div class="n" data-count="3" style="color:var(--white);">0</div>
          <p style="color:var(--accent-2);">Années d'expérience</p>
        </article>
        <article class="fact reveal infinity" style="background:rgba(15,23,42,.8);">
          <div class="n">∞</div>
          <p style="color:var(--muted);">Ambition infinie</p>
        </article>
      </div>
    </div>
  </section>

  {{-- ═══════════ SKILLS PREVIEW ═══════════ --}}
  <section class="section" style="background:var(--bg);">
    <div class="wrap">
      <div class="section-head reveal" style="text-align:center;margin-bottom:40px;">
        <p class="eyebrow" style="justify-content:center;color:var(--accent);">
          <span style="width:32px;height:2px;background:var(--accent);border-radius:2px;"></span>
          Compétences
        </p>
        <h2 style="text-align:center;">Mon arsenal technique</h2>
        <p style="text-align:center;max-width:560px;margin:12px auto 0;color:var(--muted);">Les technologies que je maîtrise pour construire des produits solides et scalables.</p>
      </div>

      <div class="marquee-wrap">
        <div class="marquee-track">
          <div class="home-skill-pill glass"><i class="bi bi-filetype-html" style="color:#E34F26;font-size:1.4rem;"></i><span>HTML5</span></div>
          <div class="home-skill-pill glass"><i class="bi bi-filetype-css" style="color:#264DE4;font-size:1.4rem;"></i><span>CSS3</span></div>
          <div class="home-skill-pill glass"><i class="bi bi-filetype-js" style="color:#F7DF1E;font-size:1.4rem;"></i><span>JavaScript</span></div>
          <div class="home-skill-pill glass"><i class="bi bi-filetype-php" style="color:#777BB4;font-size:1.4rem;"></i><span>PHP</span></div>
          <div class="home-skill-pill glass"><i class="bi bi-boxes" style="color:#FF2D20;font-size:1.4rem;"></i><span>Laravel</span></div>
          <div class="home-skill-pill glass"><i class="bi bi-phone" style="color:#02569B;font-size:1.4rem;"></i><span>Flutter</span></div>
          <div class="home-skill-pill glass"><i class="bi bi-filetype-java" style="color:#007396;font-size:1.4rem;"></i><span>Java</span></div>
          <div class="home-skill-pill glass"><i class="bi bi-database" style="color:#4479A1;font-size:1.4rem;"></i><span>MySQL</span></div>
          <div class="home-skill-pill glass"><i class="bi bi-database" style="color:#336791;font-size:1.4rem;"></i><span>PostgreSQL</span></div>
          <div class="home-skill-pill glass"><i class="bi bi-git" style="color:#F05032;font-size:1.4rem;"></i><span>Git</span></div>
          <div class="home-skill-pill glass"><i class="bi bi-pen" style="color:#F24E1E;font-size:1.4rem;"></i><span>Figma</span></div>
          <div class="home-skill-pill glass"><i class="bi bi-filetype-py" style="color:#3776AB;font-size:1.4rem;"></i><span>Python</span></div>
          <div class="home-skill-pill glass"><i class="bi bi-braces" style="color:#9C27B0;font-size:1.4rem;"></i><span>C++</span></div>
          <div class="home-skill-pill glass"><i class="bi bi-phone" style="color:#0175C2;font-size:1.4rem;"></i><span>Dart</span></div>
          <div class="home-skill-pill glass"><i class="bi bi-wordpress" style="color:#21759B;font-size:1.4rem;"></i><span>WordPress</span></div>
          {{-- Duplicate for seamless loop --}}
          <div class="home-skill-pill glass"><i class="bi bi-filetype-html" style="color:#E34F26;font-size:1.4rem;"></i><span>HTML5</span></div>
          <div class="home-skill-pill glass"><i class="bi bi-filetype-css" style="color:#264DE4;font-size:1.4rem;"></i><span>CSS3</span></div>
          <div class="home-skill-pill glass"><i class="bi bi-filetype-js" style="color:#F7DF1E;font-size:1.4rem;"></i><span>JavaScript</span></div>
          <div class="home-skill-pill glass"><i class="bi bi-filetype-php" style="color:#777BB4;font-size:1.4rem;"></i><span>PHP</span></div>
          <div class="home-skill-pill glass"><i class="bi bi-boxes" style="color:#FF2D20;font-size:1.4rem;"></i><span>Laravel</span></div>
          <div class="home-skill-pill glass"><i class="bi bi-phone" style="color:#02569B;font-size:1.4rem;"></i><span>Flutter</span></div>
          <div class="home-skill-pill glass"><i class="bi bi-filetype-java" style="color:#007396;font-size:1.4rem;"></i><span>Java</span></div>
          <div class="home-skill-pill glass"><i class="bi bi-database" style="color:#4479A1;font-size:1.4rem;"></i><span>MySQL</span></div>
          <div class="home-skill-pill glass"><i class="bi bi-database" style="color:#336791;font-size:1.4rem;"></i><span>PostgreSQL</span></div>
          <div class="home-skill-pill glass"><i class="bi bi-git" style="color:#F05032;font-size:1.4rem;"></i><span>Git</span></div>
          <div class="home-skill-pill glass"><i class="bi bi-pen" style="color:#F24E1E;font-size:1.4rem;"></i><span>Figma</span></div>
          <div class="home-skill-pill glass"><i class="bi bi-filetype-py" style="color:#3776AB;font-size:1.4rem;"></i><span>Python</span></div>
          <div class="home-skill-pill glass"><i class="bi bi-braces" style="color:#9C27B0;font-size:1.4rem;"></i><span>C++</span></div>
          <div class="home-skill-pill glass"><i class="bi bi-phone" style="color:#0175C2;font-size:1.4rem;"></i><span>Dart</span></div>
          <div class="home-skill-pill glass"><i class="bi bi-wordpress" style="color:#21759B;font-size:1.4rem;"></i><span>WordPress</span></div>
        </div>
      </div>

      <div style="text-align:center;margin-top:32px;" class="reveal">
        <a class="btn btn-outline" href="{{ route('skills') }}">
          <i class="bi bi-arrow-right"></i> Voir toutes les compétences
        </a>
      </div>

      <div class="home-code-visual reveal" style="margin-top:48px;">
        <img src="https://illustrations.popsy.co/white/coding.svg" alt="Code" style="max-width:360px;width:100%;margin:0 auto;display:block;opacity:.7;" onerror="this.style.display='none'" />
      </div>
    </div>
  </section>

  {{-- ═══════════ SERVICES PREVIEW ═══════════ --}}
  <section class="section" style="background:var(--bg-soft);border-top:1px solid var(--line);border-bottom:1px solid var(--line);">
    <div class="wrap">
      <div class="section-head reveal" style="text-align:center;margin-bottom:40px;">
        <p class="eyebrow" style="justify-content:center;color:var(--accent-2);">
          <span style="width:32px;height:2px;background:var(--accent-2);border-radius:2px;"></span>
          Services
        </p>
        <h2 style="text-align:center;">Ce que je peux faire pour vous</h2>
      </div>

      <div class="home-services-grid">
        <div class="home-service-card glass reveal">
          <div class="futuristic-glow" style="width:52px;height:52px;border-radius:12px;">
            <i class="bi bi-globe2" style="color:var(--accent-2);font-size:1.3rem;"></i>
          </div>
          <h4 style="color:var(--white);margin-top:8px;">Sites Web</h4>
          <p style="color:var(--muted);font-size:.88rem;">Sites vitrines, e-commerce, plateformes — de la maquette au déploiement.</p>
        </div>
        <div class="home-service-card glass reveal">
          <div class="futuristic-glow" style="width:52px;height:52px;border-radius:12px;">
            <i class="bi bi-phone-fill" style="color:var(--accent-2);font-size:1.3rem;"></i>
          </div>
          <h4 style="color:var(--white);margin-top:8px;">Applications Mobile</h4>
          <p style="color:var(--muted);font-size:.88rem;">Apps natives et cross-platform avec Flutter pour iOS et Android.</p>
        </div>
        <div class="home-service-card glass reveal">
          <div class="futuristic-glow" style="width:52px;height:52px;border-radius:12px;">
            <i class="bi bi-palette-fill" style="color:var(--accent-2);font-size:1.3rem;"></i>
          </div>
          <h4 style="color:var(--white);margin-top:8px;">UI/UX Design</h4>
          <p style="color:var(--muted);font-size:.88rem;">Interfaces intuitives et esthétiques centrées sur l'expérience utilisateur.</p>
        </div>
        <div class="home-service-card glass reveal">
          <div class="futuristic-glow" style="width:52px;height:52px;border-radius:12px;">
            <i class="bi bi-robot" style="color:var(--accent-2);font-size:1.3rem;"></i>
          </div>
          <h4 style="color:var(--white);margin-top:8px;">IA & Automatisation</h4>
          <p style="color:var(--muted);font-size:.88rem;">Intégration d'IA et automatisation de workflows pour optimiser vos process.</p>
        </div>
      </div>

      <div style="text-align:center;margin-top:36px;" class="reveal">
        <a class="btn btn-outline" href="{{ route('services') }}">
          <i class="bi bi-arrow-right"></i> Découvrir tous les services
        </a>
      </div>
    </div>
  </section>

  {{-- ═══════════ PROJECTS PREVIEW (Marquee) ═══════════ --}}
  <section class="section" style="background:var(--bg);">
    <div class="wrap">
      <div class="section-head reveal" style="text-align:center;margin-bottom:40px;">
        <p class="eyebrow" style="justify-content:center;color:var(--ok);">
          <span style="width:32px;height:2px;background:var(--ok);border-radius:2px;"></span>
          Projets
        </p>
        <h2 style="text-align:center;">Mes réalisations récentes</h2>
        <p style="text-align:center;max-width:560px;margin:12px auto 0;color:var(--muted);">Une sélection de projets qui montrent mon approche et ma capacité à livrer des solutions complètes.</p>
      </div>
    </div>

    <div class="marquee-wrap" style="padding:10px 0 30px;">
      <div class="marquee-track projects-marquee" style="animation-duration:40s;">
        <article class="home-project-card glass">
          <figure><img src="{{ asset('images/desktop_code.jpg') }}" alt="Green World Builders" /></figure>
          <div class="home-project-body">
            <div class="tags"><span>MySQL</span><span>PHP</span></div>
            <h4>Green World Builders</h4>
            <p>Plateforme web avec gestion de produits, commandes et dashboard analytique.</p>
          </div>
        </article>
        <article class="home-project-card glass">
          <figure><img src="{{ asset('images/recognize_face.png') }}" alt="Reconnaissance faciale" /></figure>
          <div class="home-project-body">
            <div class="tags"><span>Python</span><span>OpenCV</span><span>ML</span></div>
            <h4>Reconnaissance faciale</h4>
            <p>Système de vision par ordinateur pour vérification d'identité.</p>
          </div>
        </article>
        <article class="home-project-card glass">
          <figure><img src="{{ asset('images/code.jpg') }}" alt="Agrimarket" /></figure>
          <div class="home-project-body">
            <div class="tags"><span>PHP</span><span>MySQL</span></div>
            <h4>Agrimarket</h4>
            <p>E-commerce connectant producteurs agro et restaurants.</p>
          </div>
        </article>
        <article class="home-project-card glass">
          <figure><img src="{{ asset('images/laptop_code.jpg') }}" alt="App scolarité" /></figure>
          <div class="home-project-body">
            <div class="tags"><span>Dart</span><span>Flutter</span></div>
            <h4>Gestion scolarité</h4>
            <p>App mobile pour la gestion des paiements étudiants.</p>
          </div>
        </article>
        <article class="home-project-card glass">
          <figure><img src="{{ asset('images/desktop_code.jpg') }}" alt="Bibliothèques" /></figure>
          <div class="home-project-body">
            <div class="tags"><span>Laravel</span><span>SQL</span></div>
            <h4>Gestion bibliothèques</h4>
            <p>Système de suivi des ouvrages et emprunts.</p>
          </div>
        </article>
        <article class="home-project-card glass">
          <figure><img src="{{ asset('images/desktop_code.jpg') }}" alt="Le Verger" /></figure>
          <div class="home-project-body">
            <div class="tags"><span>HTML</span><span>CSS</span><span>JS</span></div>
            <h4>Site Le Verger</h4>
            <p>Site web pour le Complexe Scolaire Le Verger.</p>
          </div>
        </article>
        <article class="home-project-card glass">
          <figure><img src="{{ asset('images/code.jpg') }}" alt="CRUD posts" /></figure>
          <div class="home-project-body">
            <div class="tags"><span>Laravel</span><span>PHP</span></div>
            <h4>CRUD de posts</h4>
            <p>Application Laravel pour la gestion de contenus.</p>
          </div>
        </article>
        <article class="home-project-card glass">
          <figure><img src="{{ asset('images/laptop_code.jpg') }}" alt="Authentification" /></figure>
          <div class="home-project-body">
            <div class="tags"><span>Laravel</span><span>Mail</span></div>
            <h4>Authentification + mail</h4>
            <p>Inscription sécurisée avec confirmation par e-mail.</p>
          </div>
        </article>
        {{-- Duplicates for seamless loop --}}
        <article class="home-project-card glass">
          <figure><img src="{{ asset('images/desktop_code.jpg') }}" alt="Green World Builders" /></figure>
          <div class="home-project-body">
            <div class="tags"><span>MySQL</span><span>PHP</span></div>
            <h4>Green World Builders</h4>
            <p>Plateforme web avec gestion de produits, commandes et dashboard analytique.</p>
          </div>
        </article>
        <article class="home-project-card glass">
          <figure><img src="{{ asset('images/recognize_face.png') }}" alt="Reconnaissance faciale" /></figure>
          <div class="home-project-body">
            <div class="tags"><span>Python</span><span>OpenCV</span><span>ML</span></div>
            <h4>Reconnaissance faciale</h4>
            <p>Système de vision par ordinateur pour vérification d'identité.</p>
          </div>
        </article>
        <article class="home-project-card glass">
          <figure><img src="{{ asset('images/code.jpg') }}" alt="Agrimarket" /></figure>
          <div class="home-project-body">
            <div class="tags"><span>PHP</span><span>MySQL</span></div>
            <h4>Agrimarket</h4>
            <p>E-commerce connectant producteurs agro et restaurants.</p>
          </div>
        </article>
        <article class="home-project-card glass">
          <figure><img src="{{ asset('images/laptop_code.jpg') }}" alt="App scolarité" /></figure>
          <div class="home-project-body">
            <div class="tags"><span>Dart</span><span>Flutter</span></div>
            <h4>Gestion scolarité</h4>
            <p>App mobile pour la gestion des paiements étudiants.</p>
          </div>
        </article>
        <article class="home-project-card glass">
          <figure><img src="{{ asset('images/desktop_code.jpg') }}" alt="Bibliothèques" /></figure>
          <div class="home-project-body">
            <div class="tags"><span>Laravel</span><span>SQL</span></div>
            <h4>Gestion bibliothèques</h4>
            <p>Système de suivi des ouvrages et emprunts.</p>
          </div>
        </article>
        <article class="home-project-card glass">
          <figure><img src="{{ asset('images/desktop_code.jpg') }}" alt="Le Verger" /></figure>
          <div class="home-project-body">
            <div class="tags"><span>HTML</span><span>CSS</span><span>JS</span></div>
            <h4>Site Le Verger</h4>
            <p>Site web pour le Complexe Scolaire Le Verger.</p>
          </div>
        </article>
      </div>
    </div>

    <div style="text-align:center;margin-top:10px;" class="wrap reveal">
      <a class="btn btn-main" href="{{ route('projects') }}">
        <i class="bi bi-grid-3x3-gap"></i> Voir tous les projets (15+)
      </a>
    </div>
  </section>

  {{-- ═══════════ CTA BANNER ═══════════ --}}
  <section class="section" style="background:var(--bg-soft);border-top:1px solid var(--line);border-bottom:1px solid var(--line);padding:60px 0;">
    <div class="wrap" style="text-align:center;">
      <div class="reveal">
        <img src="https://illustrations.popsy.co/white/contact-us.svg" alt="Contact" style="max-width:280px;width:100%;margin:0 auto 24px;display:block;opacity:.8;" onerror="this.style.display='none'" />
        <h2 style="margin-bottom:12px;">Un projet en tête ?</h2>
        <p style="color:var(--muted);max-width:480px;margin:0 auto 28px;font-size:1.05rem;">Parlons-en. Je suis disponible pour des missions freelance, des stages et des collaborations.</p>
        <div class="btn-row" style="justify-content:center;">
          <a class="btn btn-main" href="{{ route('contact') }}">
            <i class="bi bi-envelope"></i> Démarrer un projet
          </a>
          <a class="btn btn-outline" href="https://wa.me/22969423587" target="_blank">
            <i class="bi bi-whatsapp"></i> WhatsApp
          </a>
        </div>
      </div>
    </div>
  </section>
@endsection
