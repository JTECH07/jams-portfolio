/* ─── Intro Overlay (Binary Rain) ─── */
const INTRO_DURATION_MS = 1400;
const introOverlay = document.getElementById('siteIntroOverlay');
const introBinary = document.getElementById('introBinary');

if (introOverlay && introBinary) {
  const COL_COUNT = 12;
  const chars = '01';
  for (let i = 0; i < COL_COUNT; i++) {
    const col = document.createElement('span');
    col.className = 'col';
    let text = '';
    const rows = 40 + Math.floor(Math.random() * 20);
    for (let r = 0; r < rows; r++) {
      text += chars[Math.floor(Math.random() * chars.length)] + '\n';
    }
    col.textContent = text;
    col.style.animationDuration = (4 + Math.random() * 4) + 's';
    col.style.animationDelay = (-Math.random() * 6) + 's';
    introBinary.appendChild(col);
  }
  const closeIntro = () => {
    if (introOverlay.classList.contains('hide')) return;
    introOverlay.classList.add('hide');
    document.body.classList.remove('intro-lock');
  };
  setTimeout(closeIntro, INTRO_DURATION_MS);
}

/* ─── Hero Background Slider ─── */
const heroSlider = document.getElementById('heroSlider');
const heroDots = document.getElementById('heroDots');
if (heroSlider && heroDots) {
  const slides = heroSlider.querySelectorAll('.slide');
  let currentSlide = 0;
  slides.forEach((_, i) => {
    const dot = document.createElement('span');
    if (i === 0) dot.classList.add('active');
    dot.addEventListener('click', () => goToSlide(i));
    heroDots.appendChild(dot);
  });
  const dots = heroDots.querySelectorAll('span');
  function goToSlide(n) {
    slides[currentSlide].classList.remove('active');
    dots[currentSlide].classList.remove('active');
    currentSlide = (n + slides.length) % slides.length;
    slides[currentSlide].classList.add('active');
    dots[currentSlide].classList.add('active');
  }
  setInterval(() => goToSlide(currentSlide + 1), 5000);
}

/* ─── Cursor Typing Effect ─── */
const cursorPhrases = [
  'Je transforme vos idées en solutions digitales.',
  'Je crée des expériences web immersives.',
  'Je développe des applications performantes.',
  'Je conçois des interfaces intuitives.',
  'Je rends le web plus accessible.'
];
const cursorText = document.getElementById('cursorText');
if (cursorText) {
  let phraseIdx = 0, charIdx = 0, isDeleting = false;
  function typeCursor() {
    const phrase = cursorPhrases[phraseIdx];
    cursorText.textContent = isDeleting ? phrase.slice(0, charIdx--) : phrase.slice(0, charIdx++);
    let delay = isDeleting ? 35 : 70;
    if (!isDeleting && charIdx > phrase.length) { isDeleting = true; delay = 2000; }
    if (isDeleting && charIdx < 0) {
      isDeleting = false;
      phraseIdx = (phraseIdx + 1) % cursorPhrases.length;
      delay = 400;
    }
    setTimeout(typeCursor, delay);
  }
  setTimeout(typeCursor, 1200);
}

/* ─── Pill Nav: scroll + sliding indicator ─── */
const nav = document.getElementById('mainNav');
const pillLinks = document.getElementById('navLinks');
const pillIndicator = document.getElementById('pillIndicator');

if (nav) {
  const onScroll = () => nav.classList.toggle('scrolled', window.scrollY > 24);
  onScroll();
  window.addEventListener('scroll', onScroll, { passive: true });
}

function moveIndicator(el) {
  if (!pillIndicator || !el) return;
  const parent = el.parentElement;
  const pRect = parent.getBoundingClientRect();
  const eRect = el.getBoundingClientRect();
  pillIndicator.style.left = (eRect.left - pRect.left) + 'px';
  pillIndicator.style.width = eRect.width + 'px';
}

if (pillLinks && pillIndicator) {
  const activeLink = pillLinks.querySelector('.pill-link.active');
  if (activeLink) {
    moveIndicator(activeLink);
  } else {
    const first = pillLinks.querySelector('.pill-link');
    if (first) moveIndicator(first);
  }
  pillLinks.querySelectorAll('.pill-link').forEach(link => {
    link.addEventListener('mouseenter', () => moveIndicator(link));
    link.addEventListener('focus', () => moveIndicator(link));
  });
  pillLinks.addEventListener('mouseleave', () => {
    const current = pillLinks.querySelector('.pill-link.active') || pillLinks.querySelector('.pill-link');
    if (current) moveIndicator(current);
  });
}

/* ─── Mobile menu ─── */
const menuBtn = document.getElementById('menuBtn');
const navLinks = document.getElementById('navLinks');
if (menuBtn && navLinks) {
  menuBtn.addEventListener('click', () => navLinks.classList.toggle('open'));
  navLinks.querySelectorAll('a').forEach(a => a.addEventListener('click', () => navLinks.classList.remove('open')));
}

/* ─── Reveal on scroll ─── */
const revealObs = new IntersectionObserver((entries) => {
  entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('on'); revealObs.unobserve(e.target); } });
}, { threshold: 0.1 });
document.querySelectorAll('.reveal').forEach(el => revealObs.observe(el));

/* ─── Counter animation ─── */
const countObs = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (!entry.isIntersecting) return;
    const el = entry.target.querySelector('[data-count]');
    if (!el) return;
    const target = Number(el.dataset.count);
    if (isNaN(target)) return;
    let value = 0;
    const step = Math.max(1, Math.ceil(target / 45));
    const run = () => { value = Math.min(target, value + step); el.textContent = value; if (value < target) requestAnimationFrame(run); };
    requestAnimationFrame(run);
    countObs.unobserve(entry.target);
  });
}, { threshold: 0.3 });
document.querySelectorAll('.fact').forEach(card => countObs.observe(card));

