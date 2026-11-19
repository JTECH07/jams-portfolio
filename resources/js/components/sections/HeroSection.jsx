import React, { useRef, useEffect, useState } from 'react';
import { motion, useTransform } from 'motion/react';
import TextReveal from '../ui/TextReveal';
import MagneticButton from '../ui/MagneticButton';
import SwarmCursor from '../SwarmCursor';

const techLogos = [
  { name: 'Laravel', icon: 'bi-boxes' },
  { name: 'React', icon: 'bi-react' },
  { name: 'Node.js', icon: 'bi-node-plus' },
  { name: 'Flutter', icon: 'bi-phone' },
  { name: 'C++', icon: 'bi-filetype-cpp' },
  { name: 'Python', icon: 'bi-filetype-py' },
  { name: 'Machine Learning', icon: 'bi-robot' },
  { name: 'MySQL', icon: 'bi-database' },
  { name: 'Git', icon: 'bi-git' },
  { name: 'Docker', icon: 'bi-box-arrow-up' },
  { name: 'PostgreSQL', icon: 'bi-database' },
];

export default function HeroSection({ lang = 'fr', toggleLang }) {
  const [isDark, setIsDark] = useState(() => {
    return window.matchMedia('(prefers-color-scheme: dark)').matches;
  });

  // Update dark mode on system change
  useEffect(() => {
    const mq = window.matchMedia('(prefers-color-scheme: dark)');
    setIsDark(mq.matches);
    mq.addEventListener('change', (e) => setIsDark(e.matches));
  }, []);

  const heroTitle = lang === 'fr' 
    ? 'Développeur Logiciels & IA' 
    : 'Developer Software & IA';
  const heroSubtitle = lang === 'fr'
    ? 'Je conçois des applications web et mobiles performantes, propulsées par l\'IA'
    : 'I create performant web and mobile applications powered by AI';
  const heroCta = lang === 'fr' ? 'Voir mes projets' : 'See my projects';

  return (
    <section
      className="hero-new"
      id="home"
      style={{
        backgroundColor: isDark ? '#111' : '#fff',
        backgroundImage: 
          'url("/images/Programming_code_morphs_into_neu…_20261003152800.gif")',
        backgroundSize: 'cover',
        backgroundPosition: 'center',
        backgroundRepeat: 'no-repeat',
      }}
    >
      <SwarmCursor
        count={300}
        size={2}
        spread={80}
        swirl={0.3}
        color={isDark ? '#E8C547' : '#E8C547'}
        accentColor={isDark ? '#F5DC5A' : '#F5DC5A'}
        clickEffect="burst"
        idle="roam"
        className="hero-swarm"
      >
        {/* Tech logos marquee en bas */}
        <motion.div
          className="hero-new-marquee"
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
        </SwarmCursor>

        {/* Photo centrée */}
        <motion.div 
          className="hero-new-photo" 
          style={{ y: 0 }}
        >
          <motion.div
            className="hero-new-photo-frame"
            initial={{ opacity: 0, scale: 0.9 }}
            animate={{ opacity: 1, scale: 1 }}
            transition={{ duration: 1, delay: 0.2, ease: [0.21, 0.47, 0.32, 0.98] }}
          >
            <img
              src="/images/me_professionnel.webp"
              alt={lang === 'fr' ? 'Joseph ALAYE' : 'Joseph ALAYE'}
              width="500"
              height="650"
              fetchPriority="high"
              decoding="async"
              onError={(e) => { e.target.src = '/images/me.png'; }}
            />
            <div className="hero-new-photo-glow" />
          </motion.div>
        </motion.div>

        {/* Contenu gauche */}
        <motion.div className="hero-new-left" style={{ opacity: 1 }}>
          <motion.h1
            initial={{ opacity: 0, x: -40 }}
            animate={{ opacity: 1, x: 0 }}
            transition={{ duration: 0.8, delay: 0.5 }}
          >
            {heroTitle}<br />
            <span className="hero-new-highlight">{lang === 'fr' ? 'Logiciels' : 'Software'}</span><br />
            & {lang === 'fr' ? 'Ingénieur' : 'Engineer'}
            <span className="hero-new-highlight">{lang === 'fr' ? ' IA' : ' AI'}</span><br />
          </motion.h1>

          <motion.div
            className="hero-new-cta"
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.5, delay: 1.2 }}
          >
            <MagneticButton strength={0.25}>
              <a className="btn-hero-gold" href="/projets">
                <span>{heroCta}</span>
                <i className="bi bi-arrow-right" />
              </a>
            </MagneticButton>
          </motion.div>
        </motion.div>

        {/* Contenu droit */}
        <motion.div className="hero-new-right" style={{ opacity: 1 }}>
          <motion.h3
            animate={{ opacity: 1, x: 0 }}
            transition={{ duration: 0.8, delay: 0.7 }}
          >
            Salut, moi c'est <strong>Joseph ALAYE</strong> |<br /> Je conçois des <span className="hero-new-highlight">{lang === 'fr' ? 'applications' : 'applications'}<br /> web et mobiles  performantes, <br/>propulsées par l'<span className="hero-new-highlight">{lang === 'fr' ? 'IA' : 'AI'}</span>.
          </motion.h3>
          <motion.div
            animate={{ opacity: 1 }}
            transition={{ duration: 0.5, delay: 1.0 }}
            style={{ marginTop: 16 }}
          >
            <a className="hero-new-link" href="/CV_Joseph_ALAYE.pdf" target="_blank" rel="noopener">
              <i className="bi bi-download" /> Télécharger mon CV
            </a>
          </motion.div>
        </motion.div>

        {/* Gros nom en bas */}
        <motion.div className="hero-new-name" style={{ y: 0 }} aria-hidden="true">
          <motion.span
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 1, delay: 0.8, ease: [0.21, 0.47, 0.32, 0.98] }}
          >
            JOSEPH
          </motion.span>
        </motion.div>
      </SwarmCursor>
    </section>
  );
}
