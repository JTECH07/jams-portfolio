@extends('layouts.app')

@section('content')
<section class="section" id="skills">
  <div class="wrap">
    <div class="section-head reveal">
      <p class="eyebrow" style="color: var(--yellow);">Compétences</p>
      <h2>Stack technique et outils</h2>
      <p>Technologies et méthodes utilisées pour concevoir des produits maintenables, performants et orientés usage.</p>
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
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/python/python-original.svg" alt="Python" class="skill-logo" />
            PHP & Python
          </li>
          <li>
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/java/java-original.svg" alt="Java" class="skill-logo" />
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/cplusplus/cplusplus-original.svg" alt="C++" class="skill-logo" />
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/dart/dart-original.svg" alt="Dart" class="skill-logo" />
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
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/tailwindcss/tailwindcss-original.svg" alt="Tailwind" class="skill-logo" />
            Bootstrap / Tailwind
          </li>
          <li>
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/flutter/flutter-original.svg" alt="Flutter" class="skill-logo" />
            Flutter (Mobile)
          </li>
          <li>
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/django/django-plain.svg" alt="Django" class="skill-logo" />
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/react/react-original.svg" alt="React" class="skill-logo" />
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
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/postgresql/postgresql-original.svg" alt="PostgreSQL" class="skill-logo" />
            PostgreSQL
          </li>
          <li>
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/unix/unix-original.svg" alt="Merise" class="skill-logo" style="filter:brightness(1.5) sepia(1) hue-rotate(10deg);" />
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
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/github/github-original.svg" alt="GitHub" class="skill-logo" />
            Git / GitHub / GitLab
          </li>
          <li>
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/figma/figma-original.svg" alt="Figma" class="skill-logo" />
            Figma (UI/UX)
          </li>
          <li>
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/wordpress/wordpress-plain.svg" alt="WordPress" class="skill-logo" />
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

<style>
  .skill-logo{width:28px;height:28px;object-fit:contain;display:inline-block;vertical-align:middle;margin-right:6px}
  body.light .skill-logo{filter:none}
</style>
@endsection
