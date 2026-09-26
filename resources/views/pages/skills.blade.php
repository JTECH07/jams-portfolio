@extends('layouts.app')

@section('content')
<section class="section" id="skills" style="background:var(--bg);">
  <div class="wrap">
    <div class="section-head reveal" style="text-align:center;margin-bottom:48px;">
      <p class="eyebrow" style="color:var(--yellow);justify-content:center;">Compétences</h2>
      <h2 style="text-align:center;margin-bottom:24px;">Stack technique et outils</h2>
      <p style="color:var(--muted);text-align:center;font-size:1.05rem;margin-bottom:0;">
        Technologies et méthodes utilisées pour concevoir des produits maintenables, performants et orientés usage.
      </p>
    </div>

    <div class="skills-container reveal">
      {{-- Section Langages --}}
      <div class="skills-section" style="margin-bottom:40px;">
        <div class="section-title" style="text-align:center;margin-bottom:24px;">
          <h3 style="color:var(--white);font-size:1.5rem;">Langages</h3>
        </div>
        <div class="skills-grid" style="grid-template-columns:repeat(auto-fit,minmax(120px,1fr));gap:12px;">
          <div class="skill-pill" style="background:rgba(37,99,235,.1);border:1px solid rgba(37,99,235,.3);color:var(--accent);padding:10px 16px;border-radius:100px;font-size:.85rem;font-weight:600;">HTML5</div>
          <div class="skill-pill" style="background:rgba(37,99,235,.1);border:1px solid rgba(37,99,235,.3);color:var(--accent);padding:10px 16px;border-radius:100px;font-size:.85rem;font-weight:600;">CSS3</div>
          <div class="skill-pill" style="background:rgba(37,99,235,.1);border:1px solid rgba(37,99,235,.3);color:var(--accent);padding:10px 16px;border-radius:100px;font-size:.85rem;font-weight:600;">JavaScript</div>
          <div class="skill-pill" style="background:rgba(37,99,235,.1);border:1px solid rgba(37,99,235,.3);color:var(--accent);padding:10px 16px;border-radius:100px;font-size:.85rem;font-weight:600;">PHP</div>
          <div class="skill-pill" style="background:rgba(37,99,235,.1);border:1px solid rgba(37,99,235,.3);color:var(--accent);padding:10px 16px;border-radius:100px;font-size:.85rem;font-weight:600;">Python</div>
          <div class="skill-pill" style="background:rgba(37,99,235,.1);border:1px solid rgba(37,99,235,.3);color:var(--accent);padding:10px 16px;border-radius:100px;font-size:.85rem;font-weight:600;">Java</div>
          <div class="skill-pill" style="background:rgba(37,99,235,.1);border:1px solid rgba(37,99,235,.3);color:var(--accent);padding:10px 16px;border-radius:100px;font-size:.85rem;font-weight:600;">C++</div>
          <div class="skill-pill" style="background:rgba(37,99,235,.1);border:1px solid rgba(37,99,235,.3);color:var(--accent);padding:10px 16px;border-radius:100px;font-size:.85rem;font-weight:600;">Dart</div>
          <div class="skill-pill" style="background:rgba(37,99,235,.1);border:1px solid rgba(37,99,235,.3);color:var(--accent);padding:10px 16px;border-radius:100px;font-size:.85rem;font-weight:600;">Figma</div>
        </div>
      </div>

      {{-- Section Frameworks --}}
      <div class="skills-section" style="margin-bottom:40px;">
        <div class="section-title" style="text-align:center;margin-bottom:24px;">
          <h3 style="color:var(--white);font-size:1.5rem;">Frameworks</h3>
        </div>
        <div class="skills-grid" style="grid-template-columns:repeat(auto-fit,minmax(120px,1fr));gap:12px;">
          <div class="skill-pill" style="background:rgba(6,182,212,.1);border:1px solid rgba(6,182,212,.3);color:var(--accent-2);padding:10px 16px;border-radius:100px;font-size:.85rem;font-weight:600;">Laravel</div>
          <div class="skill-pill" style="background:rgba(6,182,212,.1);border:1px solid rgba(6,182,212,.3);color:var(--accent-2);padding:10px 16px;border-radius:100px;font-size:.85rem;font-weight:600;">Bootstrap</div>
          <div class="skill-pill" style="background:rgba(6,182,212,.1);border:1px solid rgba(6,182,212,.3);color:var(--accent-2);padding:10px 16px;border-radius:100px;font-size:.85rem;font-weight:600;">Flutter</div>
          <div class="skill-pill" style="background:rgba(6,182,212,.1);border:1px solid rgba(6,182,212,.3);color:var(--accent-2);padding:10px 16px;border-radius:100px;font-size:.85rem;font-weight:600;">Django</div>
          <div class="skill-pill" style="background:rgba(6,182,212,.1);border:1px solid rgba(6,182,212,.3);color:var(--accent-2);padding:10px 16px;border-radius:100px;font-size:.85rem;font-weight:600;">React</div>
        </div>
      </div>

      {{-- Section Bases de données --}}
      <div class="skills-section" style="margin-bottom:40px;">
        <div class="section-title" style="text-align:center;margin-bottom:24px;">
          <h3 style="color:var(--white);font-size:1.5rem;">Bases de données</h3>
        </div>
        <div class="skills-grid" style="grid-template-columns:repeat(auto-fit,minmax(120px,1fr));gap:12px;">
          <div class="skill-pill" style="background:rgba(255,215,0,.1);border:1px solid rgba(255,215,0,.3);color:var(--yellow);padding:10px 16px;border-radius:100px;font-size:.85rem;font-weight:600;">MySQL</div>
          <div class="skill-pill" style="background:rgba(255,215,0,.1);border:1px solid rgba(255,215,0,.3);color:var(--yellow);padding:10px 16px;border-radius:100px;font-size:.85rem;font-weight:600;">PostgreSQL</div>
          <div class="skill-pill" style="background:rgba(255,215,0,.1);border:1px solid rgba(255,215,0,.3);color:var(--yellow);padding:10px 16px;border-radius:100px;font-size:.85rem;font-weight:600;">MongoDB</div>
          <div class="skill-pill" style="background:rgba(255,215,0,.1);border:1px solid rgba(255,215,0,.3);color:var(--yellow);padding:10px 16px;border-radius:100px;font-size:.85rem;font-weight:600;">SQLite</div>
        </div>
      </div>

      {{-- Section Outils & Méthodes --}}
      <div class="skills-section">
        <div class="section-title" style="text-align:center;margin-bottom:24px;">
          <h3 style="color:var(--white);font-size:1.5rem;">Outils & Méthodes</h3>
        </div>
        <div class="skills-grid" style="grid-template-columns:repeat(auto-fit,minmax(120px,1fr));gap:12px;">
          <div class="skill-pill" style="background:rgba(128,128,128,.1);border:1px solid rgba(128,128,128,.3);color:#6c757d;padding:10px 16px;border-radius:100px;font-size:.85rem;font-weight:600;">Git</div>
          <div class="skill-pill" style="background:rgba(128,128,128,.1);border:1px solid rgba(128,128,128,.3);color:#6c757d;padding:10px 16px;border-radius:100px;font-size:.85rem;font-weight:600;">GitHub</div>
          <div class="skill-pill" style="background:rgba(128,128,128,.1);border:1px solid rgba(128,128,128,.3);color:#6c757d;padding:10px 16px;border-radius:100px;font-size:.85rem;font-weight:600;">WordPress</div>
          <div class="skill-pill" style="background:rgba(128,128,128,.1);border:1px solid rgba(128,128,128,.3);color:#6c757d;padding:10px 16px;border-radius:100px;font-size:.85rem;font-weight:600;">Figma</div>
          <div class="skill-pill" style="background:rgba(128,128,128,.1);border:1px solid rgba(128,128,128,.3);color:#6c757d;padding:10px 16px;border-radius:100px;font-size:.85rem;font-weight:600;">Jira</div>
          <div class="skill-pill" style="background:rgba(128,128,128,.1);border:1px solid rgba(128,128,128,.3);color:#6c757d;padding:10px 16px;border-radius:100px;font-size:.85rem;font-weight:600;">Docker</div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection