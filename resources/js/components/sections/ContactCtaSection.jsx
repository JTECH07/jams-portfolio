import React from 'react';
import { motion } from 'motion/react';
import ScrollReveal from '../ui/ScrollReveal';
import TextReveal from '../ui/TextReveal';
import MagneticButton from '../ui/MagneticButton';

const testimonials = [
  { name: 'Client A', text: 'Excellent travail, délais respectés.', rating: 5 },
  { name: 'Client B', text: 'Professionnel et réactif.', rating: 5 },
  { name: 'Client C', text: 'Je recommande vivement.', rating: 5 },
];

export default function ContactCtaSection() {
  return (
    <section className="section contact-cta-section" style={{ background: 'var(--bg-soft)', borderTop: '1px solid var(--line)', padding: '80px 0' }}>
      <div className="section-bg-image" aria-hidden="true">
        <img src="/images/desktop_code.jpg" alt="" loading="lazy" />
        <div className="section-bg-overlay" />
      </div>
      <div className="wrap" style={{ textAlign: 'center', position: 'relative', zIndex: 1 }}>
        <ScrollReveal>
          <div className="contact-cta-icon">
            <i className="bi bi-send-fill" />
          </div>
          <h2 style={{ marginBottom: 12 }}><TextReveal text="Un projet en tête ?" /></h2>
          <p style={{ color: 'var(--muted)', maxWidth: 480, margin: '0 auto 36px', fontSize: '1.05rem' }}>
            Freelance, stage ou collaboration. Parlons-en.
          </p>
        </ScrollReveal>

        <ScrollReveal delay={0.2}>
          <div className="testimonials-row">
            {testimonials.map((t, i) => (
              <motion.div
                key={t.name}
                className="testimonial-mini glass"
                initial={{ opacity: 0, y: 20 }}
                whileInView={{ opacity: 1, y: 0 }}
                viewport={{ once: true }}
                transition={{ duration: 0.5, delay: 0.3 + i * 0.1 }}
              >
                <div className="testimonial-stars">
                  {Array.from({ length: t.rating }).map((_, j) => (
                    <i key={j} className="bi bi-star-fill" />
                  ))}
                </div>
                <p>"{t.text}"</p>
                <span className="testimonial-name">— {t.name}</span>
              </motion.div>
            ))}
          </div>
        </ScrollReveal>

        <ScrollReveal delay={0.5} style={{ marginTop: 40 }}>
          <div className="btn-row" style={{ justifyContent: 'center' }}>
            <MagneticButton strength={0.2}>
              <a className="btn btn-main" href="/contact"><i className="bi bi-envelope" /> Démarrer un projet</a>
            </MagneticButton>
            <MagneticButton strength={0.2}>
              <a className="btn btn-outline" href="https://wa.me/22969423587" target="_blank" rel="noopener"><i className="bi bi-whatsapp" /> WhatsApp</a>
            </MagneticButton>
          </div>
        </ScrollReveal>
      </div>
    </section>
  );
}
