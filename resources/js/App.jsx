import React from 'react';
import ScrollExpand from './components/ScrollExpand';
import HeroSection from './components/sections/HeroSection';
import ValueSection from './components/sections/ValueSection';
import FactsSection from './components/sections/FactsSection';
import ProjectsSection from './components/sections/ProjectsSection';
import ServicesSection from './components/sections/ServicesSection';
import AboutSection from './components/sections/AboutSection';
import SkillsSection from './components/sections/SkillsSection';
import ContactCtaSection from './components/sections/ContactCtaSection';

export default function App() {
  return (
    <>
      <HeroSection />
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
          Chaque ligne de code compte
        </h2>
        <p style={{ color: 'rgba(255,255,255,0.8)', fontSize: '1.1rem', maxWidth: 500, textShadow: '0 1px 10px rgba(0,0,0,0.5)' }}>
          Du développement web aux solutions IA, je transforme les idées en produits digitaux performants.
        </p>
      </ScrollExpand>
      <ValueSection />
      <FactsSection />
      <ProjectsSection />
      <ServicesSection />
      <AboutSection />
      <SkillsSection />
      <ContactCtaSection />
    </>
  );
}
