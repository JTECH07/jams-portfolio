import React, { useState, useEffect } from 'react';
import ScrollExpand from './components/ScrollExpand';
import HeroSection from './components/sections/HeroSection';
import ValueSection from './components/sections/ValueSection';
import FactsSection from './components/sections/FactsSection';
import ProjectsSection from './components/sections/ProjectsSection';
import ServicesSection from './components/sections/ServicesSection';
import AboutSection from './components/sections/AboutSection';
import SkillsSection from './components/sections/SkillsSection';
import ContactCtaSection from './components/sections/ContactCtaSection';

const translations = {
  fr: {
    heroTitle: 'Développeur Logiciels & IA',
    heroSubtitle: 'Je conçois des applications web et mobiles performantes, propulsées par l\'IA',
    heroCta: 'Voir mes projets',
    aboutTitle: 'À propos',
    aboutSubtitle: 'Je suis Joseph ALAYE',
    aboutDesc: 'CEO de JAMS TECH. Co-Fondateur de M2J TECHNOLOGY et Développeur Full-Stack basé à Porto-Novo, Bénin.',
    skillsTitle: 'Compétences',
    contactCta: 'Travaillons ensemble',
  },
  en: {
    heroTitle: 'Developer Software & IA',
    heroSubtitle: 'I create performant web and mobile applications powered by AI',
    heroCta: 'See my projects',
    aboutTitle: 'About',
    aboutSubtitle: 'I am Joseph ALAYE',
    aboutDesc: 'CEO of JAMS TECH. Co-Founder of M2J TECHNOLOGY and Full-Stack Developer based in Porto-Novo, Benin.',
    skillsTitle: 'Skills',
    contactCta: 'Let\'s work together',
  },
};

export default function App() {
  const [lang, setLang] = useState(() => {
    // Respect system preference
    const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
    document.documentElement.classList.toggle('dark', prefersDark);
    return 'fr';
  });

  useEffect(() => {
    document.documentElement.lang = lang;
    // Update texts based on language
    const body = document.body;
    if (lang === 'en') {
      body.innerHTML = body.innerHTML.replace(
        'Développeur Logiciels & IA',
        'Developer Software & IA'
      );
    } else {
      body.innerHTML = body.innerHTML.replace(
        'Developer Software & IA',
        'Développeur Logiciels & IA'
      );
    }
  }, [lang]);

  const toggleLang = () => setLang(lang === 'fr' ? 'en' : 'fr');

  return (
    <>
      <HeroSection lang={lang} toggleLang={toggleLang} />
      <ScrollExpand
        src="/images/code.jpg"
        alt="Code et programmation"
        title="Du code à l'innovation"
        scrollHint="Scroll pour découvrir"
        useWindowScroll
        startWidth={48}
        startHeight={55}
        startRadius={20}
        mediaZoom={1.3}
      >
        <h2 style={{ color: '#fff', fontSize: 'clamp(1.5rem, 3vw, 2.5rem)', fontWeight: 700, marginBottom: 12, textShadow: '0 2px 20px rgba(0,0,0,0.5)' }}>
          {lang === 'en' ? 'Every line of code counts' : 'Chaque ligne de code compte'}
        </h2>
        <p style={{ color: 'rgba(255,255,255,0.8)', fontSize: '1.1rem', maxWidth: 500, textShadow: '0 1px 10px rgba(0,0,0,0.5)' }}>
          {lang === 'en'
            ? 'From web development to AI solutions, I transform ideas into performant digital products.'
            : 'Du développement web aux solutions IA, je transforme les idées en produits digitaux performants.'}
        </p>
      </ScrollExpand>
      <ProjectsSection lang={lang} />
      <FactsSection />
      <ServicesSection />
      <AboutSection lang={lang} />
      <SkillsSection lang={lang} />
      <ContactCtaSection lang={lang} />
    </>
  );
}
