@extends('layouts.app')

@section('content')
<section class="section" id="services">
  <div class="wrap">
    <div class="section-head reveal">
      <p class="eyebrow" style="color: var(--accent-2);">Services</p>
      <h2>+4 services pour clients et équipes</h2>
      <p>Des offres orientées impact pour transformer vos idées en résultats concrets et mesurables.</p>
    </div>

    <div class="services-grid">
      <article class="service glass reveal">
        <div class="icon futuristic-glow" style="background: rgba(255, 215, 0, 0.1); border-color: var(--yellow); box-shadow: 0 0 15px rgba(255, 215, 0, 0.2);">
          <i class="bi bi-robot" style="color: var(--yellow); -webkit-text-fill-color: var(--yellow); font-size: 2rem;"></i>
        </div>
        <h3 style="color: var(--yellow);">Création de Contenu IA</h3>
        <p>Pipelines de contenu intelligents propulsés par l'IA de pointe. De la rédaction automatisée à la génération visuelle.</p>
      </article>

      <article class="service glass reveal">
        <div class="icon futuristic-glow">
          <i class="bi bi-window-stack" style="color: var(--accent); -webkit-text-fill-color: var(--accent); font-size: 2rem;"></i>
        </div>
        <h3 style="color: var(--accent);">Développement Web & Mobile</h3>
        <p>Solutions web et applications mobiles modernes, responsives et haute performance. Sites vitrines ou apps métier.</p>
      </article>

      <article class="service glass reveal">
        <div class="icon futuristic-glow" style="background: rgba(6, 182, 212, 0.1); border-color: var(--accent-2);">
          <i class="bi bi-cpu" style="color: var(--accent-2); -webkit-text-fill-color: var(--accent-2); font-size: 2rem;"></i>
        </div>
        <h3 style="color: var(--accent-2);">Automatisation Digitale</h3>
        <p>Workflows d'automatisation personnalisés éliminant les répétitions et accélérant les opérations.</p>
      </article>

      <article class="service glass reveal">
        <div class="icon futuristic-glow" style="background: rgba(255, 255, 255, 0.1); border-color: var(--white);">
          <i class="bi bi-palette" style="color: var(--white); -webkit-text-fill-color: var(--white); font-size: 2rem;"></i>
        </div>
        <h3 style="color: var(--white);">Production Visuelle</h3>
        <p>Assets visuels digitaux convaincants — graphiques brandés jusqu'au contenu multimédia amélioré par l'IA.</p>
      </article>
    </div>
  </div>
</section>
@endsection
