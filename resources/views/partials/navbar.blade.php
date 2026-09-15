<nav class="nav" id="mainNav">
  <a href="{{ route('home') }}" class="brand">
    <span class="badge"></span>
    <span class="badge"></span>
    <span class="avatar-ring"><img src="{{ asset('images/jams.jpg') }}" alt="JAMS" /></span>
    <!-- <span class="brand-name">Joseph ALAYE</span> -->
  </a>

  <div class="nav-links" id="navLinks">
    <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">Profil</a>
    <a href="{{ route('skills') }}" class="{{ request()->routeIs('skills') ? 'active' : '' }}">Compétences</a>
    <a href="{{ route('services') }}" class="{{ request()->routeIs('services') ? 'active' : '' }}">Services</a>
    <a href="{{ route('projects') }}" class="{{ request()->routeIs('projects') ? 'active' : '' }}">Projets</a>
    <a href="{{ route('timeline') }}" class="{{ request()->routeIs('timeline') ? 'active' : '' }}">Parcours</a>
    <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
    <a href="{{ asset('CV_Joseph_ALAYE.pdf') }}" target="_blank" rel="noopener">CV PDF</a>
  </div>

  <button class="menu-btn" id="menuBtn" aria-label="Menu">
    <i class="bi bi-list" style="font-size: 1.4rem;"></i>
  </button>
</nav>
