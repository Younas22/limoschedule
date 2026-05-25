/* ══════════════════════════════════════════════════════
   LIMOSCHEDULE — Main JavaScript
   Sections: Navbar · Features · Voice Search · AI Call Agent · Admin Panel
══════════════════════════════════════════════════════ */

/* Enable scroll animations (hides elements via CSS only when JS is available) */
document.documentElement.classList.add('js-ready');

/* Fallback: if IntersectionObserver never fires, reveal all hidden elements after 2s */
setTimeout(function () {
    document.querySelectorAll(
        '.section-fade:not(.visible),.stat-item:not(.visible),' +
        '.ai-call-fade:not(.visible),.voice-panel-reveal:not(.visible),' +
        '.voice-result-reveal:not(.visible),.ai-call-left-reveal:not(.visible),' +
        '.ai-call-right-reveal:not(.visible),.ai-bubble-reveal:not(.visible)'
    ).forEach(function (el) { el.classList.add('visible'); });
}, 2000);

/* ── Navbar + Global ── */
(function () {
    'use strict';

    /* Navbar scroll darkening */
    const navbar = document.getElementById('navbar');
    if (navbar) {
        window.addEventListener('scroll', function () {
            if (window.scrollY > 24) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        }, { passive: true });
    }

    /* Hamburger / mobile menu toggle */
    const hamburger  = document.getElementById('hamburger');
    const mobileMenu = document.getElementById('mobile-menu');
    let menuOpen = false;

    if (hamburger && mobileMenu) {
        function openMenu() {
            menuOpen = true;
            hamburger.classList.add('open');
            hamburger.setAttribute('aria-expanded', 'true');
            mobileMenu.classList.add('open');
            document.body.style.overflow = 'hidden';
        }
        function closeMenu() {
            menuOpen = false;
            hamburger.classList.remove('open');
            hamburger.setAttribute('aria-expanded', 'false');
            mobileMenu.classList.remove('open');
            document.body.style.overflow = '';
        }

        hamburger.addEventListener('click', function () {
            menuOpen ? closeMenu() : openMenu();
        });

        mobileMenu.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', closeMenu);
        });

        document.addEventListener('click', function (e) {
            if (menuOpen && !navbar.contains(e.target)) closeMenu();
        });

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && menuOpen) closeMenu();
        });
    }

    /* Active nav link highlight on scroll */
    const sections = document.querySelectorAll('[id]');
    const navLinks = document.querySelectorAll('.nav-link');
    if (sections.length) {
        const io = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    navLinks.forEach(function (link) {
                        const href = link.getAttribute('href');
                        if (href === '#' + entry.target.id) {
                            link.classList.add('active');
                            link.style.color = '#fff';
                        } else {
                            link.classList.remove('active');
                            link.style.color = '';
                        }
                    });
                }
            });
        }, { rootMargin: '-40% 0px -55% 0px' });
        sections.forEach(function (s) { io.observe(s); });
    }

    /* Trust strip fade-in on scroll */
    const statItems = document.querySelectorAll('.stat-item');
    if (statItems.length) {
        const statObs = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    statObs.unobserve(entry.target);
                }
            });
        }, { threshold: 0.2 });
        statItems.forEach(function (el) { statObs.observe(el); });
    }

    /* Section fade-up reveal (features grid + header) */
    const fadEls = document.querySelectorAll('.section-fade');
    if (fadEls.length) {
        const fadObs = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    fadObs.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });
        fadEls.forEach(function (el) { fadObs.observe(el); });
    }

})();

