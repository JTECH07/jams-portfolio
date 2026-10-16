import React from 'react';
import { motion } from 'motion/react';
import ScrollReveal from '../ui/ScrollReveal';
import TextReveal from '../ui/TextReveal';
import ParallaxImage from '../ui/ParallaxImage';

const features = [
  {
    num: '01',
    icon: 'bi-lightning-charge-fill',
    title: 'Livraison rapide',
    desc: 'Des délais clairs définis dès le départ. Vous recevez des mises à jour régulières et savez toujours où en est votre projet.',
    stat: '98%',
    statLabel: 'livré à temps',
  },
  {
    num: '02',
    icon: 'bi-phone-fill',
    title: 'Mobile-first',
    desc: 'Chaque interface est conçue d\'abord pour le mobile, puis adaptée au desktop. Votre site sera parfait partout.',
    stat: '60%',
    statLabel: 'du trafic est mobile',
  },
  {
    num: '03',
    icon: 'bi-shield-check',
    title: 'Code sécurisé',
    desc: 'Bonnes pratiques OWASP, validation des inputs, protection des données. La sécurité n\'est pas une option.',
    stat: '100%',
    statLabel: 'code audité',
  },
  {
    num: '04',
    icon: 'bi-people-fill',
    title: 'Communication claire',
    desc: 'Pas de jargon inutile. Je vous explique chaque décision technique en termes simples et reste disponible en continu.',
    stat: '24h',
    statLabel: 'temps de réponse',
  },
];

export default function ValueSection() {
  return (
    <section className="section value-section" id="pourquoi">
      {/* Image de fond subtile */}
      <div className="section-bg-image" aria-hidden="true">
        <img src="/images/desktop_code.jpg" alt="" loading="lazy" />
        <div className="section-bg-overlay" />
      </div>

      <div className="wrap">
        {/* Header */}
        <div className="value-header">
          <ScrollReveal>
            <p className="eyebrow">
              <span className="eyebrow-line" />
              Pourquoi me faire confiance
            </p>
          </ScrollReveal>
          <h2>
            <TextReveal text="Ce qui me rend" />
            <br />
            <TextReveal text="différent" delay={0.15} className="text-accent" />
          </h2>
          <ScrollReveal delay={0.3}>
            <p className="value-header-desc">
              Je ne me contente pas de coder. Je comprends votre besoin, je le traduis
              en solution concrète et je vous accompagne jusqu'à la livraison.
            </p>
          </ScrollReveal>
        </div>

        {/* Grille features avec numéros */}
        <div className="value-features-grid">
          {features.map((f, i) => (
            <ScrollReveal key={f.num} delay={i * 0.12}>
              <motion.div
                className="value-feature-card"
                whileHover={{ y: -6, transition: { duration: 0.3 } }}
              >
                <span className="value-feature-num">{f.num}</span>
                <div className="value-feature-icon">
                  <i className={`bi ${f.icon}`} />
                </div>
                <h3>{f.title}</h3>
                <p>{f.desc}</p>
                <div className="value-feature-stat">
                  <span className="value-stat-number">{f.stat}</span>
                  <span className="value-stat-label">{f.statLabel}</span>
                </div>
              </motion.div>
            </ScrollReveal>
          ))}
        </div>

        {/* Bandeau image + citation */}
        <ScrollReveal delay={0.5}>
          <div className="value-banner">
            <div className="value-banner-image">
              <ParallaxImage src="/images/laptop_code.jpg" alt="Développement en cours" speed={0.1} />
            </div>
            <div className="value-banner-content">
              <div className="value-banner-quote">
                <i className="bi bi-quote" />
                <p>Chaque projet est une opportunité de créer quelque chose d'utile, beau et durable.</p>
              </div>
              <div className="value-banner-cta">
                <a className="btn btn-main" href="/contact">
                  <i className="bi bi-envelope" /> Discutons de votre projet
                </a>
              </div>
            </div>
          </div>
        </ScrollReveal>
      </div>
    </section>
  );
}
