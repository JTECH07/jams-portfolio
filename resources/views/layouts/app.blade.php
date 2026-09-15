<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Portfolio de Joseph ALAYE, développeur web et mobile. Projets concrets, compétences full-stack et collaboration pour missions freelance, stages et recrutements." />
  <title>Joseph ALAYE | Portfolio</title>
  <link rel="icon" type="image/png" href="{{ asset('images/me.png') }}" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700&family=Space+Grotesk:wght@300;400;500;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
  @stack('styles')
</head>
<body class="intro-lock">
  <!-- Binary Rain Intro Overlay -->
  <div id="siteIntroOverlay" aria-hidden="false">
    <div class="intro-binary" aria-hidden="true" id="introBinary"></div>
    <div class="intro-core">
      <h1 class="intro-name">JOSEPH ALAYE</h1>
      <p class="intro-subtitle">UNIVERS DIGITAL</p>
    </div>
  </div>

  @include('partials.navbar')

  <main style="padding-top: 80px;">
    @yield('content')
  </main>

  @include('partials.footer')

  <button class="theme-toggle" id="themeToggle" aria-label="Changer de thème">
    <i class="bi bi-moon-stars-fill" id="themeIcon"></i>
  </button>

  @stack('scripts')
</body>
</html>
