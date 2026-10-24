import React from 'react';
import { createRoot } from 'react-dom/client';
import App from './App';
import ProjectsShowcase from './components/sections/ProjectsShowcase';

/* ─── Lenis Smooth Scroll ─── */
import Lenis from 'lenis';
import 'lenis/dist/lenis.css';

const lenis = new Lenis({
  duration: 1.2,
  easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
  smoothWheel: true,
});
function raf(time) {
  lenis.raf(time);
  requestAnimationFrame(raf);
}
requestAnimationFrame(raf);

/* ─── Mount React ─── */
const rootEl = document.getElementById('react-root');
if (rootEl) {
  createRoot(rootEl).render(<App />);
}

/* ─── Page Projets : carrousel + étude de cas ─── */
const projectsRoot = document.getElementById('projects-showcase-root');
if (projectsRoot) {
  createRoot(projectsRoot).render(<ProjectsShowcase />);
}

/* ─── Intro Overlay (Binary Rain) ─── */
const INTRO_DURATION_MS = 2000;
const introOverlay = document.getElementById('siteIntroOverlay');
const introBinary = document.getElementById('introBinary');

if (introOverlay && introBinary) {
  const COL_COUNT = 14;
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
    lenis.start();
  };
  lenis.stop();
  setTimeout(closeIntro, INTRO_DURATION_MS);
  introOverlay.addEventListener('click', closeIntro);
  window.addEventListener('keydown', (e) => { if (e.key === 'Escape' || e.key === ' ') closeIntro(); });
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
    requestAnimationFrame(() => moveIndicator(activeLink));
  } else {
    const first = pillLinks.querySelector('.pill-link');
    if (first) requestAnimationFrame(() => moveIndicator(first));
  }
  pillLinks.querySelectorAll('.pill-link').forEach(link => {
    link.addEventListener('mouseenter', () => moveIndicator(link));
    link.addEventListener('focus', () => moveIndicator(link));
  });
  pillLinks.addEventListener('mouseleave', () => {
    const current = pillLinks.querySelector('.pill-link.active') || pillLinks.querySelector('.pill-link');
    if (current) moveIndicator(current);
  });
  window.addEventListener('resize', () => {
    const current = pillLinks.querySelector('.pill-link.active') || pillLinks.querySelector('.pill-link');
    if (current) moveIndicator(current);
  });
}

/* ─── Mobile menu ─── */
const menuBtn = document.getElementById('menuBtn');
const navLinksEl = document.getElementById('navLinks');
if (menuBtn && navLinksEl) {
  menuBtn.addEventListener('click', () => navLinksEl.classList.toggle('open'));
  navLinksEl.querySelectorAll('a').forEach(a => a.addEventListener('click', () => navLinksEl.classList.remove('open')));
}

/* ─── Mouse trailer ─── */
const trailer = document.createElement('div');
trailer.className = 'mouse-trailer';
document.body.appendChild(trailer);
let mouseX = 0, mouseY = 0, trailX = 0, trailY = 0;
window.addEventListener('mousemove', e => { mouseX = e.clientX; mouseY = e.clientY; }, { passive: true });
function animateTrailer() {
  trailX += (mouseX - trailX) * 0.12;
  trailY += (mouseY - trailY) * 0.12;
  trailer.style.transform = `translate(${trailX - 8}px, ${trailY - 8}px)`;
  requestAnimationFrame(animateTrailer);
}
animateTrailer();

/* ─── Toast ─── */
window.showToast = function(msg, type = 'success') {
  const toast = document.createElement('div');
  toast.className = 'site-toast ' + type;
  toast.innerHTML = '<i class="bi bi-' + (type === 'success' ? 'check-circle-fill' : 'exclamation-circle-fill') + '"></i> ' + msg;
  document.body.appendChild(toast);
  requestAnimationFrame(() => toast.classList.add('show'));
  setTimeout(() => { toast.classList.remove('show'); setTimeout(() => toast.remove(), 400); }, 4000);
};
document.querySelectorAll('[data-toast]').forEach(el => {
  el.addEventListener('click', () => window.showToast(el.dataset.toast));
});

/* ─── Theme Toggle ─── */
const themeToggle = document.getElementById('themeToggle');
const themeIcon = document.getElementById('themeIcon');
if (themeToggle && themeIcon) {
  const saved = localStorage.getItem('theme');
  if (saved === 'light') {
    document.body.classList.add('light');
    themeIcon.className = 'bi bi-sun-fill';
  }
  themeToggle.addEventListener('click', () => {
    document.body.classList.toggle('light');
    const isLight = document.body.classList.contains('light');
    themeIcon.className = isLight ? 'bi bi-sun-fill' : 'bi bi-moon-stars-fill';
    localStorage.setItem('theme', isLight ? 'light' : 'dark');
  });
}

/* ─── Lazy Loading ─── */
document.querySelectorAll('img:not([loading])').forEach(img => {
  if (!img.closest('.hero-bg-slider')) img.setAttribute('loading', 'lazy');
});

/* ─── Reveal on scroll ─── */
const revealEls = document.querySelectorAll('.reveal');
if (revealEls.length) {
  if ('IntersectionObserver' in window) {
    const revealObserver = new IntersectionObserver(
      entries => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('on');
            revealObserver.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.12, rootMargin: '0px 0px -8% 0px' }
    );
    revealEls.forEach(el => revealObserver.observe(el));
  } else {
    revealEls.forEach(el => el.classList.add('on'));
  }
}
