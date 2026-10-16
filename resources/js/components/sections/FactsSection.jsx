import React from 'react';
import { motion } from 'motion/react';
import AnimatedCounter from '../ui/AnimatedCounter';

const facts = [
  { value: 15, suffix: '+', label: 'Projets réalisés' },
  { value: 99, suffix: '%', label: 'Clients satisfaits' },
  { value: 12, suffix: '+', label: 'Technologies' },
  { value: 3, suffix: '+', label: "Années d'expérience" },
];

const container = { hidden: {}, visible: { transition: { staggerChildren: 0.1 } } };
const item = {
  hidden: { opacity: 0, y: 30, scale: 0.95 },
  visible: { opacity: 1, y: 0, scale: 1, transition: { duration: 0.6, ease: [0.21, 0.47, 0.32, 0.98] } },
};

export default function FactsSection() {
  return (
    <section className="section" style={{ padding: '80px 0', background: 'var(--bg-soft)', borderTop: '1px solid var(--line)', borderBottom: '1px solid var(--line)' }}>
      <div className="wrap">
        <motion.div
          className="facts facts-4"
          variants={container}
          initial="hidden"
          whileInView="visible"
          viewport={{ once: true, amount: 0.3 }}
        >
          {facts.map((f) => (
            <motion.article key={f.label} className="fact fact-big" variants={item}>
              <div className="fact-number">
                <AnimatedCounter target={f.value} suffix={f.suffix} />
              </div>
              <p className="fact-label">{f.label}</p>
              <div className="fact-bar" />
            </motion.article>
          ))}
        </motion.div>
      </div>
    </section>
  );
}
