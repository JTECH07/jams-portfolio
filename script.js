    const INTRO_DURATION_MS = 1300;
    const introOverlay = document.getElementById('siteIntroOverlay');

    const closeIntro = () => {
      if (!introOverlay || introOverlay.classList.contains('hide')) return;
      introOverlay.classList.add('hide');
      document.body.classList.remove('intro-lock');
    };

    if (introOverlay) {
      setTimeout(closeIntro, INTRO_DURATION_MS);
    }

    const nav = document.getElementById('mainNav');
    const linksWrap = document.getElementById('navLinks');
    const menuBtn = document.getElementById('menuBtn');
    const links = [...document.querySelectorAll('.nav-links a')];
    const trackedSections = links
      .map(link => link.getAttribute('href'))
      .filter(href => href && href.startsWith('#'))
      .map(hash => document.querySelector(hash))
      .filter(Boolean);

    menuBtn.addEventListener('click', () => linksWrap.classList.toggle('open'));
    links.forEach(link => link.addEventListener('click', () => linksWrap.classList.remove('open')));

    function onScroll() {
      nav.classList.toggle('scrolled', window.scrollY > 24);
      let current = 'home';
      trackedSections.forEach(sec => { if (window.scrollY >= sec.offsetTop - 130) current = sec.id; });
      links.forEach(a => a.classList.toggle('active', a.getAttribute('href') === '#' + current));
    }
    onScroll();
    window.addEventListener('scroll', onScroll);

    const revealObs = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add('on');
          revealObs.unobserve(entry.target);
        }
      });
    }, { threshold: 0.12 });
    document.querySelectorAll('.reveal').forEach(el => revealObs.observe(el));

    const countObs = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (!entry.isIntersecting) return;
        const el = entry.target.querySelector('[data-count]');
        if (!el) return;
        const target = Number(el.dataset.count);
        if (Number.isNaN(target)) return;
        let value = 0;
        const step = Math.max(1, Math.ceil(target / 45));
        const run = () => {
          value = Math.min(target, value + step);
          el.textContent = value;
          if (value < target) requestAnimationFrame(run);
        };
        requestAnimationFrame(run);
        countObs.unobserve(entry.target);
      });
    }, { threshold: 0.3 });
    document.querySelectorAll('.fact').forEach(card => countObs.observe(card));

    const projectsArmoire = document.getElementById('projectsArmoire');
    const projectsCabinet = document.getElementById('projectsCabinet');
    const projectsViewport = document.getElementById('projectsViewport');
    const projectsPrev = document.getElementById('projectsPrev');
    const projectsNext = document.getElementById('projectsNext');

    if (projectsArmoire && projectsCabinet && projectsViewport) {
      const cards = [...projectsCabinet.querySelectorAll('.project')];
      let activeIndex = 0;
      let autoRotateTimer = null;
      const reducedMotionQuery = window.matchMedia('(prefers-reduced-motion: reduce)');

      const normalizeDiff = (index) => {
        let diff = index - activeIndex;
        const half = cards.length / 2;
        if (diff > half) diff -= cards.length;
        if (diff < -half) diff += cards.length;
        return diff;
      };

      const resizeViewport = () => {
        if (!cards.length) return;
        const maxCardHeight = cards.reduce((max, card) => Math.max(max, card.offsetHeight || 0), 0);
        projectsViewport.style.height = `${Math.max(maxCardHeight + 36, 420)}px`;
      };

      const renderCabinet = () => {
        const spread = window.innerWidth <= 620 ? 128 : window.innerWidth <= 980 ? 166 : 210;
        const depth = window.innerWidth <= 620 ? 70 : 108;
        const tilt = window.innerWidth <= 620 ? 10 : 15;

        cards.forEach((card, index) => {
          const diff = normalizeDiff(index);
          const abs = Math.abs(diff);
          const scale = Math.max(0.58, 1 - abs * 0.12);
          const x = diff * spread;
          const y = abs * 18;
          const z = -abs * depth;
          const rotateY = diff * -tilt;
          const opacity = abs > 4 ? 0 : Math.max(0.2, 1 - abs * 0.2);
          const saturation = Math.max(0.42, 1 - abs * 0.18);

          card.style.setProperty(
            '--cab-transform',
            `translateX(-50%) translate3d(${x}px, ${y}px, ${z}px) rotateY(${rotateY}deg) scale(${scale})`
          );
          card.style.setProperty('--cab-opacity', opacity.toFixed(2));
          card.style.setProperty('--cab-saturation', saturation.toFixed(2));
          card.style.zIndex = String(100 - Math.round(abs * 10));
          card.classList.toggle('is-active', diff === 0);
          card.classList.add('on');
          card.querySelectorAll('.project-actions a, .project-actions button').forEach((action) => {
            action.tabIndex = diff === 0 ? 0 : -1;
          });
        });
      };

      const goTo = (nextIndex) => {
        activeIndex = (nextIndex + cards.length) % cards.length;
        renderCabinet();
      };

      const stopAutoRotate = () => {
        if (autoRotateTimer) {
          clearInterval(autoRotateTimer);
          autoRotateTimer = null;
        }
      };

      const startAutoRotate = () => {
        stopAutoRotate();
        if (reducedMotionQuery.matches || cards.length < 2) return;
        autoRotateTimer = setInterval(() => goTo(activeIndex + 1), 2000);
      };

      if (cards.length > 0) {
        projectsArmoire.classList.add('is-circular');
        resizeViewport();
        renderCabinet();
        startAutoRotate();

        cards.forEach((card, index) => {
          card.addEventListener('click', () => {
            if (index !== activeIndex) {
              goTo(index);
              startAutoRotate();
            }
          });
        });

        if (projectsPrev) {
          projectsPrev.addEventListener('click', () => {
            goTo(activeIndex - 1);
            startAutoRotate();
          });
        }

        if (projectsNext) {
          projectsNext.addEventListener('click', () => {
            goTo(activeIndex + 1);
            startAutoRotate();
          });
        }

        projectsArmoire.addEventListener('mouseenter', stopAutoRotate);
        projectsArmoire.addEventListener('mouseleave', startAutoRotate);
        projectsArmoire.addEventListener('focusin', stopAutoRotate);
        projectsArmoire.addEventListener('focusout', startAutoRotate);
        projectsArmoire.addEventListener('keydown', (event) => {
          if (event.key === 'ArrowLeft') {
            event.preventDefault();
            goTo(activeIndex - 1);
            startAutoRotate();
          }
          if (event.key === 'ArrowRight') {
            event.preventDefault();
            goTo(activeIndex + 1);
            startAutoRotate();
          }
        });

        document.addEventListener('visibilitychange', () => {
          if (document.hidden) {
            stopAutoRotate();
          } else {
            startAutoRotate();
          }
        });

        window.addEventListener('resize', () => {
          resizeViewport();
          renderCabinet();
        });
      }
    }

    const vergerRange = document.getElementById('vergerRange');
    const vergerCompareStage = document.getElementById('vergerCompareStage');
    if (vergerRange && vergerCompareStage) {
      const syncVergerCompare = () => {
        vergerCompareStage.style.setProperty('--split', `${vergerRange.value}%`);
      };
      vergerRange.addEventListener('input', syncVergerCompare);
      syncVergerCompare();
    }

    const contactForm = document.getElementById('dynamicContactForm');
    if (contactForm) {
      const proposalType = document.getElementById('proposalType');
      const talkSubject = document.getElementById('talkSubject');
      const previewProposal = document.getElementById('previewProposal');
      const previewSubject = document.getElementById('previewSubject');
      const previewItems = document.getElementById('previewItems');
      const formStatus = document.getElementById('formStatus');
      const selectedChecks = [...contactForm.querySelectorAll('input[name="collab_item"]')];
      const submitBtn = contactForm.querySelector('button[type="submit"]');
      const formFrame = document.getElementById('formSubmitFrame');
      const collabHidden = document.getElementById('collaborationResume');
      const subjectHidden = document.getElementById('sujetEffectif');
      const mailSubjectHidden = contactForm.querySelector('input[name="_subject"]');
      let isSubmitting = false;
      let suppressResetClear = false;

      const syncPreview = () => {
        const checked = selectedChecks.filter(item => item.checked).map(item => item.value);
        previewProposal.textContent = proposalType.value || 'À définir';
        previewSubject.textContent = talkSubject.value.trim() || 'À définir';
        previewItems.textContent = checked.length ? checked.join(', ') : 'À préciser';
      };

      contactForm.addEventListener('input', syncPreview);
      contactForm.addEventListener('change', syncPreview);
      contactForm.addEventListener('reset', () => {
        if (!suppressResetClear) {
          formStatus.textContent = '';
          formStatus.className = 'form-status';
        }
        setTimeout(syncPreview, 0);
      });

      contactForm.addEventListener('submit', () => {
        const checked = selectedChecks
          .filter(item => item.checked)
          .map(item => item.value)
          .join(', ') || 'À préciser';
        const effectiveSubject = talkSubject.value.trim() || proposalType.value || 'Nouvelle demande portfolio';

        collabHidden.value = checked;
        subjectHidden.value = effectiveSubject;
        mailSubjectHidden.value = `Portfolio | ${effectiveSubject}`;

        isSubmitting = true;
        submitBtn.disabled = true;
        formStatus.className = 'form-status';
        formStatus.textContent = 'Envoi en cours...';
      });

      if (formFrame) {
        formFrame.addEventListener('load', () => {
          if (!isSubmitting) return;
          isSubmitting = false;
          submitBtn.disabled = false;
          suppressResetClear = true;
          contactForm.reset();
          suppressResetClear = false;
          formStatus.className = 'form-status ok';
          formStatus.textContent = 'Message bien envoyé. Je vous réponds rapidement !';
        });
      }

      syncPreview();
    }
 
    const roles = [
      'Développeur Web & Mobile',
      'Ingénieur Logiciel Junior',
      'Développeur Full-Stack',
      'Passionné IA et robotique'
    ];

    const typingLine = document.getElementById('typingLine');
    let roleIndex = 0;
    let charIndex = 0;
    let deleting = false;

    function typeRole() {
      const word = roles[roleIndex];
      typingLine.textContent = deleting ? word.slice(0, charIndex--) : word.slice(0, charIndex++);
      let delay = deleting ? 50 : 85;

      if (!deleting && charIndex > word.length) {
        deleting = true;
        delay = 1300;
      }
      if (deleting && charIndex < 0) {
        deleting = false;
        roleIndex = (roleIndex + 1) % roles.length;
        delay = 320;
      }
      setTimeout(typeRole, delay);
    }

    setTimeout(typeRole, 700);