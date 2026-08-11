document.addEventListener('DOMContentLoaded', function () {
    var navToggle = document.getElementById('lp-nav-toggle');
    var navLinks = document.getElementById('lp-nav-links');

    if (navToggle && navLinks) {
        navToggle.addEventListener('click', function () {
            navLinks.classList.toggle('lp-open');
            var isOpen = navLinks.classList.contains('lp-open');
            navToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
            navToggle.querySelector('i').className = isOpen ? 'fas fa-times' : 'fas fa-bars';
        });

        navLinks.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', function () {
                navLinks.classList.remove('lp-open');
                navToggle.setAttribute('aria-expanded', 'false');
                navToggle.querySelector('i').className = 'fas fa-bars';
            });
        });
    }

    // Scroll-triggered reveal animations
    var revealTargets = document.querySelectorAll('.lp-reveal');
    var statTargets = document.querySelectorAll('.lp-stat-num');

    var animateCount = function (el) {
        var target = parseInt(el.getAttribute('data-count'), 10) || 0;
        var suffix = el.getAttribute('data-suffix') || '';
        var duration = 1400;
        var start = null;

        var step = function (timestamp) {
            if (!start) start = timestamp;
            var progress = Math.min((timestamp - start) / duration, 1);
            var eased = 1 - Math.pow(1 - progress, 3);
            var value = Math.round(eased * target);
            el.textContent = value.toLocaleString() + suffix;
            if (progress < 1) {
                requestAnimationFrame(step);
            }
        };

        requestAnimationFrame(step);
    };

    if ('IntersectionObserver' in window) {
        if (revealTargets.length) {
            var revealObserver = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('lp-visible');
                        revealObserver.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.15 });

            revealTargets.forEach(function (el) {
                revealObserver.observe(el);
            });
        }

        if (statTargets.length) {
            var statObserver = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        animateCount(entry.target);
                        statObserver.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.4 });

            statTargets.forEach(function (el) {
                statObserver.observe(el);
            });
        }
    } else {
        revealTargets.forEach(function (el) { el.classList.add('lp-visible'); });
        statTargets.forEach(function (el) { animateCount(el); });
    }

    // Testimonial slider
    var slides = document.querySelectorAll('.lp-testimonial-slide');
    var prevBtn = document.getElementById('lp-testimonial-prev');
    var nextBtn = document.getElementById('lp-testimonial-next');
    var counter = document.getElementById('lp-testimonial-current');

    if (slides.length) {
        var current = 0;
        var autoplayId = null;

        var pad = function (n) { return n < 10 ? '0' + n : String(n); };

        var showSlide = function (index) {
            slides[current].classList.remove('is-active');
            current = (index + slides.length) % slides.length;
            slides[current].classList.add('is-active');
            if (counter) counter.textContent = pad(current + 1);
        };

        var restartAutoplay = function () {
            if (autoplayId) clearInterval(autoplayId);
            autoplayId = setInterval(function () { showSlide(current + 1); }, 6000);
        };

        if (prevBtn) prevBtn.addEventListener('click', function () { showSlide(current - 1); restartAutoplay(); });
        if (nextBtn) nextBtn.addEventListener('click', function () { showSlide(current + 1); restartAutoplay(); });

        restartAutoplay();
    }

    // Subtle cursor parallax on the hero's floating widget cards
    var heroSection = document.querySelector('.lp-hero');
    var floaters = document.querySelectorAll('.lp-float-card[data-parallax]');

    if (heroSection && floaters.length && window.matchMedia('(pointer: fine)').matches) {
        heroSection.addEventListener('mousemove', function (event) {
            var rect = heroSection.getBoundingClientRect();
            var x = (event.clientX - rect.left) / rect.width - 0.5;
            var y = (event.clientY - rect.top) / rect.height - 0.5;

            floaters.forEach(function (card, i) {
                var strength = i % 2 === 0 ? 14 : -14;
                card.style.transform = 'translate(' + (x * strength) + 'px, ' + (y * strength) + 'px)';
            });
        });

        heroSection.addEventListener('mouseleave', function () {
            floaters.forEach(function (card) { card.style.transform = ''; });
        });
    }
});
