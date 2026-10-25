@extends('layouts.app')

@section('meta_title', 'Mentions légales | Joseph ALAYE')
@section('meta_description', 'Mentions légales du portfolio de Joseph ALAYE (JAMS TECH).')

@section('content')
<section class="section" style="background:var(--bg);">
  <div class="wrap" style="max-width:860px;">
    <div class="section-head reveal">
      <p class="eyebrow" style="color:var(--yellow);">Informations légales</p>
      <h2>Mentions légales</h2>
    </div>

    <div class="glass reveal" style="padding:32px;border-radius:16px;line-height:1.75;color:var(--muted);">
      <h3 style="color:var(--white);margin:0 0 10px;">Éditeur du site</h3>
      <p style="margin:0 0 24px;">
        <strong style="color:var(--white);">Joseph ALAYE</strong> — JAMS TECH<br />
        Porto-Novo, Bénin<br />
        E-mail : <a href="mailto:alayejoseph1@gmail.com" style="color:var(--yellow);">alayejoseph1@gmail.com</a><br />
        Responsable de la publication : Joseph ALAYE
      </p>

      <h3 style="color:var(--white);margin:0 0 10px;">Hébergement</h3>
      <p style="margin:0 0 24px;">
        Les coordonnées de l’hébergeur doivent être complétées avant la mise en ligne définitive du site.
      </p>

      <h3 style="color:var(--white);margin:0 0 10px;">Propriété intellectuelle</h3>
      <p style="margin:0 0 24px;">
        L’ensemble des contenus présents sur ce site (textes, articles, visuels, code, illustrations,
        éléments graphiques et CV) est la propriété de Joseph ALAYE, sauf mention contraire.
        Toute reproduction, représentation ou réutilisation, totale ou partielle, sans autorisation
        écrite préalable est interdite.
      </p>

      <h3 style="color:var(--white);margin:0 0 10px;">Liens externes</h3>
      <p style="margin:0 0 24px;">
        Ce site peut contenir des liens vers des sites tiers. Joseph ALAYE n’exerce aucun contrôle
        sur leur contenu et décline toute responsabilité quant à leurs pratiques.
      </p>

      <h3 style="color:var(--white);margin:0 0 10px;">Données personnelles et cookies</h3>
      <p style="margin:0 0 24px;">
        Le traitement des données personnelles est détaillé dans la
        <a href="{{ route('legal.privacy') }}" style="color:var(--yellow);">politique de confidentialité</a>.
      </p>

      <h3 style="color:var(--white);margin:0 0 10px;">Contact</h3>
      <p style="margin:0;">
        Pour toute question relative au site :
        <a href="{{ route('contact') }}" style="color:var(--yellow);">formulaire de contact</a> ou
        <a href="mailto:alayejoseph1@gmail.com" style="color:var(--yellow);">alayejoseph1@gmail.com</a>.
      </p>

      <p style="margin:24px 0 0;font-size:.8rem;">Dernière mise à jour : 25 octobre 2026.</p>
    </div>
  </div>
</section>
@endsection
