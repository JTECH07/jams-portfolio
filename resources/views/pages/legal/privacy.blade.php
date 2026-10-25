@extends('layouts.app')

@section('meta_title', 'Politique de confidentialité | Joseph ALAYE')
@section('meta_description', 'Politique de confidentialité et traitement des données personnelles du portfolio de Joseph ALAYE.')

@section('content')
<section class="section" style="background:var(--bg);">
  <div class="wrap" style="max-width:860px;">
    <div class="section-head reveal">
      <p class="eyebrow" style="color:var(--yellow);">Vos données</p>
      <h2>Politique de confidentialité</h2>
    </div>

    <div class="glass reveal" style="padding:32px;border-radius:16px;line-height:1.75;color:var(--muted);">
      <h3 style="color:var(--white);margin:0 0 10px;">Responsable du traitement</h3>
      <p style="margin:0 0 24px;">
        Joseph ALAYE — JAMS TECH, Porto-Novo, Bénin.<br />
        Contact :
        <a href="mailto:alayejoseph1@gmail.com" style="color:var(--yellow);">alayejoseph1@gmail.com</a>.
      </p>

      <h3 style="color:var(--white);margin:0 0 10px;">Données collectées</h3>
      <ul style="margin:0 0 24px;padding-left:20px;">
        <li><strong style="color:var(--white);">Contact</strong> : nom, e-mail, type de proposition, sujet, message.</li>
        <li><strong style="color:var(--white);">Commentaires</strong> : nom, e-mail (facultatif), contenu du commentaire.</li>
        <li><strong style="color:var(--white);">Évaluations</strong> : nom, e-mail (facultatif), note, avis.</li>
        <li><strong style="color:var(--white);">Newsletter</strong> : e-mail, nom (facultatif), date d’inscription et de confirmation.</li>
        <li><strong style="color:var(--white);">Données techniques</strong> : adresse IP, agent utilisateur et pages consultées (statistiques de lecture).</li>
      </ul>

      <h3 style="color:var(--white);margin:0 0 10px;">Finalités et bases légales</h3>
      <ul style="margin:0 0 24px;padding-left:20px;">
        <li>Répondre aux messages de contact — intérêt légitime et démarche précontractuelle.</li>
        <li>Publier les commentaires et évaluations — consentement de l’auteur.</li>
        <li>Envoyer la newsletter — consentement, confirmé par double opt-in.</li>
        <li>Mesurer l’audience et sécuriser le site — intérêt légitime.</li>
      </ul>

      <h3 style="color:var(--white);margin:0 0 10px;">Durées de conservation</h3>
      <ul style="margin:0 0 24px;padding-left:20px;">
        <li>Messages de contact : 3 ans après le dernier échange.</li>
        <li>Commentaires et évaluations : jusqu’à suppression ou demande d’effacement.</li>
        <li>Newsletter : jusqu’au désabonnement.</li>
        <li>Statistiques de pages vues : 90 jours.</li>
        <li>Journaux techniques : 30 jours.</li>
      </ul>

      <h3 style="color:var(--white);margin:0 0 10px;">Destinataires</h3>
      <p style="margin:0 0 24px;">
        Les données sont accessibles uniquement à Joseph ALAYE et aux prestataires techniques
        nécessaires au fonctionnement du site (hébergement, envoi d’e-mails). Elles ne sont
        ni vendues ni cédées à des tiers à des fins commerciales.
      </p>

      <h3 style="color:var(--white);margin:0 0 10px;">Vos droits</h3>
      <p style="margin:0 0 24px;">
        Vous disposez d’un droit d’accès, de rectification, d’effacement, de limitation,
        d’opposition et de portabilité. Pour l’exercer, écrivez à
        <a href="mailto:alayejoseph1@gmail.com" style="color:var(--yellow);">alayejoseph1@gmail.com</a>.
        Vous pouvez également introduire une réclamation auprès de l’autorité de protection
        des données compétente.
      </p>

      <h3 style="color:var(--white);margin:0 0 10px;">Cookies et stockage local</h3>
      <p style="margin:0 0 24px;">
        Le site utilise un cookie de session indispensable au fonctionnement (authentification,
        protection CSRF) et un stockage local pour mémoriser votre thème clair/sombre.
        Aucun cookie publicitaire ni traceur tiers n’est utilisé. Si un outil de mesure
        d’audience est ajouté ultérieurement, cette page sera mise à jour.
      </p>

      <h3 style="color:var(--white);margin:0 0 10px;">Sécurité</h3>
      <p style="margin:0 0 24px;">
        Le site est servi en HTTPS en production. Les mots de passe sont hachés, l’accès
        à l’administration est restreint et les formulaires sont protégés contre le CSRF
        et les abus (limitation de débit, honeypot).
      </p>

      <h3 style="color:var(--white);margin:0 0 10px;">Mineurs</h3>
      <p style="margin:0 0 24px;">
        Ce site ne cible pas spécifiquement les mineurs et ne collecte pas sciemment
        leurs données. Un parent peut demander la suppression d’une contribution.
      </p>

      <p style="margin:24px 0 0;font-size:.8rem;">Dernière mise à jour : 25 octobre 2026.</p>
    </div>
  </div>
</section>
@endsection
