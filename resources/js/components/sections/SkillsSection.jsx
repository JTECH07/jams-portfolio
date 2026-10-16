import React from 'react';
import { motion } from 'motion/react';
import ScrollReveal from '../ui/ScrollReveal';
import TextReveal from '../ui/TextReveal';

const skills = [
  { icon: 'bi-filetype-html', label: 'HTML5' },
  { icon: 'bi-filetype-css', label: 'CSS3' },
  { icon: 'bi-filetype-js', label: 'JavaScript' },
  { icon: 'bi-boxes', label: 'Laravel' },
  { icon: 'bi-phone', label: 'Flutter' },
  { icon: 'bi-filetype-py', label: 'Python' },
  { icon: 'bi-database', label: 'MySQL' },
  { icon: 'bi-filetype-java', label: 'Java' },
  { icon: 'bi-pen', label: 'Figma' },
  { icon: 'bi-git', label: 'Git' },
];

export default function SkillsSection() {
  return (
    <section className="section" style={{ background: 'var(--bg)' }}>
      <div className="wrap">
        <div className="section-head" style={{ textAlign: 'center', marginBottom: 40 }}>
          <ScrollReveal>
            <p className="eyebrow" style={{ justifyContent: 'center' }}>
              <span className="eyebrow-line" /> Compétences
            </p>
          </ScrollReveal>
          <h2 style={{ textAlign: 'center' }}><TextReveal text="Mon arsenal technique" /></h2>
        </div>

        <div className="marquee-wrap">
          <motion.div
            className="marquee-track"
            animate={{ x: ['0%', '-50%'] }}
            transition={{ duration: 25, repeat: Infinity, ease: 'linear' }}
          >
            {[...skills, ...skills].map((s, i) => (
              <motion.div
                key={`${s.label}-${i}`}
                className="home-skill-pill glass skill-desaturated"
                whileHover={{ scale: 1.08, y: -3 }}
                transition={{ type: 'spring', stiffness: 400, damping: 20 }}
              >
                <i className={`bi ${s.icon}`} />
                <span>{s.label}</span>
              </motion.div>
            ))}
          </motion.div>
        </div>

        <ScrollReveal delay={0.3} style={{ textAlign: 'center', marginTop: 32 }}>
          <a className="btn btn-outline" href="/competences">
            <i className="bi bi-arrow-right" /> Toutes les compétences
          </a>
        </ScrollReveal>
      </div>
    </section>
  );
}
