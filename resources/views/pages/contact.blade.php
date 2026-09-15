@extends('layouts.app')

@section('content')
<section class="section" id="contact">
  <div class="wrap">
    <div class="section-head reveal">
      <p class="eyebrow" style="color: var(--yellow);">Contact</p>
      <h2>Discutons de votre besoin</h2>
      <p>Projet, recrutement, mission freelance ou stage : je réponds rapidement avec une proposition claire.</p>
    </div>

    <div class="split">
      {{-- Coordonnées --}}
      <article class="panel glass reveal">
        <h3 style="color: var(--yellow); font-size: 1.5rem; margin-bottom: 16px;">Coordonnées & réseaux</h3>
        <p style="color: var(--muted); margin-bottom: 24px;">Joignable rapidement pour cadrer une mission, une opportunité ou un projet digital.</p>

        <div class="contact-cards">
          <div class="contact-card">
            <i class="bi bi-envelope-fill" style="color: var(--accent);"></i>
            <span>E-mail</span>
            <strong><a href="mailto:alayejoseph1@gmail.com">alayejoseph1@gmail.com</a></strong>
          </div>
          <div class="contact-card">
            <i class="bi bi-telephone-fill" style="color: var(--accent-2);"></i>
            <span>Téléphone</span>
            <strong><a href="tel:+2290169423587">+229 01 69 42 35 87</a></strong>
          </div>
          <div class="contact-card">
            <i class="bi bi-geo-alt-fill" style="color: var(--yellow);"></i>
            <span>Localisation</span>
            <strong>Porto-Novo, Bénin</strong>
          </div>
        </div>

        <div class="social-links" style="margin-top: 24px;">
          <a class="social-link" href="https://www.linkedin.com/in/ms-joseph-alaye/" target="_blank" rel="noopener" style="border-color: var(--accent); color: var(--accent);">
            <i class="bi bi-linkedin"></i> LinkedIn
          </a>
          <a class="social-link" href="https://github.com/JTECH07" target="_blank" rel="noopener">
            <i class="bi bi-github"></i> GitHub
          </a>
          <a class="social-link" href="https://web.facebook.com/ms.joseph.alaye7/" target="_blank" rel="noopener" style="border-color: #1877F2; color: #1877F2;">
            <i class="bi bi-facebook"></i> Facebook
          </a>
          <a class="social-link" href="https://wa.me/22969423587" target="_blank" rel="noopener" style="border-color: #25D366; color: #25D366;">
            <i class="bi bi-whatsapp"></i> WhatsApp
          </a>
        </div>

        <div class="btn-row" style="margin-top: 24px;">
          <a class="btn btn-main" href="{{ asset('CV_Joseph_ALAYE.pdf') }}" target="_blank" rel="noopener">
            <i class="bi bi-file-earmark-pdf"></i> Télécharger CV
          </a>
        </div>
      </article>

      {{-- Formulaire --}}
      <article class="panel glass reveal">
        <h3 style="color: var(--accent-2); font-size: 1.5rem; margin-bottom: 16px;">Formulaire de contact</h3>

        @if(session('success'))
          <div class="alert-success" style="padding: 14px 18px; border-radius: 12px; border: 1px solid var(--ok); background: rgba(16,185,129,0.1); color: var(--ok); margin-bottom: 20px; font-weight: 500;">
            <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
          </div>
        @endif

        <form class="contact-form" id="laravelContactForm"
              action="{{ route('contact.send') }}"
              method="POST">
          @csrf

          <div class="form-row">
            <div class="field">
              <label for="contactName">Nom complet</label>
              <input id="contactName" name="name" type="text" placeholder="Votre nom..." required value="{{ old('name') }}" />
              @error('name')<span class="field-error">{{ $message }}</span>@enderror
            </div>
            <div class="field">
              <label for="contactEmail">E-mail</label>
              <input id="contactEmail" name="email" type="email" placeholder="votre@email.com" required value="{{ old('email') }}" />
              @error('email')<span class="field-error">{{ $message }}</span>@enderror
            </div>
          </div>

          <div class="field">
            <label for="proposalType">Type de demande</label>
            <select id="proposalType" name="proposal">
              <option value="Collaboration projet" {{ old('proposal') == 'Collaboration projet' ? 'selected' : '' }}>Collaboration projet</option>
              <option value="Mission freelance" {{ old('proposal') == 'Mission freelance' ? 'selected' : '' }}>Mission freelance</option>
              <option value="Recrutement (stage/CDI/mission)" {{ old('proposal') == 'Recrutement (stage/CDI/mission)' ? 'selected' : '' }}>Recrutement (stage / CDI / mission)</option>
              <option value="Partenariat JAMS TECH" {{ old('proposal') == 'Partenariat JAMS TECH' ? 'selected' : '' }}>Partenariat JAMS TECH</option>
            </select>
          </div>

          <div class="field">
            <label for="talkSubject">Sujet / projet</label>
            <input id="talkSubject" name="subject" type="text" placeholder="Ex : Site vitrine, app mobile, automatisation..." value="{{ old('subject') }}" />
          </div>

          <div class="field">
            <label>Domaines de collaboration (optionnel)</label>
            <div class="checks">
              <label><input type="checkbox" name="collab_item[]" value="Landing page / site vitrine"> Landing page / site vitrine</label>
              <label><input type="checkbox" name="collab_item[]" value="Application web full-stack"> Application web / mobile full-stack</label>
              <label><input type="checkbox" name="collab_item[]" value="Automatisation digitale"> Automatisation digitale</label>
              <label><input type="checkbox" name="collab_item[]" value="Création de contenu IA"> Création de contenu IA</label>
            </div>
          </div>

          <div class="field">
            <label for="messageText">Message</label>
            <textarea id="messageText" name="message" placeholder="Décrivez rapidement votre besoin..." required>{{ old('message') }}</textarea>
            @error('message')<span class="field-error">{{ $message }}</span>@enderror
          </div>

          <article class="proposal-preview" id="proposalPreview">
            <div><i class="bi bi-tag" style="color: var(--accent);"></i> <strong>Proposition :</strong> <span id="previewProposal">Collaboration projet</span></div>
            <div><i class="bi bi-chat-left-text" style="color: var(--accent-2);"></i> <strong>Sujet :</strong> <span id="previewSubject">À définir</span></div>
            <div><i class="bi bi-check2-all" style="color: var(--yellow);"></i> <strong>Collaboration :</strong> <span id="previewItems">À préciser</span></div>
          </article>

          <div class="btn-row" style="margin-top: 20px;">
            <button class="btn btn-main" type="submit">
              <i class="bi bi-send-fill"></i> Envoyer
            </button>
            <button class="btn btn-outline" type="reset">Réinitialiser</button>
          </div>
        </form>
      </article>
    </div>
  </div>
</section>
@endsection
