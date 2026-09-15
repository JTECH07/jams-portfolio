@extends('layouts.app')

@section('content')
<section class="section" id="timeline">
  <div class="wrap">
    <div class="section-head reveal">
      <p class="eyebrow" style="color: var(--white);">Parcours</p>
      <h2>Formation et expériences</h2>
      <p>Mon parcours est marqué par une progression constante et des expériences concrètes.</p>
    </div>

    <div class="timeline" style="border-left: 2px solid var(--accent); padding-left: 30px;">
      <article class="tl-item glass reveal">
        <div style="position:absolute;left:-42px;top:20px;width:20px;height:20px;background:var(--accent);border-radius:50%;box-shadow:0 0 10px var(--accent);"></div>
        <small>2024 - 2026 | Porto-Novo, Bénin</small>
        <h3>Licence 2 - Systèmes Informatiques et Logiciels</h3>
        <p>SIL - UATM Gasa Formation. Renforcement en génie logiciel, développement applicatif et résolution de problèmes techniques.</p>
      </article>

      <article class="tl-item glass reveal">
        <div style="position:absolute;left:-42px;top:20px;width:20px;height:20px;background:var(--yellow);border-radius:50%;box-shadow:0 0 10px var(--yellow);"></div>
        <small>2025 - Now | Porto-Novo, Bénin</small>
        <h3>Membre du Club IA - CAEB</h3>
        <p>Exploration de l'IA, programmation Python, Machine Learning et applications pratiques au sein du laboratoire numérique du CAEB.</p>
      </article>

      <article class="tl-item glass reveal">
        <div style="position:absolute;left:-42px;top:20px;width:20px;height:20px;background:var(--accent);border-radius:50%;box-shadow:0 0 10px var(--accent);"></div>
        <small>Juil - Sept 2025 | Porto-Novo, Bénin</small>
        <h3>Stagiaire Développement Web Laravel - DigiWeb SARL</h3>
        <p>Réalisation de projets fonctionnels : CRUD de posts, gestion de bibliothèques et système d'authentification avec confirmation par mail.</p>
      </article>

      <article class="tl-item glass reveal">
        <div style="position:absolute;left:-42px;top:20px;width:20px;height:20px;background:var(--accent-2);border-radius:50%;box-shadow:0 0 10px var(--accent-2);"></div>
        <small>Déc 2024 | Sèmè-Podji, Bénin</small>
        <h3>Formation IA Générative - FuturCraft Institut</h3>
        <p>Programme FUTUR orienté usages concrets de l'IA générative, productivité et nouvelles méthodes de création numérique.</p>
      </article>

      <article class="tl-item glass reveal">
        <div style="position:absolute;left:-42px;top:20px;width:20px;height:20px;background:var(--ok);border-radius:50%;box-shadow:0 0 10px var(--ok);"></div>
        <small>Avr 2025 | Porto-Novo, Bénin</small>
        <h3>Apprenti en maintenance informatique - SENANTIC</h3>
        <p>Support technique, maintenance de base des équipements et assistance à la continuité opérationnelle.</p>
      </article>

      <article class="tl-item glass reveal">
        <div style="position:absolute;left:-42px;top:20px;width:20px;height:20px;background:var(--white);border-radius:50%;box-shadow:0 0 10px var(--white);"></div>
        <small>En cours</small>
        <h3>Développeur Full-Stack - JAMS TECH</h3>
        <p>Développement de projets web et solutions digitales, avec une orientation forte vers l'innovation et l'impact local.</p>
      </article>

      <article class="tl-item glass reveal">
        <div style="position:absolute;left:-42px;top:20px;width:20px;height:20px;background:var(--muted);border-radius:50%;box-shadow:0 0 6px var(--muted);"></div>
        <small>2023 - 2024 | Porto-Novo, Bénin</small>
        <h3>Baccalauréat D - CEG AGBOKOU</h3>
        <p>Base scientifique solide qui soutient l'approche analytique en programmation et en conception de solutions.</p>
      </article>
    </div>

    {{-- ═══════════ CERTIFICATIONS ═══════════ --}}
    <div class="section-head reveal" style="margin-top: 80px;">
      <p class="eyebrow" style="color: var(--yellow);">Certifications</p>
      <h2>Formations & validations</h2>
    </div>
  </div>

  <div class="marquee-wrap" style="padding: 30px 0;">
    <div class="marquee-track cert-marquee" style="animation-duration:30s;">
      {{-- Cert 1 --}}
      <article class="cert-card-cert">
        <div class="cert-card-inner">
          <div class="cert-badge" style="background:linear-gradient(135deg,var(--accent),var(--accent-2));">
            <i class="bi bi-palette-fill"></i>
          </div>
          <div class="cert-content">
            <small class="cert-org">Google</small>
            <h4>UI/UX Design</h4>
            <p>Fondamentaux du design d'interface et expérience utilisateur</p>
            <div class="cert-meta">
              <span><i class="bi bi-calendar3"></i> 2024</span>
              <span><i class="bi bi-patch-check-fill"></i> Vérifié</span>
            </div>
          </div>
        </div>
      </article>

      {{-- Cert 2 --}}
      <article class="cert-card-cert">
        <div class="cert-card-inner">
          <div class="cert-badge" style="background:linear-gradient(135deg,var(--accent-2),var(--ok));">
            <i class="bi bi-robot"></i>
          </div>
          <div class="cert-content">
            <small class="cert-org">FuturCraft Institut</small>
            <h4>IA Générative</h4>
            <p>Usages concrets de l'IA générative et productivité numérique</p>
            <div class="cert-meta">
              <span><i class="bi bi-calendar3"></i> Déc 2024</span>
              <span><i class="bi bi-patch-check-fill"></i> Vérifié</span>
            </div>
          </div>
        </div>
      </article>

      {{-- Cert 3 --}}
      <article class="cert-card-cert">
        <div class="cert-card-inner">
          <div class="cert-badge" style="background:linear-gradient(135deg,var(--yellow),#f59e0b);">
            <i class="bi bi-laptop"></i>
          </div>
          <div class="cert-content">
            <small class="cert-org">SENANTIC</small>
            <h4>Maintenance Informatique</h4>
            <p>Support technique et maintenance d'équipements</p>
            <div class="cert-meta">
              <span><i class="bi bi-calendar3"></i> Avr 2025</span>
              <span><i class="bi bi-patch-check-fill"></i> Vérifié</span>
            </div>
          </div>
        </div>
      </article>

      {{-- Cert 4 --}}
      <article class="cert-card-cert">
        <div class="cert-card-inner">
          <div class="cert-badge" style="background:linear-gradient(135deg,var(--ok),#059669);">
            <i class="bi bi-file-earmark-check"></i>
          </div>
          <div class="cert-content">
            <small class="cert-org">UATM GASA</small>
            <h4>Licence SIL</h4>
            <p>Systèmes Informatiques et Logiciels — L2 validée</p>
            <div class="cert-meta">
              <span><i class="bi bi-calendar3"></i> 2024 - 2026</span>
              <span><i class="bi bi-patch-check-fill"></i> En cours</span>
            </div>
          </div>
        </div>
      </article>

      {{-- Duplicates for seamless loop --}}
      <article class="cert-card-cert">
        <div class="cert-card-inner">
          <div class="cert-badge" style="background:linear-gradient(135deg,var(--accent),var(--accent-2));">
            <i class="bi bi-palette-fill"></i>
          </div>
          <div class="cert-content">
            <small class="cert-org">Google</small>
            <h4>UI/UX Design</h4>
            <p>Fondamentaux du design d'interface et expérience utilisateur</p>
            <div class="cert-meta">
              <span><i class="bi bi-calendar3"></i> 2024</span>
              <span><i class="bi bi-patch-check-fill"></i> Vérifié</span>
            </div>
          </div>
        </div>
      </article>

      <article class="cert-card-cert">
        <div class="cert-card-inner">
          <div class="cert-badge" style="background:linear-gradient(135deg,var(--accent-2),var(--ok));">
            <i class="bi bi-robot"></i>
          </div>
          <div class="cert-content">
            <small class="cert-org">FuturCraft Institut</small>
            <h4>IA Générative</h4>
            <p>Usages concrets de l'IA générative et productivité numérique</p>
            <div class="cert-meta">
              <span><i class="bi bi-calendar3"></i> Déc 2024</span>
              <span><i class="bi bi-patch-check-fill"></i> Vérifié</span>
            </div>
          </div>
        </div>
      </article>

      <article class="cert-card-cert">
        <div class="cert-card-inner">
          <div class="cert-badge" style="background:linear-gradient(135deg,var(--yellow),#f59e0b);">
            <i class="bi bi-laptop"></i>
          </div>
          <div class="cert-content">
            <small class="cert-org">SENANTIC</small>
            <h4>Maintenance Informatique</h4>
            <p>Support technique et maintenance d'équipements</p>
            <div class="cert-meta">
              <span><i class="bi bi-calendar3"></i> Avr 2025</span>
              <span><i class="bi bi-patch-check-fill"></i> Vérifié</span>
            </div>
          </div>
        </div>
      </article>

      <article class="cert-card-cert">
        <div class="cert-card-inner">
          <div class="cert-badge" style="background:linear-gradient(135deg,var(--ok),#059669);">
            <i class="bi bi-file-earmark-check"></i>
          </div>
          <div class="cert-content">
            <small class="cert-org">UATM GASA</small>
            <h4>Licence SIL</h4>
            <p>Systèmes Informatiques et Logiciels — L2 validée</p>
            <div class="cert-meta">
              <span><i class="bi bi-calendar3"></i> 2024 - 2026</span>
              <span><i class="bi bi-patch-check-fill"></i> En cours</span>
            </div>
          </div>
        </div>
      </article>
    </div>
  </div>