/* ── Voice Search Section ── */
(function () {
    'use strict';

    /* Reveal left panel on scroll */
    var panelEl = document.querySelector('.voice-panel-reveal');
    if (panelEl) {
        var panelObs = new IntersectionObserver(function (entries) {
            entries.forEach(function (e) {
                if (e.isIntersecting) {
                    e.target.classList.add('visible');
                    panelObs.unobserve(e.target);
                }
            });
        }, { threshold: 0.08 });
        panelObs.observe(panelEl);
    }

    /* Staggered reveal for result cards */
    var resultCards = document.querySelectorAll('.voice-result-reveal');
    if (resultCards.length) {
        var resObs = new IntersectionObserver(function (entries) {
            entries.forEach(function (e) {
                if (e.isIntersecting) {
                    e.target.classList.add('visible');
                    resObs.unobserve(e.target);
                }
            });
        }, { threshold: 0.08, rootMargin: '0px 0px -30px 0px' });
        resultCards.forEach(function (el) { resObs.observe(el); });
    }

    /* Mic button — demo state toggle */
    var micBtn     = document.getElementById('mic-btn');
    var statusText = document.getElementById('vs-status-text');
    var waveform   = document.getElementById('voice-waveform');
    if (!micBtn) return;

    var isListening = true;

    function setListening(active) {
        isListening = active;
        var bars = waveform.querySelectorAll('.vw-bar');
        if (active) {
            statusText.textContent = 'Listening';
            bars.forEach(function (b) {
                b.style.animationPlayState = 'running';
                b.style.opacity = '';
            });
            micBtn.style.borderColor = 'rgba(59,130,246,0.4)';
        } else {
            statusText.textContent = 'Processing…';
            bars.forEach(function (b) {
                b.style.animationPlayState = 'paused';
                b.style.opacity = '0.18';
                b.style.transform = 'scaleY(0.12)';
            });
            micBtn.style.borderColor = 'rgba(255,255,255,0.15)';
            /* Auto-resume after 1.8 s */
            setTimeout(function () {
                bars.forEach(function (b) { b.style.transform = ''; });
                setListening(true);
            }, 1800);
        }
    }

    micBtn.addEventListener('click', function () {
        if (isListening) setListening(false);
    });

})();

/* ── AI Call Agent Section ── */
(function () {
    'use strict';

    /* Build waveform bars */
    var waveEl = document.getElementById('ai-call-waveform');
    if (waveEl) {
        var barCount = 28;
        var fragment = document.createDocumentFragment();
        for (var i = 0; i < barCount; i++) {
            var bar = document.createElement('div');
            bar.className = 'ai-call-bar';
            var delay = (i / barCount * 1.0).toFixed(3);
            var h = 14 + Math.round(Math.abs(Math.sin(i * 0.62)) * 18);
            bar.style.animationDelay = delay + 's';
            bar.style.height = h + 'px';
            fragment.appendChild(bar);
        }
        waveEl.appendChild(fragment);
    }

    /* Live call duration counter */
    var durationEl = document.getElementById('ai-call-duration');
    if (durationEl) {
        var startSecs = 42;
        var timerActive = true;
        setInterval(function () {
            if (!timerActive) return;
            startSecs++;
            var m = Math.floor(startSecs / 60);
            var s = startSecs % 60;
            durationEl.textContent = m + ':' + (s < 10 ? '0' : '') + s;
        }, 1000);

        /* End-call button stops counter */
        var endBtn = document.getElementById('ai-end-call-btn');
        if (endBtn) {
            endBtn.addEventListener('click', function () {
                timerActive = !timerActive;
                var bars = waveEl ? waveEl.querySelectorAll('.ai-call-bar') : [];
                bars.forEach(function (b) {
                    b.style.animationPlayState = timerActive ? 'running' : 'paused';
                    b.style.opacity = timerActive ? '' : '0.15';
                });
                var liveDots = document.querySelectorAll('#ai-call-agent .bg-green-400');
                liveDots.forEach(function (d) {
                    d.style.animationPlayState = timerActive ? 'running' : 'paused';
                    d.style.background = timerActive ? '' : 'rgba(255,255,255,0.2)';
                });
                endBtn.title = timerActive ? 'End call' : 'Resume call';
            });
        }
    }

    /* Scroll reveal: section header */
    var fadeEls = document.querySelectorAll('#ai-call-agent .ai-call-fade');
    if (fadeEls.length) {
        var fadeObs = new IntersectionObserver(function (entries) {
            entries.forEach(function (e) {
                if (e.isIntersecting) {
                    e.target.classList.add('visible');
                    fadeObs.unobserve(e.target);
                }
            });
        }, { threshold: 0.1 });
        fadeEls.forEach(function (el) { fadeObs.observe(el); });
    }

    /* Scroll reveal: left panel */
    var leftEl = document.querySelector('.ai-call-left-reveal');
    if (leftEl) {
        var leftObs = new IntersectionObserver(function (entries) {
            entries.forEach(function (e) {
                if (e.isIntersecting) {
                    e.target.classList.add('visible');
                    leftObs.unobserve(e.target);
                }
            });
        }, { threshold: 0.08 });
        leftObs.observe(leftEl);
    }

    /* Scroll reveal: right panel (call card) + bubble cascade */
    var rightEl = document.querySelector('.ai-call-right-reveal');
    if (rightEl) {
        var rightObs = new IntersectionObserver(function (entries) {
            entries.forEach(function (e) {
                if (e.isIntersecting) {
                    e.target.classList.add('visible');
                    var bubbles = document.querySelectorAll('#ai-call-agent .ai-bubble-reveal');
                    bubbles.forEach(function (b) {
                        b.classList.add('visible');
                    });
                    rightObs.unobserve(e.target);
                }
            });
        }, { threshold: 0.08 });
        rightObs.observe(rightEl);
    }

})();

