import React, { useEffect, useMemo, useRef, useState } from 'react';
import { AnimatePresence, motion, useReducedMotion } from 'motion/react';
import CircularCarousel from '../ui/CircularCarousel';
import ScrollReveal from '../ui/ScrollReveal';
import TextReveal from '../ui/TextReveal';
import './ProjectsShowcase.css';

const CATEGORIES = [
  { id: 'all', label: 'Tous' },
  { id: 'site', label: 'Sites web' },
  { id: 'app-web', label: 'Applications web' },
  { id: 'app-mobile', label: 'Applications mobile' },
  { id: 'console', label: 'Projets console' },
  { id: 'design', label: 'Design / Maquette' },
];

const PROJECTS = [
  {
    id: 'green-world',
    category: 'site',
    title: 'Green World Builders',
    subtitle: 'Plateforme web',
    description:
      'Plateforme web avec gestion de produits, commandes et dashboard analytique pour des initiatives écologiques.',
    images: ['/images/desktop_code.jpg', '/images/code.jpg', '/images/laptop_code.jpg'],
    tags: ['PHP', 'MySQL', 'HTML5', 'CSS3'],
    study: {
      context:
        'Green World Builders avait besoin de centraliser la vente de produits et le suivi des commandes dans un seul outil exploitable par une équipe non technique.',
      solution:
        'Architecture PHP/MySQL avec un back-office clair, une gestion des stocks et un tableau de bord analytique pour suivre les ventes et les performances.',
      result:
        'Une plateforme autonome qui réduit la saisie manuelle et donne une vision claire de l’activité en temps réel.',
    },
    link: 'http://greenworldbuilders.local',
    linkLabel: 'Voir le site',
  },
  {
    id: 'bibliotheque',
    category: 'site',
    title: 'Gestion de bibliothèques',
    subtitle: 'Application métier',
    description:
      'Système de suivi des ouvrages et des emprunts pour améliorer la traçabilité opérationnelle.',
    images: ['/images/laptop_code.jpg', '/images/code.jpg'],
    tags: ['Laravel', 'MySQL'],
    study: {
      context:
        'Le suivi des ouvrages et des emprunts se faisait sur registre, avec des pertes d’information et des retards difficiles à identifier.',
      solution:
        'Application Laravel avec catalogue, gestion des adhérents, emprunts et retours, plus des alertes de retard.',
      result:
        'Une traçabilité complète des mouvements et un gain de temps important sur les tâches administratives.',
    },
    link: 'http://biblio-gest.local',
    linkLabel: 'Voir le site',
  },
  {
    id: 'le-verger',
    category: 'site',
    title: 'Site Le Verger',
    subtitle: 'Site vitrine',
    description:
      'Site web pour le Complexe Scolaire Le Verger : programmes éducatifs, activités et présentation de l’établissement.',
    images: ['/images/code.jpg', '/images/desktop_code.jpg'],
    tags: ['HTML5', 'CSS3', 'JavaScript'],
    study: {
      context:
        'L’établissement souhaitait une vitrine moderne pour présenter ses programmes et rassurer les parents.',
      solution:
        'Site vitrine responsive, structuré autour des cycles scolaires, des activités et des informations pratiques.',
      result:
        'Une image professionnelle et un point de contact unique pour les familles.',
    },
    link: 'https://github.com/JTECH07',
    linkLabel: 'Voir le code',
  },
  {
    id: 'portfolio-agro',
    category: 'site',
    title: 'Portfolio technicien agro',
    subtitle: 'Site personnel',
    description:
      'Site portfolio pour un technicien agro-industriel : compétences, réalisations et prise de contact.',
    images: ['/images/laptop_code.jpg', '/images/desktop_code.jpg'],
    tags: ['HTML5', 'CSS3', 'JavaScript'],
    study: {
      context:
        'Le client avait besoin d’un espace crédible pour présenter son expertise et ses réalisations.',
      solution:
        'Design éditorial, sections de compétences et projets, avec une navigation simple et un formulaire de contact.',
      result:
        'Un portfolio rapide, lisible sur mobile et prêt à être partagé aux recruteurs.',
    },
    link: 'https://israel-affodehou.netlify.app',
    linkLabel: 'Voir le site',
  },
  {
    id: 'agrimarket',
    category: 'app-web',
    title: 'Agrimarket',
    subtitle: 'E-commerce',
    description:
      'Plateforme e-commerce connectant producteurs agro et restaurants pour les échanges locaux.',
    images: ['/images/code.jpg', '/images/desktop_code.jpg', '/images/laptop_code.jpg'],
    tags: ['PHP', 'MySQL'],
    study: {
      context:
        'Les producteurs locaux manquaient d’un canal direct pour écouler leurs produits auprès des restaurants.',
      solution:
        'Catalogue produits, paniers, commandes et gestion des comptes producteurs et acheteurs.',
      result:
        'Un circuit court digitalisé qui facilite la mise en relation et la commande.',
    },
    link: 'http://agrimarket.local',
    linkLabel: 'Voir le site',
  },
  {
    id: 'crud-posts',
    category: 'app-web',
    title: 'Système CRUD de posts',
    subtitle: 'Application Laravel',
    description:
      'Application Laravel structurée pour la gestion de contenus avec validation et base de données exploitable.',
    images: ['/images/laptop_code.jpg', '/images/code.jpg'],
    tags: ['Laravel', 'PHP', 'MySQL'],
    study: {
      context:
        'Besoin d’un socle de gestion de contenus propre, extensible et facile à maintenir.',
      solution:
        'CRUD complet avec validation serveur, relations Eloquent et interface d’administration.',
      result:
        'Une base saine réutilisable pour des projets éditoriaux plus larges.',
    },
    link: 'https://github.com/JTECH07',
    linkLabel: 'Voir le code',
  },
  {
    id: 'auth-email',
    category: 'app-web',
    title: 'Authentification + e-mail',
    subtitle: 'Sécurité',
    description:
      'Flux d’inscription sécurisé avec confirmation par e-mail pour renforcer la sécurité d’accès.',
    images: ['/images/laptop_code.jpg', '/images/desktop_code.jpg'],
    tags: ['Laravel'],
    study: {
      context:
        'Les inscriptions devaient être fiables et vérifiées avant d’ouvrir l’accès aux fonctionnalités.',
      solution:
        'Authentification Laravel, vérification d’adresse e-mail, réinitialisation de mot de passe et protection des routes.',
      result:
        'Un parcours d’inscription sécurisé et une réduction des comptes frauduleux.',
    },
    link: 'https://github.com/JTECH07',
    linkLabel: 'Voir le code',
  },
  {
    id: 'hotel',
    category: 'app-web',
    title: 'Gestion d’hôtel',
    subtitle: 'Système de réservation',
    description:
      'Système de gestion hôtelière avec modélisation MERISE et SGBDR : réservations, chambres et services.',
    images: ['/images/desktop_code.jpg', '/images/code.jpg'],
    tags: ['MySQL'],
    study: {
      context:
        'L’objectif était de concevoir une base de données cohérente pour gérer chambres, clients et réservations.',
      solution:
        'Modélisation MERISE, schéma relationnel normalisé et requêtes de gestion des disponibilités.',
      result:
        'Un modèle robuste servant de fondation à une application de gestion complète.',
    },
    link: 'https://github.com/JTECH07',
    linkLabel: 'Voir le code',
  },
  {
    id: 'jams-tech',
    category: 'app-web',
    title: 'Initiatives JAMS TECH',
    subtitle: 'Expériences web',
    description:
      'Expériences web orientées service avec intégration IA pour accélérer la production.',
    images: ['/images/code.jpg', '/images/laptop_code.jpg'],
    tags: ['HTML5', 'CSS3', 'JavaScript'],
    study: {
      context:
        'Explorer des formats web utiles et rapides à produire pour des besoins clients variés.',
      solution:
        'Composants réutilisables, animations légères et intégration d’outils IA dans le flux de production.',
      result:
        'Des livraisons plus rapides sans sacrifier la qualité visuelle ni la maintenabilité.',
    },
    link: 'https://github.com/JTECH07',
    linkLabel: 'Voir le code',
  },
  {
    id: 'scolarite',
    category: 'app-mobile',
    title: 'Gestion paiements scolarité',
    subtitle: 'Application Flutter',
    description:
      'Application mobile Flutter pour la gestion des paiements étudiants à l’UATM GASA Formation.',
    images: ['/images/laptop_code.jpg', '/images/code.jpg'],
    tags: ['Flutter', 'Dart'],
    study: {
      context:
        'Le suivi des paiements de scolarité était dispersé et difficile à consulter pour les étudiants.',
      solution:
        'Application Flutter avec authentification, historique des paiements et reçus consultables.',
      result:
        'Un accès simple et mobile à l’information, moins de sollicitations au secrétariat.',
    },
    link: 'https://github.com/JTECH07/school_fees_management_app',
    linkLabel: 'Voir le code',
  },
  {
    id: 'presidents',
    category: 'app-mobile',
    title: 'Jeu Présidents Africains',
    subtitle: 'Quiz mobile',
    description:
      'Quiz interactif mobile en Flutter pour sensibiliser et éduquer sur les présidents africains.',
    images: ['/images/desktop_code.jpg', '/images/laptop_code.jpg'],
    tags: ['Flutter', 'Dart'],
    study: {
      context:
        'Créer un support ludique pour apprendre l’histoire politique africaine.',
      solution:
        'Quiz chronométré, scores et progression, avec une interface mobile-first.',
      result:
        'Une expérience engageante qui rend l’apprentissage plus accessible.',
    },
    link: 'https://github.com/JTECH07/afrik_presidents_game',
    linkLabel: 'Voir le code',
  },
  {
    id: 'couts-production',
    category: 'console',
    title: 'Évaluation coûts de production',
    subtitle: 'Application Java',
    description:
      'Système Java pour évaluer les coûts de production et déterminer les marges des biens et services.',
    images: ['/images/code.jpg', '/images/desktop_code.jpg'],
    tags: ['Java'],
    study: {
      context:
        'Une entreprise devait calculer rapidement ses coûts et ses marges sans tableur complexe.',
      solution:
        'Application console Java avec saisie guidée, calculs de coûts et génération de synthèses.',
      result:
        'Des estimations fiables et reproductibles pour piloter les prix.',
    },
    link: 'https://github.com/JTECH07/systeme-evaluation-couts-production-et-determination-biens-et-services-d1-entreprise',
    linkLabel: 'Voir le code',
  },
  {
    id: 'etudiants',
    category: 'console',
    title: 'Gestion des étudiants',
    subtitle: 'Application C++',
    description:
      'Système C++ pour gérer les informations, matières, notes, filières et générer des bulletins.',
    images: ['/images/laptop_code.jpg', '/images/code.jpg'],
    tags: ['C++'],
    study: {
      context:
        'La gestion des notes et des bulletins demandait une automatisation fiable.',
      solution:
        'Structures de données, saisie des notes, calcul de moyennes et édition de bulletins.',
      result:
        'Une réduction des erreurs de calcul et un gain de temps sur la production des bulletins.',
    },
    link: 'https://gitlab.com/alayejoseph1-group/systeme-de-gestion-des-etudiants',
    linkLabel: 'Voir le code',
  },
  {
    id: 'face-recognition',
    category: 'app-web',
    title: 'Reconnaissance faciale',
    subtitle: 'Vision par ordinateur',
    description:
      'Système Python avec OpenCV2 et Machine Learning pour la vérification d’identité.',
    images: ['/images/recognize_face.png', '/images/code.jpg'],
    tags: ['Python', 'OpenCV', 'TensorFlow'],
    study: {
      context:
        'Le besoin portait sur une vérification d’identité rapide et fiable à partir d’une image.',
      solution:
        'Pipeline Python : détection du visage, extraction de caractéristiques et comparaison avec une base de référence.',
      result:
        'Une preuve de concept fonctionnelle démontrant l’usage de la vision par ordinateur.',
    },
    link: 'https://github.com/JTECH07',
    linkLabel: 'Voir le code',
  },
  {
    id: 'chips-manioc',
    category: 'design',
    title: 'Maquette Chips Manioc+',
    subtitle: 'Design produit',
    description:
      'Maquette Figma haute fidélité pour l’entreprise Chips Manioc+, produits et valeurs de la marque.',
    images: ['/images/desktop_code.jpg', '/images/code.jpg'],
    tags: ['Figma', 'UI/UX'],
    study: {
      context:
        'La marque voulait une identité digitale cohérente pour présenter ses produits.',
      solution:
        'Direction visuelle, composants réutilisables et maquettes desktop/mobile haute fidélité.',
      result:
        'Une base de design claire, prête à être développée sans ambiguïté.',
    },
    link: '',
    linkLabel: '',
  },
];

