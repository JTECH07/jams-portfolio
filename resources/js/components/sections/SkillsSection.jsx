import React from 'react';
import { motion, useReducedMotion } from 'motion/react';
import ScrollReveal from '../ui/ScrollReveal';
import TextReveal from '../ui/TextReveal';
import './SkillsSection.css';

const DEVICON = name =>
  `https://cdn.jsdelivr.net/gh/devicons/devicon/icons/${name}/${name}-original.svg`;

const CATEGORIES = [
  {
    id: 'frontend',
    title: 'Frontend',
    icon: 'bi-window-stack',
    accent: '#38bdf8',
    description: 'Interfaces rapides, accessibles et responsives.',
    techs: [
      { name: 'React', icon: DEVICON('react'), color: '#61dafb', level: 88 },
      { name: 'JavaScript', icon: DEVICON('javascript'), color: '#f7df1e', level: 90 },
      { name: 'HTML5', icon: DEVICON('html5'), color: '#e34f26', level: 95 },
      { name: 'CSS3', icon: DEVICON('css3'), color: '#1572b6', level: 92 },
      { name: 'Tailwind', icon: DEVICON('tailwindcss'), color: '#38bdf8', level: 84 },
      { name: 'Bootstrap', icon: DEVICON('bootstrap'), color: '#7952b3', level: 86 },
    ],
  },
  {
    id: 'backend',
    title: 'Backend',
    icon: 'bi-diagram-3',
    accent: '#a78bfa',
    description: 'APIs solides et logique métier maintenable.',
    techs: [
      { name: 'Laravel', icon: DEVICON('laravel'), color: '#ff2d20', level: 90 },
      { name: 'PHP', icon: DEVICON('php'), color: '#777bb4', level: 88 },
      { name: 'Python', icon: DEVICON('python'), color: '#3776ab', level: 82 },
      { name: 'Node.js', icon: DEVICON('nodejs'), color: '#5fa04e', level: 76 },
      { name: 'Java', icon: DEVICON('java'), color: '#f89820', level: 78 },
      { name: 'C++', icon: DEVICON('cplusplus'), color: '#00599c', level: 74 },
    ],
  },
  {
    id: 'mobile-data',
    title: 'Mobile & Data',
    icon: 'bi-phone-fill',
    accent: '#34d399',
    description: 'Applications mobiles et données structurées.',
    techs: [
      { name: 'Flutter', icon: DEVICON('flutter'), color: '#54c5f8', level: 86 },
      { name: 'Dart', icon: DEVICON('dart'), color: '#0175c2', level: 84 },
      { name: 'MySQL', icon: DEVICON('mysql'), color: '#4479a1', level: 88 },
      { name: 'PostgreSQL', icon: DEVICON('postgresql'), color: '#4169e1', level: 78 },
      { name: 'MongoDB', icon: DEVICON('mongodb'), color: '#47a248', level: 72 },
    ],
  },
  {
    id: 'tools',
    title: 'Outils & Design',
    icon: 'bi-bezier2',
    accent: '#f5dc5a',
    description: 'Un workflow propre, du design au déploiement.',
    techs: [
      { name: 'Git', icon: DEVICON('git'), color: '#f05032', level: 88 },
      { name: 'GitHub', icon: DEVICON('github'), color: '#e6edf3', level: 90 },
      { name: 'Docker', icon: DEVICON('docker'), color: '#2496ed', level: 76 },
      { name: 'Figma', icon: DEVICON('figma'), color: '#f24e1e', level: 84 },
      { name: 'Vite', icon: DEVICON('vitejs'), color: '#646cff', level: 80 },
    ],
  },
];

const gridVariants = {
  hidden: {},
  visible: { transition: { staggerChildren: 0.09, delayChildren: 0.05 } },
};

const cardVariants = {
  hidden: { opacity: 0, y: 32 },
  visible: {
    opacity: 1,
    y: 0,
    transition: { duration: 0.7, ease: [0.21, 0.47, 0.32, 0.98] },
  },
};

const chipVariants = {
  hidden: { opacity: 0, y: 14 },
  visible: {
    opacity: 1,
    y: 0,
    transition: { duration: 0.5, ease: [0.21, 0.47, 0.32, 0.98] },
  },
};

const RADIUS = 13;
const CIRCUMFERENCE = 2 * Math.PI * RADIUS;

