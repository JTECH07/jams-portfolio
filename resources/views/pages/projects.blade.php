@extends('layouts.app')

@section('content')
<section class="section" id="projects" style="background: var(--bg);">
  <div class="wrap">
    <div class="section-head reveal">
      <p class="eyebrow" style="color: var(--accent-2);">Projets</p>
      <h2>Mes Réalisations</h2>
      <p>Travaux représentatifs de ma capacité à analyser un besoin, implémenter une solution et la rendre exploitable.</p>
    </div>

    {{-- Category filters --}}
    <div class="project-filters reveal" style="display:flex;flex-wrap:wrap;gap:10px;justify-content:center;margin-bottom:40px;">
      <button class="btn btn-outline filter-btn active" data-filter="all">Tous</button>
      <button class="btn btn-outline filter-btn" data-filter="site">Sites web</button>
      <button class="btn btn-outline filter-btn" data-filter="app-web">Applications web</button>
      <button class="btn btn-outline filter-btn" data-filter="app-mobile">Applications mobile</button>
      <button class="btn btn-outline filter-btn" data-filter="console">Projets Console</button>
      <button class="btn btn-outline filter-btn" data-filter="design">Design / Maquette</button>
    </div>

    <div class="home-projects-grid">
      {{-- SITES WEB --}}
      <article class="home-project-card glass reveal" data-cat="site">
        <figure><img src="{{ asset('images/desktop_code.jpg') }}" alt="Green World Builders" /></figure>
        <div class="home-project-body">
          <h4>Plateforme Green World Builders</h4>
          <p>Plateforme web avec gestion de produits, commandes et dashboard analytique pour initiatives écologiques.</p>
          <div class="tech-logos">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg" alt="PHP" title="PHP" />
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original.svg" alt="MySQL" title="MySQL" />
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/html5/html5-original.svg" alt="HTML5" title="HTML5" />
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/css3/css3-original.svg" alt="CSS3" title="CSS3" />
          </div>
          <div class="project-actions">
            <a class="btn btn-outline" href="http://greenworldbuilders.local" target="_blank"><i class="bi bi-globe"></i> Voir</a>
            <a class="btn btn-outline" href="{{ route('contact') }}"><i class="bi bi-chat-dots"></i> Demander</a>
          </div>
        </div>
      </article>

      <article class="home-project-card glass reveal" data-cat="site">
        <figure><img src="{{ asset('images/desktop_code.jpg') }}" alt="Gestion bibliothèques" /></figure>
        <div class="home-project-body">
          <h4>Gestion de bibliothèques</h4>
          <p>Système de suivi des ouvrages et emprunts pour améliorer la traçabilité opérationnelle.</p>
          <div class="tech-logos">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/laravel/laravel-original.svg" alt="Laravel" title="Laravel" />
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original.svg" alt="MySQL" title="MySQL" />
          </div>
          <div class="project-actions">
            <a class="btn btn-outline" href="http://biblio-gest.local" target="_blank"><i class="bi bi-globe"></i> Voir</a>
            <a class="btn btn-outline" href="{{ route('contact') }}"><i class="bi bi-chat-dots"></i> Demander</a>
          </div>
        </div>
      </article>

      <article class="home-project-card glass reveal" data-cat="site">
        <figure><img src="{{ asset('images/laptop_code.jpg') }}" alt="Le Verger" /></figure>
        <div class="home-project-body">
          <h4>Site Le Verger</h4>
          <p>Site web pour le Complexe Scolaire Le Verger, programmes éducatifs et activités.</p>
          <div class="tech-logos">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/html5/html5-original.svg" alt="HTML5" title="HTML5" />
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/css3/css3-original.svg" alt="CSS3" title="CSS3" />
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-original.svg" alt="JS" title="JavaScript" />
          </div>
          <div class="project-actions">
            <a class="btn btn-outline" href="https://github.com/JTECH07" target="_blank"><i class="bi bi-github"></i> Code</a>
            <a class="btn btn-outline" href="{{ route('contact') }}"><i class="bi bi-chat-dots"></i> Demander</a>
          </div>
        </div>
      </article>

      <article class="home-project-card glass reveal" data-cat="site">
        <figure><img src="{{ asset('images/desktop_code.jpg') }}" alt="Portfolio technicien" /></figure>
        <div class="home-project-body">
          <h4>Portfolio technicien agro</h4>
          <p>Site portfolio pour un technicien agro-industriel, compétences et réalisations.</p>
          <div class="tech-logos">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/html5/html5-original.svg" alt="HTML5" title="HTML5" />
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/css3/css3-original.svg" alt="CSS3" title="CSS3" />
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-original.svg" alt="JS" title="JavaScript" />
          </div>
          <div class="project-actions">
            <a class="btn btn-outline" href="https://israel-affodehou.netlify.app" target="_blank"><i class="bi bi-globe"></i> Voir</a>
            <a class="btn btn-outline" href="{{ route('contact') }}"><i class="bi bi-chat-dots"></i> Demander</a>
          </div>
        </div>
      </article>

      {{-- APPLICATIONS WEB --}}
      <article class="home-project-card glass reveal" data-cat="app-web">
        <figure><img src="{{ asset('images/code.jpg') }}" alt="Agrimarket" /></figure>
        <div class="home-project-body">
          <h4>Agrimarket</h4>
          <p>Plateforme e-commerce connectant producteurs agro et restaurants pour les échanges locaux.</p>
          <div class="tech-logos">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg" alt="PHP" title="PHP" />
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original.svg" alt="MySQL" title="MySQL" />
          </div>
          <div class="project-actions">
            <a class="btn btn-outline" href="http://agrimarket.local" target="_blank"><i class="bi bi-globe"></i> Voir</a>
            <a class="btn btn-outline" href="{{ route('contact') }}"><i class="bi bi-chat-dots"></i> Demander</a>
          </div>
        </div>
      </article>

      <article class="home-project-card glass reveal" data-cat="app-web">
        <figure><img src="{{ asset('images/code.jpg') }}" alt="CRUD posts" /></figure>
        <div class="home-project-body">
          <h4>Système CRUD de posts</h4>
          <p>Application Laravel structurée pour la gestion de contenus avec validation et base exploitable.</p>
          <div class="tech-logos">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/laravel/laravel-original.svg" alt="Laravel" title="Laravel" />
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg" alt="PHP" title="PHP" />
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original.svg" alt="MySQL" title="MySQL" />
          </div>
          <div class="project-actions">
            <a class="btn btn-outline" href="https://github.com/JTECH07" target="_blank"><i class="bi bi-github"></i> Code</a>
            <a class="btn btn-outline" href="{{ route('contact') }}"><i class="bi bi-chat-dots"></i> Demander</a>
          </div>
        </div>
      </article>

      <article class="home-project-card glass reveal" data-cat="app-web">
        <figure><img src="{{ asset('images/laptop_code.jpg') }}" alt="Authentification" /></figure>
        <div class="home-project-body">
          <h4>Authentification + e-mail</h4>
          <p>Flux d'inscription sécurisé avec confirmation par e-mail pour renforcer la sécurité d'accès.</p>
          <div class="tech-logos">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/laravel/laravel-original.svg" alt="Laravel" title="Laravel" />
          </div>
          <div class="project-actions">
            <a class="btn btn-outline" href="https://github.com/JTECH07" target="_blank"><i class="bi bi-github"></i> Code</a>
            <a class="btn btn-outline" href="{{ route('contact') }}"><i class="bi bi-chat-dots"></i> Demander</a>
          </div>
        </div>
      </article>

      <article class="home-project-card glass reveal" data-cat="app-web">
        <figure><img src="{{ asset('images/laptop_code.jpg') }}" alt="Gestion hôtel" /></figure>
        <div class="home-project-body">
          <h4>Gestion d'hôtel</h4>
          <p>Système de gestion hôtelière avec MERISE et SGBDR, réservations et services.</p>
          <div class="tech-logos">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original.svg" alt="MySQL" title="MySQL" />
          </div>
          <div class="project-actions">
            <a class="btn btn-outline" href="https://github.com/JTECH07" target="_blank"><i class="bi bi-github"></i> Code</a>
            <a class="btn btn-outline" href="{{ route('contact') }}"><i class="bi bi-chat-dots"></i> Demander</a>
          </div>
        </div>
      </article>

      <article class="home-project-card glass reveal" data-cat="app-web">
        <figure><img src="{{ asset('images/desktop_code.jpg') }}" alt="Initiatives JAMS TECH" /></figure>
        <div class="home-project-body">
          <h4>Initiatives JAMS TECH</h4>
          <p>Expériences web orientées service avec intégration IA pour accélérer la production.</p>
          <div class="tech-logos">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/html5/html5-original.svg" alt="HTML5" title="HTML5" />
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/css3/css3-original.svg" alt="CSS3" title="CSS3" />
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-original.svg" alt="JS" title="JavaScript" />
          </div>
          <div class="project-actions">
            <a class="btn btn-outline" href="https://github.com/JTECH07" target="_blank"><i class="bi bi-github"></i> Code</a>
            <a class="btn btn-outline" href="{{ route('contact') }}"><i class="bi bi-chat-dots"></i> Demander</a>
          </div>
        </div>
      </article>

      {{-- APPLICATIONS MOBILE --}}
      <article class="home-project-card glass reveal" data-cat="app-mobile">
        <figure><img src="{{ asset('images/laptop_code.jpg') }}" alt="Gestion scolarité" /></figure>
        <div class="home-project-body">
          <h4>Gestion paiements scolarité</h4>
          <p>App mobile Flutter pour la gestion des paiements étudiants à l'UATM GASA Formation.</p>
          <div class="tech-logos">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/flutter/flutter-original.svg" alt="Flutter" title="Flutter" />
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/dart/dart-original.svg" alt="Dart" title="Dart" />
          </div>
          <div class="project-actions">
            <a class="btn btn-outline" href="https://github.com/JTECH07/school_fees_management_app" target="_blank"><i class="bi bi-github"></i> Code</a>
            <a class="btn btn-outline" href="{{ route('contact') }}"><i class="bi bi-chat-dots"></i> Demander</a>
          </div>
        </div>
      </article>

      <article class="home-project-card glass reveal" data-cat="app-mobile">
        <figure><img src="{{ asset('images/laptop_code.jpg') }}" alt="Jeu Présidents Africains" /></figure>
        <div class="home-project-body">
          <h4>Jeu Présidents Africains</h4>
          <p>Quiz interactif mobile en Flutter pour sensibiliser et éduquer sur les présidents africains.</p>
          <div class="tech-logos">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/flutter/flutter-original.svg" alt="Flutter" title="Flutter" />
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/dart/dart-original.svg" alt="Dart" title="Dart" />
          </div>
          <div class="project-actions">
            <a class="btn btn-outline" href="https://github.com/JTECH07/afrik_presidents_game" target="_blank"><i class="bi bi-github"></i> Code</a>
            <a class="btn btn-outline" href="{{ route('contact') }}"><i class="bi bi-chat-dots"></i> Demander</a>
          </div>
        </div>
      </article>

      {{-- PROJETS CONSOLE --}}
      <article class="home-project-card glass reveal" data-cat="console">
        <figure><img src="{{ asset('images/code.jpg') }}" alt="Système évaluation coûts" /></figure>
        <div class="home-project-body">
          <h4>Évaluation coûts de production</h4>
          <p>Système Java pour évaluer les coûts de production et déterminer les marges des biens et services.</p>
          <div class="tech-logos">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/java/java-original.svg" alt="Java" title="Java" />
          </div>
          <div class="project-actions">
            <a class="btn btn-outline" href="https://github.com/JTECH07/systeme-evaluation-couts-production-et-determination-biens-et-services-d1-entreprise" target="_blank"><i class="bi bi-github"></i> Code</a>
            <a class="btn btn-outline" href="{{ route('contact') }}"><i class="bi bi-chat-dots"></i> Demander</a>
          </div>
        </div>
      </article>

      <article class="home-project-card glass reveal" data-cat="console">
        <figure><img src="{{ asset('images/code.jpg') }}" alt="Gestion étudiants" /></figure>
        <div class="home-project-body">
          <h4>Gestion des étudiants</h4>
          <p>Système C++ pour gérer les informations, matières, notes, filières et générer des bulletins.</p>
          <div class="tech-logos">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/cplusplus/cplusplus-original.svg" alt="C++" title="C++" />
          </div>
          <div class="project-actions">
            <a class="btn btn-outline" href="https://gitlab.com/alayejoseph1-group/systeme-de-gestion-des-etudiants" target="_blank"><i class="bi bi-gitlab"></i> Code</a>
            <a class="btn btn-outline" href="{{ route('contact') }}"><i class="bi bi-chat-dots"></i> Demander</a>
          </div>
        </div>
      </article>

      {{-- IA / ML --}}
      <article class="home-project-card glass reveal" data-cat="app-web">
        <figure><img src="{{ asset('images/recognize_face.png') }}" alt="Reconnaissance faciale" /></figure>
        <div class="home-project-body">
          <h4>Reconnaissance faciale</h4>
          <p>Système Python avec OpenCV2 et Machine Learning pour la vérification d'identité.</p>
          <div class="tech-logos">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/python/python-original.svg" alt="Python" title="Python" />
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/tensorflow/tensorflow-original.svg" alt="TensorFlow" title="TensorFlow" />
          </div>
          <div class="project-actions">
            <a class="btn btn-outline" href="https://github.com/JTECH07" target="_blank"><i class="bi bi-github"></i> Code</a>
            <a class="btn btn-outline" href="{{ route('contact') }}"><i class="bi bi-chat-dots"></i> Demander</a>
          </div>
        </div>
      </article>

      {{-- DESIGN --}}
      <article class="home-project-card glass reveal" data-cat="design">
        <figure><img src="{{ asset('images/desktop_code.jpg') }}" alt="Maquette Chips Manioc" /></figure>
        <div class="home-project-body">
          <h4>Maquette Chips Manioc+</h4>
          <p>Maquette Figma haute fidélité pour l'entreprise Chips Manioc+, produits et valeurs de la marque.</p>
          <div class="tech-logos">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/figma/figma-original.svg" alt="Figma" title="Figma" />
          </div>
          <div class="project-actions">
            <a class="btn btn-outline" href="{{ route('contact') }}"><i class="bi bi-chat-dots"></i> Demander</a>
          </div>
        </div>
      </article>
    </div>
  </div>
