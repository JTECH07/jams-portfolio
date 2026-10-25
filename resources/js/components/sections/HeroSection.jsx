import React, { useRef } from 'react';
import { motion, useScroll, useTransform, AnimatePresence } from 'motion/react';
import TextReveal from '../ui/TextReveal';
import MagneticButton from '../ui/MagneticButton';
import SwarmCursor from '../SwarmCursor';

const bgImages = [
  '/images/desktop_code.jpg',
  '/images/code.jpg',
  '/images/laptop_code.jpg',
  '/images/recognize_face.webp',
];

const techLogos = [
  { name: 'Laravel', icon: 'bi-boxes' },
  { name: 'Flutter', icon: 'bi-phone' },
  { name: 'Python', icon: 'bi-filetype-py' },
  { name: 'React', icon: 'bi-react' },
  { name: 'Node.js', icon: 'bi-node-plus' },
  { name: 'MySQL', icon: 'bi-database' },
  { name: 'Git', icon: 'bi-git' },
  { name: 'Docker', icon: 'bi-box-arrow-up' },
];

export default function HeroSection() {
  const ref = useRef(null);
  const { scrollYProgress } = useScroll({ target: ref, offset: ['start start', 'end start'] });
  const photoY = useTransform(scrollYProgress, [0, 1], ['0%', '15%']);
  const nameY = useTransform(scrollYProgress, [0, 1], ['0%', '30%']);
  const contentOpacity = useTransform(scrollYProgress, [0, 0.6], [1, 0]);

  return (
    <section className="hero-new" id="home" ref={ref}>
      <SwarmCursor
        count={400}
        size={2}
        spread={90}
        swirl={0.4}
        color="#E8C547"
        accentColor="#F5DC5A"
        clickEffect="burst"
        idle="roam"
        className="hero-swarm"
      >
        {/* ─── Slider images tech en fond ─── */}
        <div className="hero-bg-slider" aria-hidden="true">
          <AnimatePresence>
            {bgImages.map((img, i) => (
              <motion.div
                key={img}
                className="hero-bg-slide"
                style={{ backgroundImage: `url(${img})` }}
                initial={{ opacity: 0, scale: 1.1 }}
                animate={{ opacity: [0, 0.25, 0.25, 0], scale: [1.1, 1, 1, 1.05] }}
                transition={{ duration: 16, delay: i * 4, repeat: Infinity, ease: 'easeInOut' }}
              />
            ))}
          </AnimatePresence>
          <div className="hero-bg-overlay" />
        </div>

        {/* ─── Badge dispo ─── */}
        <motion.div
          className="hero-new-badge"
          initial={{ opacity: 0, y: -20 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.6, delay: 0.3 }}
        >
          <span className="hero-new-badge-dot" />
          <span>Disponible pour projets</span>
        </motion.div>

        {/* ─── Photo centrée ─── */}
        <motion.div className="hero-new-photo" style={{ y: photoY }}>
          <motion.div
            className="hero-new-photo-frame"
            initial={{ opacity: 0, scale: 0.9 }}
            animate={{ opacity: 1, scale: 1 }}
            transition={{ duration: 1, delay: 0.2, ease: [0.21, 0.47, 0.32, 0.98] }}
          >
            <img
              src="/images/me_professionnel.webp"
              alt="Joseph ALAYE"
              width="500"
              height="650"
              fetchPriority="high"
              decoding="async"
              onError={(e) => { e.target.src = '/images/me.png'; }}
            />
            <div className="hero-new-photo-glow" />
          </motion.div>
        </motion.div>

        {/* ─── Contenu gauche ─── */}
        <motion.div className="hero-new-left" style={{ opacity: contentOpacity }}>
          <motion.h1
            initial={{ opacity: 0, x: -40 }}
            animate={{ opacity: 1, x: 0 }}
            transition={{ duration: 0.8, delay: 0.5 }}
          >
            Développeur<br />
            <span className="hero-new-highlight">Full-Stack</span><br />
            & IA
          </motion.h1>

          <motion.div
            className="hero-new-cta"
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.5, delay: 1.2 }}
          >
            <MagneticButton strength={0.25}>
              <a className="btn-hero-gold" href="/projets">
                <span>Voir mes projets</span>
                <i className="bi bi-arrow-right" />
              </a>
            </MagneticButton>
          </motion.div>
        </motion.div>

        {/* ─── Contenu droit ─── */}
        <motion.div className="hero-new-right" style={{ opacity: contentOpacity }}>
          <motion.p
            initial={{ opacity: 0, x: 40 }}
            animate={{ opacity: 1, x: 0 }}
            transition={{ duration: 0.8, delay: 0.7 }}
          >
            Salut, moi c'est <strong>Joseph ALAYE</strong> | Je conçois des applications web et mobiles performantes, propulsées par l'IA.
          </motion.p>
          <motion.div
            initial={{ opacity: 0 }}
            animate={{ opacity: 1 }}
            transition={{ duration: 0.5, delay: 1.0 }}
            style={{ marginTop: 16 }}
          >
            <a className="hero-new-link" href="/CV_Joseph_ALAYE.pdf" target="_blank" rel="noopener">
              <i className="bi bi-download" /> Télécharger mon CV
            </a>
          </motion.div>
        </motion.div>

        {/* ─── Gros nom en bas ─── */}
        <motion.div className="hero-new-name" style={{ y: nameY }} aria-hidden="true">
          <motion.span
            initial={{ opacity: 0, y: 60 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 1, delay: 0.8, ease: [0.21, 0.47, 0.32, 0.98] }}
          >
            JOSEPH
          </motion.span>
        </motion.div>

        {/* ─── Marquee tech logos en bas ─── */}
        <motion.div
          className="hero-new-marquee"
          initial={{ opacity: 0 }}
          animate={{ opacity: 1 }}
          transition={{ duration: 0.8, delay: 1.5 }}
        >
          <motion.div
            className="hero-new-marquee-track"
            animate={{ x: ['0%', '-50%'] }}
            transition={{ duration: 20, repeat: Infinity, ease: 'linear' }}
          >
            {[...techLogos, ...techLogos].map((t, i) => (
              <span key={`${t.name}-${i}`} className="hero-new-marquee-item">
                <i className={`bi ${t.icon}`} />
                <span>{t.name}</span>
              </span>
            ))}
          </motion.div>
        </motion.div>
      </SwarmCursor>
    </section>
  );
}