/* ══════════════════════════════════════════════════════
   ADMIN PANEL — Tab switching
══════════════════════════════════════════════════════ */
(function () {
    'use strict';

    var pageTitles = {
        'ap-dashboard': 'Overview',
        'ap-bookings':  'Booking Management',
        'ap-fleet':     'Fleet Control',
        'ap-pricing':   'Pricing Settings',
        'ap-analytics': 'Revenue Analytics',
        'ap-team':      'Team Management'
    };

    function switchAdminPanel(panelId) {
        document.querySelectorAll('.admin-panel').forEach(function (p) {
            p.classList.add('hidden');
        });
        document.querySelectorAll('.admin-tab').forEach(function (t) {
            t.classList.remove('active-tab');
        });
        document.querySelectorAll('.sidebar-nav-item').forEach(function (n) {
            n.classList.remove('active-nav');
        });

        var target = document.getElementById(panelId);
        if (target) { target.classList.remove('hidden'); }

        var activeTab = document.querySelector('.admin-tab[data-panel="' + panelId + '"]');
        if (activeTab) { activeTab.classList.add('active-tab'); }

        var activeNav = document.querySelector('.sidebar-nav-item[data-nav="' + panelId + '"]');
        if (activeNav) { activeNav.classList.add('active-nav'); }

        var titleEl = document.querySelector('.ap-page-title');
        if (titleEl && pageTitles[panelId]) { titleEl.textContent = pageTitles[panelId]; }
    }

    document.querySelectorAll('.admin-tab').forEach(function (tab) {
        tab.addEventListener('click', function () {
            var panelId = tab.getAttribute('data-panel');
            if (panelId) { switchAdminPanel(panelId); }
        });
    });

    document.querySelectorAll('.sidebar-nav-item[data-nav]').forEach(function (item) {
        item.addEventListener('click', function () {
            var panelId = item.getAttribute('data-nav');
            if (panelId) { switchAdminPanel(panelId); }
        });
    });

})();

/* ── FAQ Accordion ── */
(function () {
    'use strict';

    var accordion = document.getElementById('faq-accordion');
    if (!accordion) { return; }

    function closeItem(item) {
        var body    = item.querySelector('.faq-body');
        var trigger = item.querySelector('.faq-trigger');
        var chevron = item.querySelector('.faq-chevron');
        body.style.maxHeight = '0';
        trigger.setAttribute('aria-expanded', 'false');
        chevron.style.transform = 'rotate(0deg)';
        item.style.borderColor = 'rgba(255,255,255,0.07)';
    }

    function openItem(item) {
        var body    = item.querySelector('.faq-body');
        var trigger = item.querySelector('.faq-trigger');
        var chevron = item.querySelector('.faq-chevron');
        body.style.maxHeight = body.scrollHeight + 'px';
        trigger.setAttribute('aria-expanded', 'true');
        chevron.style.transform = 'rotate(180deg)';
        item.style.borderColor = 'rgba(59,130,246,0.35)';
    }

    accordion.querySelectorAll('.faq-trigger').forEach(function (trigger) {
        trigger.addEventListener('click', function () {
            var item   = trigger.closest('.faq-item');
            var isOpen = trigger.getAttribute('aria-expanded') === 'true';

            accordion.querySelectorAll('.faq-item').forEach(closeItem);

            if (!isOpen) { openItem(item); }
        });
    });
}());