</section>

{{-- ═══════════ TÉMOIGNAGES (Marquee) ═══════════ --}}
<section class="section" style="background: var(--bg-soft); border-top: 1px solid var(--line); padding: 60px 0;">
  <div class="wrap">
    <div class="section-head reveal" style="text-align:center;">
      <p class="eyebrow" style="justify-content:center;color:var(--yellow);">
        <span style="width:32px;height:2px;background:var(--yellow);border-radius:2px;"></span>
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
      {{-- Duplicates for seamless loop --}}
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

<style>
  .filter-btn.active{background:var(--accent)!important;color:var(--white)!important;border-color:var(--accent)!important}
  .home-project-card[data-cat]{transition:all .4s ease}
  .home-project-card.hide-cat{display:none!important}
  .tech-logos{display:flex;gap:8px;flex-wrap:wrap;margin-bottom:10px}
  .tech-logos img{width:28px;height:28px;object-fit:contain;filter:brightness(.9);transition:transform .2s}
  .tech-logos img:hover{transform:scale(1.2)}
  body.light .tech-logos img{filter:brightness(1)}
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
  const btns = document.querySelectorAll('.filter-btn');
  const cards = document.querySelectorAll('.home-project-card[data-cat]');
  btns.forEach(btn => {
    btn.addEventListener('click', () => {
      btns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      const f = btn.dataset.filter;
      cards.forEach(c => {
        if (f === 'all' || c.dataset.cat === f) {
          c.classList.remove('hide-cat');
        } else {
          c.classList.add('hide-cat');
        }
      });
    });
  });
});
</script>
@endsection