const SkillRing = ({ level, color }) => (
  <svg
    className="skills-bento-ring"
    viewBox="0 0 32 32"
    aria-hidden="true"
    focusable="false"
  >
    <circle className="skills-bento-ring-track" cx="16" cy="16" r={RADIUS} />
    <motion.circle
      className="skills-bento-ring-value"
      cx="16"
      cy="16"
      r={RADIUS}
      stroke={color}
      strokeDasharray={CIRCUMFERENCE}
      initial={{ strokeDashoffset: CIRCUMFERENCE }}
      whileInView={{ strokeDashoffset: CIRCUMFERENCE * (1 - level / 100) }}
      viewport={{ once: true, amount: 0.6 }}
      transition={{ duration: 1.1, ease: [0.22, 1, 0.36, 1] }}
    />
  </svg>
);

export default function SkillsSection() {
  const reduced = useReducedMotion();

  return (
    <section className="section skills-bento-section" id="skills">
      <div className="skills-bento-decor" aria-hidden="true">
        <span className="skills-bento-orb skills-bento-orb-one" />
        <span className="skills-bento-orb skills-bento-orb-two" />
        <span className="skills-bento-grid-lines" />
      </div>

      <div className="wrap">
        <div className="section-head skills-bento-head">
          <ScrollReveal>
            <p className="eyebrow">
              <span className="eyebrow-line" /> Compétences
            </p>
          </ScrollReveal>
          <h2>
            <TextReveal text="Mon arsenal" />{' '}
            <TextReveal text="technique" delay={0.12} className="text-accent" />
          </h2>
          <ScrollReveal delay={0.2}>
            <p>
              Une stack choisie pour livrer des produits fiables : du composant d’interface
              à la base de données, en passant par le déploiement.
            </p>
          </ScrollReveal>
        </div>

        <motion.div
          className="skills-bento-grid"
          variants={gridVariants}
          initial={reduced ? false : 'hidden'}
          whileInView="visible"
          viewport={{ once: true, amount: 0.15 }}
        >
          {CATEGORIES.map((category, categoryIndex) => (
            <motion.article
              key={category.id}
              className={`skills-bento-card skills-bento-card--${category.id}`}
              style={{ '--category-accent': category.accent }}
              variants={cardVariants}
            >
              <div className="skills-bento-card-glow" aria-hidden="true" />

              <header className="skills-bento-card-head">
                <span className="skills-bento-card-icon" aria-hidden="true">
                  <i className={`bi ${category.icon}`} />
                </span>
                <div>
                  <h3>{category.title}</h3>
                  <p>{category.description}</p>
                </div>
                <span className="skills-bento-card-count">
                  {String(category.techs.length).padStart(2, '0')}
                </span>
              </header>

              <motion.ul
                className="skills-bento-chips"
                variants={gridVariants}
                initial="hidden"
                whileInView="visible"
                viewport={{ once: true, amount: 0.3 }}
              >
                {category.techs.map((tech, techIndex) => (
                  <motion.li
                    key={tech.name}
                    className="skills-bento-chip"
                    style={{ '--tech-color': tech.color }}
                    variants={chipVariants}
                    custom={techIndex}
                  >
                    <a
                      className="skills-bento-chip-inner"
                      href="/competences"
                      aria-label={tech.name}
                    >
                      <span className="skills-bento-chip-icon" aria-hidden="true">
                        <img src={tech.icon} alt="" loading="lazy" decoding="async" />
                      </span>
                      <span className="skills-bento-chip-body">
                        <span className="skills-bento-chip-name">{tech.name}</span>
                      </span>
                      <SkillRing level={tech.level} color={tech.color} />
                      <span className="skills-bento-tooltip" aria-hidden="true">
                        {tech.name} · {tech.level}%
                      </span>
                    </a>
                  </motion.li>
                ))}
              </motion.ul>

              <span className="skills-bento-index" aria-hidden="true">
                {String(categoryIndex + 1).padStart(2, '0')}
              </span>
            </motion.article>
          ))}
        </motion.div>

        <ScrollReveal delay={0.25}>
          <div className="skills-bento-footer">
            <p>
              <i className="bi bi-lightning-charge-fill" /> Toujours en veille : j’apprends
              une techno quand elle sert réellement le produit.
            </p>
            <a className="btn btn-outline" href="/competences">
              Voir le détail <i className="bi bi-arrow-right" />
            </a>
          </div>
        </ScrollReveal>
      </div>
    </section>
  );
}
