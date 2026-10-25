import React from 'react';
import { motion } from 'motion/react';
import ScrollReveal from '../ui/ScrollReveal';
import TextReveal from '../ui/TextReveal';
import ParallaxImage from '../ui/ParallaxImage';

const projects = [
  {
    num: '01',
    img: '/images/desktop_code.jpg',
    alt: 'Green World Builders',
    tags: ['MySQL', 'PHP'],
    title: 'Green World Builders',
    desc: 'Plateforme web avec gestion de produits, commandes et dashboard analytique.',
  },
  {
    num: '02',
    img: '/images/recognize_face.webp',
    alt: 'Reconnaissance Faciale',
    tags: ['Python', 'OpenCV', 'ML'],
    title: 'Reconnaissance Faciale',
    desc: "Vision par ordinateur pour vérification d'identité sécurisée.",
  },
  {
    num: '03',
    img: '/images/code.jpg',
    alt: 'Agrimarket',
    tags: ['PHP', 'MySQL'],
    title: 'Agrimarket E-commerce',
    desc: 'Vente en ligne connectant producteurs agro et restaurants.',
  },
  {
    num: '04',
    img: '/images/laptop_code.jpg',
    alt: 'Gestion Scolaire',
    tags: ['Dart', 'Flutter'],
    title: 'App Mobile Scolaire',
    desc: 'Gestion des paiements et inscriptions étudiants.',
  },
];

const grid = { hidden: {}, visible: { transition: { staggerChildren: 0.12 } } };
const card = {
  hidden: { opacity: 0, y: 50 },
  visible: { opacity: 1, y: 0, transition: { duration: 0.7, ease: [0.21, 0.47, 0.32, 0.98] } },
};

export default function ProjectsSection() {
  return (
    <section className="section projects-preview" id="projects">
      <div className="wrap">
        <div className="section-head">
          <ScrollReveal>
            <p className="eyebrow"><span className="eyebrow-line" /> Projets</p>
          </ScrollReveal>
          <h2><TextReveal text="Mes réalisations récentes" /></h2>
        </div>

        <motion.div
          className="projects-grid-editorial"
          variants={grid}
          initial="hidden"
          whileInView="visible"
          viewport={{ once: true, amount: 0.1 }}
        >
          {projects.map((p) => (
            <motion.article key={p.title} className="project-card-editorial" variants={card}>
              <span className="project-num">{p.num}</span>
              <motion.figure
                className="project-figure-editorial"
                whileHover={{ scale: 1.02 }}
                transition={{ duration: 0.4, ease: 'easeOut' }}
              >
                <ParallaxImage src={p.img} alt={p.alt} speed={0.06} />
                <motion.div
                  className="project-overlay"
                  initial={{ opacity: 0 }}
                  whileHover={{ opacity: 1 }}
                  transition={{ duration: 0.3 }}
                >
                  <div className="project-links">
                    <a href="#" className="project-link">Voir le code</a>
                    <a href="#" className="project-link demo-link">Démo live</a>
                  </div>
                </motion.div>
              </motion.figure>
              <div className="project-body">
                <div className="project-tags">
                  {p.tags.map((t) => <span key={t} className="project-tag">{t}</span>)}
                </div>
                <h3 className="project-title">{p.title}</h3>
                <p className="project-description">{p.desc}</p>
              </div>
            </motion.article>
          ))}
        </motion.div>

        <ScrollReveal delay={0.4}>
          <div className="projects-cta-row">
            <motion.a
              className="btn btn-main btn-lg"
              href="/projets"
              whileHover={{ scale: 1.05, boxShadow: '0 0 30px rgba(232,197,71,0.3)' }}
              whileTap={{ scale: 0.97 }}
            >
              <i className="bi bi-grid-3x3-gap-fill" /> Tous mes projets
            </motion.a>
            <motion.a
              className="btn btn-ghost btn-lg"
              href="/contact"
              whileHover={{ scale: 1.05 }}
              whileTap={{ scale: 0.97 }}
            >
              <i className="bi bi-envelope-fill" /> Me contacter
            </motion.a>
          </div>
        </ScrollReveal>
      </div>
    </section>
  );
}
