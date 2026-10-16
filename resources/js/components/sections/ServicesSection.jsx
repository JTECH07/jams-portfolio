import React from 'react';
import { motion } from 'motion/react';
import ScrollReveal from '../ui/ScrollReveal';
import TextReveal from '../ui/TextReveal';
import MagneticButton from '../ui/MagneticButton';
import ParallaxImage from '../ui/ParallaxImage';

const services = [
  {
    icon: 'bi-globe2',
    title: 'Sites Web',
    desc: 'Sites vitrines, e-commerce, plateformes — de la maquette au déploiement.',
    href: '/services',
    img: '/images/desktop_code.jpg',
  },
  {
    icon: 'bi-phone-fill',
    title: 'Applications Mobile',
    desc: 'Apps natives et cross-platform avec Flutter pour iOS et Android.',
    href: '/services',
    img: '/images/laptop_code.jpg',
  },
  {
    icon: 'bi-palette-fill',
    title: 'UI/UX Design',
    desc: "Interfaces intuitives et esthétiques centrées sur l'expérience utilisateur.",
    href: '/services',
    img: '/images/code.jpg',
  },
  {
    icon: 'bi-robot',
    title: 'IA & Automatisation',
    desc: "Intégration d'IA et automatisation de workflows.",
    href: '/services',
    img: '/images/recognize_face.png',
  },
];

const container = { hidden: {}, visible: { transition: { staggerChildren: 0.12 } } };
const item = {
  hidden: { opacity: 0, y: 40 },
  visible: { opacity: 1, y: 0, transition: { duration: 0.7, ease: [0.21, 0.47, 0.32, 0.98] } },
};

export default function ServicesSection() {
  return (
    <section className="section services-section" style={{ background: 'var(--bg)', borderTop: '1px solid var(--line)', borderBottom: '1px solid var(--line)' }}>
      <div className="section-bg-image" aria-hidden="true">
        <img src="/images/code.jpg" alt="" loading="lazy" />
        <div className="section-bg-overlay" />
      </div>

      <div className="wrap" style={{ position: 'relative', zIndex: 1 }}>
        <div className="section-head" style={{ textAlign: 'center', marginBottom: 48 }}>
          <ScrollReveal>
            <p className="eyebrow" style={{ justifyContent: 'center' }}>
              <span className="eyebrow-line" /> Services
            </p>
          </ScrollReveal>
          <h2 style={{ textAlign: 'center' }}><TextReveal text="Ce que je peux faire pour vous" /></h2>
        </div>

        <motion.div
          className="services-grid"
          variants={container}
          initial="hidden"
          whileInView="visible"
          viewport={{ once: true, amount: 0.2 }}
        >
          {services.map((s) => (
            <motion.a
              key={s.title}
              href={s.href}
              className="service-card-link"
              variants={item}
              whileHover={{ y: -8 }}
              transition={{ type: 'spring', stiffness: 300, damping: 25 }}
            >
              <div className="service-card glass">
                <div className="service-card-img">
                  <img src={s.img} alt={s.title} loading="lazy" />
                  <div className="service-card-img-overlay" />
                </div>
                <div className="service-icon">
                  <i className={`bi ${s.icon}`} />
                </div>
                <h4>{s.title}</h4>
                <p>{s.desc}</p>
                <span className="service-arrow"><i className="bi bi-arrow-right" /></span>
              </div>
            </motion.a>
          ))}
        </motion.div>

        <ScrollReveal delay={0.4} style={{ textAlign: 'center', marginTop: 48 }}>
          <MagneticButton strength={0.2}>
            <a className="btn btn-main" href="/contact">
              <i className="bi bi-envelope" /> Démarrer un projet
            </a>
          </MagneticButton>
        </ScrollReveal>
      </div>
    </section>
  );
}