</section>

<style>
  .cert-marquee{display:flex;gap:24px;width:max-content}
  .cert-card-cert{
    min-width:300px;max-width:300px;
    background:rgba(255,255,255,.06);
    border:1px solid rgba(255,255,255,.1);
    border-radius:16px;overflow:hidden;
    transition:all .3s;
  }
  .cert-card-cert:hover{
    border-color:var(--accent);
    transform:translateY(-4px);
    box-shadow:0 12px 40px rgba(37,99,235,.2);
  }
  .cert-card-inner{padding:24px;display:flex;flex-direction:column;align-items:center;text-align:center;gap:14px}
  .cert-badge{
    width:56px;height:56px;border-radius:14px;
    display:grid;place-items:center;
    font-size:1.5rem;color:var(--white);
    box-shadow:0 8px 24px rgba(0,0,0,.3);
  }
  .cert-content{display:flex;flex-direction:column;gap:6px}
  .cert-org{font-family:var(--font-mono);font-size:.72rem;color:var(--accent);text-transform:uppercase;letter-spacing:.1em}
  .cert-content h4{font-size:1.05rem;color:var(--white);margin:0}
  .cert-content p{font-size:.85rem;color:var(--muted);line-height:1.5;margin:0}
  .cert-meta{display:flex;gap:12px;justify-content:center;margin-top:4px}
  .cert-meta span{font-size:.75rem;color:var(--muted);display:flex;align-items:center;gap:4px}
  .cert-meta .bi-patch-check-fill{color:var(--ok)}

  body.light .cert-card-cert{background:rgba(255,255,255,.7);border-color:rgba(0,0,0,.08)}
  body.light .cert-card-cert:hover{border-color:var(--accent);box-shadow:0 12px 40px rgba(37,99,235,.1)}
  body.light .cert-content h4{color:var(--black)}
  body.light .cert-content p{color:#475569}
  body.light .cert-org{color:var(--accent)}
  body.light .cert-meta span{color:#64748b}
</style>
@endsection
