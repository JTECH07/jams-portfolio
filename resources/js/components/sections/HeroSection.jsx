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

  const heroTitle = lang === 'fr' ? 'Développeur Logiciels & IA' : 'Developer Software & IA';
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
        backgroundImage: 'url("/images/Programming_code_morphs_into_neu…_20261003152800.gif")',
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
                <i className={`bi ${t.icon}`} /> {t.name}
              </span>
            ))}
          </motion.div>
        </motion.div>
      </SwarmCursor>
    </section>
  );
}
