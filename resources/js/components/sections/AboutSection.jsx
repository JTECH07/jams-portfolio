import React, { useRef } from 'react';
import { motion, useScroll, useTransform } from 'motion/react';
import ScrollReveal from '../ui/ScrollReveal';
import TextReveal from '../ui/TextReveal';
import MagneticButton from '../ui/MagneticButton';

const tags = [
  { icon: 'bi-boxes', label: 'Laravel' },
  { icon: 'bi-phone', label: 'Flutter' },
  { icon: 'bi-filetype-py', label: 'Python' },
  { icon: 'bi-brush', label: 'UI / UX' },
];

export default function AboutSection() {
  const ref = useRef(null);
  const { scrollYProgress } = useScroll({ target: ref, offset: ['start end', 'end start'] });
  const imgY = useTransform(scrollYProgress, [0, 1], [30, -30]);
  const card1Y = useTransform(scrollYProgress, [0, 1], [0, -20]);
  const card2Y = useTransform(scrollYProgress, [0, 1], [0, -35]);

  return (
    <section className="section about-me-section" id="about-me" ref={ref}>
      <div className="about-me-decor" aria-hidden="true">
        <span className="about-orb about-orb-1" />
        <span className="about-orb about-orb-2" />
        <span className="about-grid-lines" />
      </div>

      <div className="wrap">
        <div className="section-head" style={{ textAlign: 'center', marginBottom: 48 }}>
          <ScrollReveal>
            <p className="eyebrow" style={{ justifyContent: 'center' }}>
              <span className="eyebrow-line" /> À propos
            </p>
          </ScrollReveal>
          <h2 className="about-title" style={{ textAlign: 'center' }}>
            Mais <TextReveal text="qui suis-je" delay={0.1} className="text-accent" /> ?
          </h2>
        </div>

        <div className="about-me-grid">
          <div className="about-me-text">
            <ScrollReveal>
              <h3 className="about-subtitle">
                Salut, moi c'est <span className="about-name">Joseph ALAYE</span> <i className="bi bi-hand-index-thumb-fill about-wave-icon" />
              </h3>
            </ScrollReveal>

            <ScrollReveal delay={0.1}>
              <p className="about-paragraph">
                Développeur Full-Stack basé à <strong>Porto-Novo, Bénin</strong>.
                Je crée des applications web et mobiles <strong>performantes</strong>, de la maquette au déploiement.
              </p>
            </ScrollReveal>

            <ScrollReveal delay={0.2}>
              <div className="about-stats">
                <div className="about-stat">
                  <span className="about-stat-num">3+</span>
                  <span className="about-stat-label">Ans d'expérience</span>
                </div>
                <div className="about-stat">
                  <span className="about-stat-num">15+</span>
                  <span className="about-stat-label">Projets livrés</span>
                </div>
                <div className="about-stat">
                  <span className="about-stat-num">99%</span>
                  <span className="about-stat-label">Satisfaction</span>
                </div>
              </div>
            </ScrollReveal>

            <ScrollReveal delay={0.3}>
              <div className="about-tags">
                {tags.map((t, i) => (
                  <motion.span
                    key={t.label}
                    className="about-tag"
                    initial={{ opacity: 0, y: 8 }}
                    whileInView={{ opacity: 1, y: 0 }}
                    viewport={{ once: true }}
                    transition={{ duration: 0.4, delay: 0.4 + i * 0.07 }}
                    whileHover={{ scale: 1.06 }}
                  >
                    <i className={`bi ${t.icon}`} /> {t.label}
                  </motion.span>
                ))}
              </div>
            </ScrollReveal>

            <ScrollReveal delay={0.4}>
              <div className="btn-row" style={{ marginTop: 24 }}>
                <MagneticButton strength={0.2}>
                  <a className="btn btn-main" href="/contact"><i className="bi bi-envelope" /> Me contacter</a>
                </MagneticButton>
                <MagneticButton strength={0.2}>
                  <a className="btn btn-outline" href="/a-propos"><i className="bi bi-arrow-right" /> En savoir plus</a>
                </MagneticButton>
              </div>
            </ScrollReveal>
          </div>

          <div className="about-me-image">
            <motion.div style={{ y: imgY }}>
              <div className="about-image-frame">
                <img
                  src="/images/me_about.png"
                  alt="Joseph ALAYE"
                  onError={(e) => { e.target.src = '/images/me-in-workspace.png'; }}
                />
                <span className="about-image-glow" />
              </div>
            </motion.div>

            <motion.div className="about-floating-card about-floating-card-1" style={{ y: card1Y }}>
              <i className="bi bi-code-slash" />
              <div>
                <strong>Clean code</strong>
                <span>Architecture maintenable</span>
              </div>
            </motion.div>

            <motion.div className="about-floating-card about-floating-card-2" style={{ y: card2Y }}>
              <i className="bi bi-lightning-charge-fill" />
              <div>
                <strong>Fast delivery</strong>
                <span>Délais respectés</span>
              </div>
            </motion.div>
          </div>
        </div>
      </div>
    </section>
  );
}
