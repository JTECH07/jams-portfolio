<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="@yield('meta_description', 'Portfolio de Joseph ALAYE, développeur web et mobile. Projets concrets, compétences full-stack et collaboration pour missions freelance, stages et recrutements.')" />
  <title>@yield('meta_title', 'Joseph ALAYE | Portfolio')</title>

  {{-- Open Graph --}}
  <meta property="og:title" content="@yield('og_title', 'Joseph ALAYE | Développeur Web & Mobile')" />
  <meta property="og:description" content="@yield('og_description', 'Développeur web et mobile basé à Porto-Novo, Bénin. Laravel, Flutter, Python, IA.')" />
  <meta property="og:image" content="@yield('og_image', asset('images/me.png'))" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="{{ url()->current() }}" />
  <meta property="og:locale" content="fr_FR" />
  <meta property="og:site_name" content="Joseph ALAYE Portfolio" />

  {{-- Twitter Card --}}
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="@yield('og_title', 'Joseph ALAYE | Développeur Web & Mobile')" />
  <meta name="twitter:description" content="@yield('og_description', 'Développeur web et mobile basé à Porto-Novo, Bénin.')" />
  <meta name="twitter:image" content="@yield('og_image', asset('images/me.png'))" />

  {{-- Canonical --}}
  <link rel="canonical" href="{{ url()->current() }}" />

  <link rel="icon" type="image/png" href="{{ asset('images/me.png') }}" />
  <link rel="manifest" href="{{ asset('manifest.json') }}" />
  <meta name="theme-color" content="#0F172A" />
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
  <script>
    if ('serviceWorker' in navigator) {
      navigator.serviceWorker.register('/sw.js').catch(() => {});
    }
  </script>
</body>
</html>