const CATEGORY_LABEL = Object.fromEntries(CATEGORIES.map(category => [category.id, category.label]));

const useMediaQuery = query => {
  const [matches, setMatches] = useState(false);

  useEffect(() => {
    const media = window.matchMedia(query);
    const update = () => setMatches(media.matches);
    update();
    media.addEventListener?.('change', update);
    return () => media.removeEventListener?.('change', update);
  }, [query]);

  return matches;
};

const Gallery = ({ project, reduced }) => {
  const [index, setIndex] = useState(0);
  const [paused, setPaused] = useState(false);

  useEffect(() => {
    setIndex(0);
  }, [project.id]);

  useEffect(() => {
    if (reduced || paused || project.images.length < 2) return undefined;
    const timer = setInterval(() => {
      setIndex(current => (current + 1) % project.images.length);
    }, 4500);
    return () => clearInterval(timer);
  }, [project.id, project.images.length, paused, reduced]);

  const go = step => {
    setIndex(current => (current + step + project.images.length) % project.images.length);
  };

  return (
    <div
      className="project-study-gallery"
      onMouseEnter={() => setPaused(true)}
      onMouseLeave={() => setPaused(false)}
    >
      <div className="project-study-main">
        <AnimatePresence mode="wait">
          <motion.img
            key={project.images[index]}
            src={project.images[index]}
            alt={`${project.title} — visuel ${index + 1}`}
            initial={{ opacity: 0, scale: 1.04 }}
            animate={{ opacity: 1, scale: 1 }}
            exit={{ opacity: 0 }}
            transition={{ duration: 0.45, ease: [0.21, 0.47, 0.32, 0.98] }}
            loading="lazy"
          />
        </AnimatePresence>

        {project.images.length > 1 && (
          <>
            <button
              type="button"
              className="project-study-nav prev"
              onClick={() => go(-1)}
              aria-label="Image précédente"
            >
              <i className="bi bi-arrow-left" />
            </button>
            <button
              type="button"
              className="project-study-nav next"
              onClick={() => go(1)}
              aria-label="Image suivante"
            >
              <i className="bi bi-arrow-right" />
            </button>
          </>
        )}

        <span className="project-study-count">
          {String(index + 1).padStart(2, '0')} / {String(project.images.length).padStart(2, '0')}
        </span>
      </div>

      {project.images.length > 1 && (
        <div className="project-study-thumbs" role="tablist" aria-label="Galerie du projet">
          {project.images.map((image, thumbIndex) => (
            <button
              key={image}
              type="button"
              role="tab"
              aria-selected={thumbIndex === index}
              aria-label={`Afficher le visuel ${thumbIndex + 1}`}
              className={`project-study-thumb ${thumbIndex === index ? 'active' : ''}`}
              onClick={() => setIndex(thumbIndex)}
            >
              <img src={image} alt="" loading="lazy" />
            </button>
          ))}
        </div>
      )}
    </div>
  );
};

