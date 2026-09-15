<nav class="nav-pill" id="mainNav">
  <div class="nav-pill-inner">
    <a href="{{ route('home') }}" class="pill-brand">
      <span class="pill-badge"><img src="{{ asset('images/me.png') }}" alt="Joseph ALAYE | JAMS" class="pill-img" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;"></span>
    </a>

    <div class="pill-links" id="navLinks">
      <div class="pill-indicator" id="pillIndicator"></div>
      <!-- <a href="{{ route('home') }}" class="pill-link {{ request()->routeIs('home') ? 'active' : '' }}">Accueil</a> -->
      <a href="{{ route('about') }}" class="pill-link {{ request()->routeIs('about') ? 'active' : '' }}">Profil</a>
      <a href="{{ route('skills') }}" class="pill-link {{ request()->routeIs('skills') ? 'active' : '' }}">Compétences</a>
      <a href="{{ route('projects') }}" class="pill-link {{ request()->routeIs('projects') ? 'active' : '' }}">Projets</a>
      <a href="{{ route('services') }}" class="pill-link {{ request()->routeIs('services') ? 'active' : '' }}">Services</a>
      <a href="{{ route('timeline') }}" class="pill-link {{ request()->routeIs('timeline') ? 'active' : '' }}">Parcours</a>
      <a href="{{ route('contact') }}" class="pill-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
      <a href="{{ route('blog') }}" class="pill-link {{ request()->routeIs('blog*') ? 'active' : '' }}">Blog</a>
      <a href="{{ route('admin.dashboard') }}" class="pill-link {{ request()->routeIs('admin.*') ? 'active' : '' }}" style="font-size:.75rem;opacity:.7;"><i class="bi bi-gear"></i></a>
    </div>

    <a class="pill-cv" href="{{ asset('CV_Joseph_ALAYE.pdf') }}" target="_blank" rel="noopener">
      <i class="bi bi-download"></i> CV
    </a>

    <button class="pill-menu-btn" id="menuBtn" aria-label="Menu">
      <i class="bi bi-list"></i>
    </button>
  </div>
</nav>
