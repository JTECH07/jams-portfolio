import React from 'react';
import ScrollReveal from '../ui/ScrollReveal';
import TextReveal from '../ui/TextReveal';
import MagneticButton from '../ui/MagneticButton';

const highlights = [
  { icon: 'bi-lightning-charge-fill', label: 'Réponse sous 24h' },
  { icon: 'bi-geo-alt-fill', label: 'Porto-Novo, Bénin' },
  { icon: 'bi-globe2', label: 'Missions à distance' },
];

export default function ContactCtaSection() {
  return (
    <section className="section contact-cta-section" id="contact-cta">
      <div className="section-bg-image" aria-hidden="true">
        <img src="/images/desktop_code.jpg" alt="" loading="lazy" />
        <div className="section-bg-overlay" />
      </div>

      <div className="section-bg-shape" aria-hidden="true">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none">
          <path
            fill="var(--bg)"
            fillOpacity="1"
            d="M0,64L48,90.7C96,117,192,171,288,197.3C384,224,480,224,576,202.7C672,181,768,139,864,138.7C960,139,1056,181,1152,197.3C1248,213,1344,203,1392,197.3L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"
          />
        </svg>
      </div>

      <div className="wrap contact-cta-inner">
        <div className="contact-cta-svg" aria-hidden="true">
          <img src="/images/businessman-animate.svg" alt="" loading="lazy" />
        </div>

        <div className="contact-cta-content">
          <ScrollReveal>
            <span className="contact-cta-badge">
              <span className="contact-cta-badge-dot" /> Disponible pour de nouveaux projets
            </span>
          </ScrollReveal>

          <a className="contact-cta-eyebrow" href="/contact">
            Contactez-moi
          </a>

          <h2 className="contact-cta-title">
            <TextReveal text="Un projet en tête ?" />
          </h2>

          <ScrollReveal delay={0.1}>
            <p className="contact-cta-lead">
              Vous avez un projet en tête ? Je suis disponible pour discuter de vos besoins et
              vous aider à concrétiser vos idées. N'hésitez pas à me contacter pour toute
              question ou demande de collaboration.
            </p>
          </ScrollReveal>

          <ScrollReveal delay={0.2}>
            <ul className="contact-cta-highlights">
              {highlights.map(h => (
                <li key={h.label}>
                  <i className={`bi ${h.icon}`} /> {h.label}
                </li>
              ))}
            </ul>
          </ScrollReveal>

          <ScrollReveal delay={0.3}>
            <div className="btn-row contact-cta-actions">
              <MagneticButton strength={0.2}>
                <a className="btn btn-main btn-lg" href="/contact">
                  <i className="bi bi-envelope-fill" /> Démarrer un projet
                </a>
              </MagneticButton>
              <MagneticButton strength={0.2}>
                <a
                  className="btn btn-outline btn-lg"
                  href="https://wa.me/22969423587"
                  target="_blank"
                  rel="noopener"
                >
                  <i className="bi bi-whatsapp" /> Discuter sur WhatsApp
                </a>
              </MagneticButton>
            </div>
          </ScrollReveal>

          <ScrollReveal delay={0.4}>
            <p className="contact-cta-mail">
              Ou par e-mail : <a href="mailto:alayejoseph1@gmail.com">alayejoseph1@gmail.com</a>
            </p>
          </ScrollReveal>
        </div>
      </div>
    </section>
  );
}