export default function ProjectsShowcase() {
  const [filter, setFilter] = useState('all');
  const [selected, setSelected] = useState(0);
  const reduced = useReducedMotion();
  const isTablet = useMediaQuery('(max-width: 1024px)');
  const isMobile = useMediaQuery('(max-width: 640px)');
  const detailRef = useRef(null);

  const filtered = useMemo(
    () => (filter === 'all' ? PROJECTS : PROJECTS.filter(project => project.category === filter)),
    [filter],
  );

  useEffect(() => {
    setSelected(0);
  }, [filter]);

  const project = filtered[selected] || filtered[0];

  const items = useMemo(
    () =>
      filtered.map(entry => ({
        src: entry.images[0],
        alt: entry.title,
        title: entry.title,
        subtitle: entry.subtitle,
      })),
    [filtered],
  );

  const cardWidth = isMobile ? 132 : isTablet ? 170 : 210;

  const selectProject = (_, index) => {
    setSelected(index);
    if (detailRef.current) {
      detailRef.current.scrollIntoView({ behavior: reduced ? 'auto' : 'smooth', block: 'start' });
    }
  };

  return (
    <section className="section projects-showcase" id="projects">
      <div className="projects-showcase-bg" aria-hidden="true">
        <span className="projects-showcase-orb orb-one" />
        <span className="projects-showcase-orb orb-two" />
      </div>

      <div className="wrap">
        <div className="section-head projects-showcase-head">
          <ScrollReveal>
            <p className="eyebrow">
              <span className="eyebrow-line" /> Projets
            </p>
          </ScrollReveal>
          <h2>
            <TextReveal text="Des idées devenues" />{' '}
            <TextReveal text="produits" delay={0.12} className="text-accent" />
          </h2>
          <ScrollReveal delay={0.2}>
            <p>
              Explorez mes réalisations comme un carrousel : sélectionnez un projet pour
              découvrir son contexte, la solution mise en place et le résultat obtenu.
            </p>
          </ScrollReveal>
        </div>

        <div className="projects-filters" role="tablist" aria-label="Filtrer les projets">
          {CATEGORIES.map(category => (
            <button
              key={category.id}
              type="button"
              role="tab"
              aria-selected={filter === category.id}
              className={`projects-filter ${filter === category.id ? 'active' : ''}`}
              onClick={() => setFilter(category.id)}
            >
              {category.label}
            </button>
          ))}
        </div>

        <div className="projects-carousel-stage">
          <CircularCarousel
            key={filter}
            items={items}
            preset="cylinder"
            intro="rise"
            cardWidth={cardWidth}
            aspectRatio={1.32}
            gap={isMobile ? 16 : 28}
            speed={7}
            autoplay="drift"
            direction="left"
            parallax={0.28}
            stretch={0.4}
            depthFade={0.55}
            fadeColor="var(--bg)"
            cornerRadius={16}
            captions
            pauseOnHover
            focusOnClick
            onItemClick={selectProject}
          />
        </div>

        <p className="projects-carousel-hint">
          <i className="bi bi-hand-index-thumb" /> Glissez le carrousel ou cliquez sur une carte
        </p>

        {project && (
          <div className="project-study" ref={detailRef}>
            <div className="project-study-gallery-col">
              <Gallery project={project} reduced={Boolean(reduced)} />
            </div>

            <div className="project-study-content">
              <motion.div
                key={project.id}
                initial={reduced ? false : { opacity: 0, y: 24 }}
                animate={{ opacity: 1, y: 0 }}
                transition={{ duration: 0.55, ease: [0.21, 0.47, 0.32, 0.98] }}
              >
                <span className="project-study-kicker">
                  {CATEGORY_LABEL[project.category] || 'Projet'}
                </span>
                <h3>{project.title}</h3>
                <p className="project-study-description">{project.description}</p>

                <div className="project-study-tags">
                  {project.tags.map(tag => (
                    <span key={tag}>{tag}</span>
                  ))}
                </div>

                <dl className="project-study-steps">
                  <div>
                    <dt>
                      <span className="project-study-step-num">01</span> Contexte
                    </dt>
                    <dd>{project.study.context}</dd>
                  </div>
                  <div>
                    <dt>
                      <span className="project-study-step-num">02</span> Solution
                    </dt>
                    <dd>{project.study.solution}</dd>
                  </div>
                  <div>
                    <dt>
                      <span className="project-study-step-num">03</span> Résultat
                    </dt>
                    <dd>{project.study.result}</dd>
                  </div>
                </dl>

                <div className="project-study-actions">
                  {project.link && (
                    <a
                      className="btn btn-main"
                      href={project.link}
                      target="_blank"
                      rel="noopener noreferrer"
                    >
                      <i className="bi bi-box-arrow-up-right" /> {project.linkLabel}
                    </a>
                  )}
                  <a className="btn btn-outline" href="/contact">
                    <i className="bi bi-chat-dots" /> Discuter du projet
                  </a>
                </div>
              </motion.div>
            </div>
          </div>
        )}

        <ScrollReveal delay={0.2}>
          <div className="projects-showcase-cta">
            <p>Une idée proche de ces réalisations ?</p>
            <a className="btn btn-main btn-lg" href="/contact">
              <i className="bi bi-envelope" /> Démarrer un projet
            </a>
          </div>
        </ScrollReveal>
      </div>
    </section>
  );
}