/* ─── Projects 3D Carousel ─── */
const projectsArmoire = document.getElementById('projectsArmoire');
const projectsCabinet = document.getElementById('projectsCabinet');
const projectsViewport = document.getElementById('projectsViewport');
const projectsPrev = document.getElementById('projectsPrev');
const projectsNext = document.getElementById('projectsNext');

if (projectsArmoire && projectsCabinet && projectsViewport) {
  const cards = [...projectsCabinet.querySelectorAll('.project')];
  let activeIndex = 0;
  let autoRotateTimer = null;

  const resizeViewport = () => {
    const maxH = cards.reduce((m, c) => Math.max(m, c.offsetHeight || 0), 0);
    projectsViewport.style.height = `${Math.max(maxH + 40, 480)}px`;
  };

  const renderCabinet = () => {
    const spread = window.innerWidth <= 640 ? 130 : 210;
    const depth = window.innerWidth <= 640 ? 70 : 110;
    const tilt = window.innerWidth <= 640 ? 10 : 15;
    cards.forEach((card, index) => {
      let diff = index - activeIndex;
      const half = cards.length / 2;
      if (diff > half) diff -= cards.length;
      if (diff < -half) diff += cards.length;
      const abs = Math.abs(diff);
      card.style.setProperty('--cab-transform', `translateX(-50%) translate3d(${diff * spread}px, ${abs * 8}px, ${-abs * depth}px) rotateY(${diff * -tilt}deg) scale(${Math.max(0.6, 1 - abs * 0.12)})`);
      card.style.setProperty('--cab-opacity', abs > 4 ? '0' : String(Math.max(0.2, 1 - abs * 0.2)));
      card.style.setProperty('--cab-saturation', String(Math.max(0.4, 1 - abs * 0.18)));
      card.style.zIndex = String(100 - Math.round(abs * 10));
      card.classList.toggle('is-active', diff === 0);
      card.classList.add('on');
    });
  };

  const goTo = (n) => { activeIndex = (n + cards.length) % cards.length; renderCabinet(); };
  const stopAuto = () => { clearInterval(autoRotateTimer); autoRotateTimer = null; };
  const startAuto = () => { stopAuto(); if (cards.length < 2) return; autoRotateTimer = setInterval(() => goTo(activeIndex + 1), 2200); };

  if (cards.length > 0) {
    resizeViewport();
    renderCabinet();
    startAuto();
    cards.forEach((card, i) => card.addEventListener('click', () => { if (i !== activeIndex) { goTo(i); startAuto(); } }));
    if (projectsPrev) projectsPrev.addEventListener('click', () => { goTo(activeIndex - 1); startAuto(); });
    if (projectsNext) projectsNext.addEventListener('click', () => { goTo(activeIndex + 1); startAuto(); });
    projectsArmoire.addEventListener('mouseenter', stopAuto);
    projectsArmoire.addEventListener('mouseleave', startAuto);
    window.addEventListener('resize', () => { resizeViewport(); renderCabinet(); });
    document.addEventListener('visibilitychange', () => document.hidden ? stopAuto() : startAuto());
  }
}

/* ─── Before/After compare ─── */
const vergerRange = document.getElementById('vergerRange');
const vergerCompareStage = document.getElementById('vergerCompareStage');
if (vergerRange && vergerCompareStage) {
  const sync = () => vergerCompareStage.style.setProperty('--split', `${vergerRange.value}%`);
  vergerRange.addEventListener('input', sync);
  sync();
}

/* ─── Contact form live preview ─── */
const contactForm = document.getElementById('laravelContactForm');
if (contactForm) {
  const proposalType = document.getElementById('proposalType');
  const talkSubject = document.getElementById('talkSubject');
  const previewProposal = document.getElementById('previewProposal');
  const previewSubject = document.getElementById('previewSubject');
  const previewItems = document.getElementById('previewItems');
  const checks = [...contactForm.querySelectorAll('input[name="collab_item[]"]')];
  const syncPreview = () => {
    if (previewProposal && proposalType) previewProposal.textContent = proposalType.value || 'À définir';
    if (previewSubject && talkSubject) previewSubject.textContent = talkSubject.value.trim() || 'À définir';
    if (previewItems) previewItems.textContent = checks.filter(c => c.checked).map(c => c.value).join(', ') || 'À préciser';
  };
  contactForm.addEventListener('input', syncPreview);
  contactForm.addEventListener('change', syncPreview);
  syncPreview();
}

/* ─── Mouse trailer ─── */
const trailer = document.createElement('div');
trailer.className = 'mouse-trailer';
document.body.appendChild(trailer);
window.addEventListener('mousemove', e => {
  trailer.animate({ transform: `translate(${e.clientX - 8}px, ${e.clientY - 8}px)` }, { duration: 700, fill: 'forwards' });
}, { passive: true });

/* ─── Theme Toggle ─── */
const themeToggle = document.getElementById('themeToggle');
const themeIcon = document.getElementById('themeIcon');
if (themeToggle && themeIcon) {
  const saved = localStorage.getItem('theme');
  if (saved === 'light') { document.body.classList.add('light'); themeIcon.className = 'bi bi-sun-fill'; }
  themeToggle.addEventListener('click', () => {
    document.body.classList.toggle('light');
    const isLight = document.body.classList.contains('light');
    themeIcon.className = isLight ? 'bi bi-sun-fill' : 'bi bi-moon-stars-fill';
    localStorage.setItem('theme', isLight ? 'light' : 'dark');
  });
}
