@extends('layouts.app')

@section('content')
<section class="section" id="skills" style="background:var(--bg);">
  <div class="wrap">
    <div class="section-head reveal" style="text-align:center;margin-bottom:40px;">
      <p class="eyebrow" style="color: var(--yellow);">Compétences</p>
      <h2 style="text-align:center;">Stack technique et outils</h2>
      <p style="color:var(--muted);text-align:center;margin-bottom:24px;">
        Technologies et méthodes utilisées pour concevoir des produits maintenables, performants et orientés usage.
      </p>
    </div>

    <div class="skills-grid">
      <article class="skill-box glass reveal" style="border-top: 4px solid var(--accent);">
        <h3 style="color: var(--white); display: flex; align-items: center; gap: 10px;">
          <i class="bi bi-braces" style="color: var(--accent);"></i> Langages
        </h3>
        <ul style="display: grid; gap: 15px;">
          <li>
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/html5/html5-original.svg" alt="HTML5" class="skill-logo" />
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/css3/css3-original.svg" alt="CSS3" class="skill-logo" />
            HTML5 & CSS3
          </li>
          <li>
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-original.svg" alt="JS" class="skill-logo" />
            JavaScript (ES6+)
          </li>
          <li>
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg" alt="PHP" class="skill-logo" />
            <img src="https://cdn.jsdelivr.dev/gh/devicons/devicon/icons/python/python-original.svg" alt="Python" class="skill-logo" />
            PHP & Python
          </li>
          <li>
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/java/java-original.svg" alt="Java" class="skill-logo" />
            <img src="https://cdn.jsdelivr.dev/gh/devicons/devicon/icons/cplusplus/cplusplus-original.svg" alt="C++" class="skill-logo" />
            <img src="https://cdn.jsdelivr.dev/gh/devicons/devicon/icons/dart/dart-original.svg" alt="Dart" class="skill-logo" />
            Java, C++, Dart
          </li>
        </ul>
      </article>

      <article class="skill-box glass reveal" style="border-top: 4px solid var(--accent-2);">
        <h3 style="color: var(--white); display: flex; align-items: center; gap: 10px;">
          <i class="bi bi-layers" style="color: var(--accent-2);"></i> Frameworks
        </h3>
        <ul style="display: grid; gap: 15px;">
          <li>
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/laravel/laravel-original.svg" alt="Laravel" class="skill-logo" />
            Laravel
          </li>
          <li>
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/bootstrap/bootstrap-original.svg" alt="Bootstrap" class="skill-logo" />
            <img src="https://cdn.jsdelivr.dev/gh/devicons/devicon/icons/tailwindcss/tailwindcss-original.svg" alt="Tailwind" class="skill-logo" />
            Bootstrap / Tailwind
          </li>
          <li>
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/flutter/flutter-original.svg" alt="Flutter" class="skill-logo" />
            Flutter (Mobile)
          </li>
          <li>
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/django/django-plain.svg" alt="Django" class="skill-logo" />
            <img src="https://cdn.jsdelivr.dev/gh/devicons/devicon/icons/react/react-original.svg" alt="React" class="skill-logo" />
            Django / React (bases)
          </li>
        </ul>
      </article>

      <article class="skill-box glass reveal" style="border-top: 4px solid var(--yellow);">
        <h3 style="color: var(--white); display: flex; align-items: center; gap: 10px;">
          <i class="bi bi-database" style="color: var(--yellow);"></i> Bases de données
        </h3>
        <ul style="display: grid; gap: 15px;">
          <li>
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original.svg" alt="MySQL" class="skill-logo" />
            MySQL
          </li>
          <li>
            <img src="https://cdn.jsdelivr.dev/gh/devicons/devicon/icons/postgresql/postgresql-original.svg" alt="PostgreSQL" class="skill-logo" />
            PostgreSQL
          </li>
          <li>
            <img src="https://cdn.jsdelivr.dev/gh/devicons/devicon/icons/unix/unix-original.svg" alt="Merise" class="skill-logo" style="filter:brightness(1.5) sepia(1) hue-rotate(10deg);" />
            Modélisation UML / Merise
          </li>
        </ul>
      </article>

      <article class="skill-box glass reveal" style="border-top: 4px solid var(--white);">
        <h3 style="color: var(--white); display: flex; align-items: center; gap: 10px;">
          <i class="bi bi-tools" style="color: var(--white);"></i> Outils & Méthodes
        </h3>
        <ul style="display: grid; gap: 15px;">
          <li>
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/git/git-original.svg" alt="Git" class="skill-logo" />
            <img src="https://cdn.jsdelivr.dev/gh/devicons/deviconicons/github/github-original.svg" alt="GitHub" class="skill-logo" />
            Git / GitHub / GitLab
          </li>
          <li>
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/figma/figma-original.svg" alt="Figma" class="skill-logo" />
            Figma (UI/UX)
          </li>
          <li>
            <img src="https://cdn.jsdelivr.dev/gh/devicons/devicon/icons/wordpress/wordpress-plain.svg" alt="WordPress" class="skill-logo" />
            WordPress
          </li>
          <li>
            <i class="bi bi-people" style="color:var(--white);font-size:1.4rem;"></i>
            Travail Collaboratif Agile
          </li>
        </ul>
      </article>
    </div>
  </div>
</section>

<!-- Navigation entre pages -->
<div style="text-align:center;margin-top:32px;">
  <a href="{{ route('profil') }}" class="btn btn-outline" style="font-size:.85rem;padding:8px 16px;">
    <i class="bi bi-arrow-left"></i> Retour à propos
  </a>
  <a href="{{ route('competences') }}" class="btn btn-main" style="font-size:.85rem;padding:8px 16px;margin-left:12px;">
    <i class="bi bi-grid"></i> Voir les compétences
  </a>
</div>

@endsection
