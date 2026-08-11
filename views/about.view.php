<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Why we built Buildilume — a fast, focused task and project workspace with no clutter and no busywork.">
    <title>
        @site_name('About — Buildilume')
    </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href=" @get_static('media/favicon.ico') " type="image/x-icon">
    <link rel="stylesheet" href=" @get_static('style.css') ">
    <link rel="stylesheet" href=" @get_static('landing.css') ">
    <link rel="stylesheet" href=" @get_static('about.css') ">
</head>
<body class="lp-body">

    <div class="lp-panel lp-hero-panel">
        <div class="lp-hero-glow" aria-hidden="true"></div>

        <nav class="lp-navbar">
            <div class="lp-nav-inner">
                <a class="lp-logo" href=" @route('home') ">
                    <img src=" @get_static('media/logo.png') " alt="Buildilume logo">
                    <span>Buildilume</span>
                </a>

                <ul class="lp-nav-links" id="lp-nav-links">
                    <li><a href=" @route('features') ">Features</a></li>
                    <li><a href="@route('home')#how-it-works">Experience</a></li>
                    <li><a href=" @route('pricing') ">Pricing</a></li>
                    <li><a href=" @route('about') " class="is-active">About</a></li>
                    <li class="lp-mobile-only-link"><a href=" @route('login') ">Log In</a></li>
                </ul>

                <div class="lp-nav-right">
                    <a class="login-nav-link" href=" @route('login') ">Log In</a>
                    <a class="lp-btn lp-btn-lime lp-btn-sm" href=" @route('dashboard') ">Start Free</a>
                    <button class="lp-nav-toggle" id="lp-nav-toggle" aria-label="Toggle navigation menu" aria-expanded="false">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </nav>

        <section class="lp-hero about-hero">
            <div class="lp-container lp-hero-content">
                <span class="lp-badge lp-reveal">
                    <span class="lp-badge-dot"></span>
                    About Us
                </span>

                <h1 class="lp-hero-title lp-reveal">
                    <span class="lp-hero-title-line">LESS NOISE.</span>
                    <span class="lp-hero-title-line">MORE FOCUS.</span>
                </h1>

                <p class="lp-hero-sub lp-reveal">Buildilume is a small, focused team building the task workspace we always wished existed — fast, calm, and free of clutter.</p>
            </div>
        </section>
    </div>

    <main>
        <section class="lp-section">
            <div class="lp-container">
                <div class="lp-mockup-row lp-reveal">
                    <div class="lp-mockup-text">
                        <span class="lp-eyebrow-sm">Our Story</span>
                        <h3>Why We Built Buildilume</h3>
                        <p>Every task app we tried did too much. Dashboards, automations, and settings menus before you could add a single task. Buildilume started as a weekend itch — a place to plan the day without wading through everything else first.</p>
                        <p>What began as a personal project turned into the workspace we'd always wanted: fast, calm, and genuinely focused on the work in front of you.</p>
                    </div>
                    <div class="lp-mockup-visual">
                        <div class="lp-mock-window">
                            <div class="lp-mock-titlebar">
                                <span class="lp-mock-dot red"></span>
                                <span class="lp-mock-dot yellow"></span>
                                <span class="lp-mock-dot green"></span>
                                <span>Focus Mode</span>
                                <i class="fas fa-ellipsis"></i>
                            </div>
                            <div class="lp-mock-body">
                                <div class="lp-mock-field">
                                    <label>Today</label>
                                    <div class="lp-mock-input">Ship the About page copy</div>
                                </div>
                                <div class="lp-mock-chips">
                                    <span class="lp-mock-chip high">Focused</span>
                                    <span class="lp-mock-chip">1 of 3 today</span>
                                </div>
                                <div class="lp-mock-cta">Mark Complete</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="lp-section about-values-section">
            <div class="lp-container">
                <div class="lp-section-header">
                    <span class="lp-eyebrow">What We Believe</span>
                    <h2>The Principles Behind<br>Every Decision We Make</h2>
                    <p>These aren't values on a poster — they're the filter every feature has to pass through.</p>
                </div>

                <div class="value-grid">
                    <div class="value-card lp-reveal">
                        <span class="value-icon"><i class="fas fa-bullseye"></i></span>
                        <h3>Focus Over Feature Bloat</h3>
                        <p>We'd rather ship five things that work perfectly than fifty that half-work.</p>
                    </div>
                    <div class="value-card lp-reveal">
                        <span class="value-icon"><i class="fas fa-gauge-high"></i></span>
                        <h3>Fast By Default</h3>
                        <p>Every screen should feel instant. Speed is a feature, not an afterthought.</p>
                    </div>
                    <div class="value-card lp-reveal">
                        <span class="value-icon"><i class="fas fa-users"></i></span>
                        <h3>Built for Real Workflows</h3>
                        <p>We design around how teams actually work, not how a slide deck says they should.</p>
                    </div>
                    <div class="value-card lp-reveal">
                        <span class="value-icon"><i class="fas fa-shield-halved"></i></span>
                        <h3>Respect Your Data</h3>
                        <p>Your tasks are yours. No dark patterns, no selling your data — ever.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="lp-section about-stats-section">
            <div class="lp-container">
                <div class="about-stats-strip lp-reveal">
                    <div class="about-stat">
                        <span class="about-stat-num">90%</span>
                        <span class="about-stat-label">Time Saved</span>
                    </div>
                    <div class="about-stat">
                        <span class="about-stat-num">24,000+</span>
                        <span class="about-stat-label">Tasks Completed</span>
                    </div>
                    <div class="about-stat">
                        <span class="about-stat-num">2,000+</span>
                        <span class="about-stat-label">Active Users</span>
                    </div>
                    <div class="about-stat">
                        <span class="about-stat-num">1</span>
                        <span class="about-stat-label">Focused Workspace</span>
                    </div>
                </div>
            </div>
        </section>

        <section class="lp-section lp-cta-section">
            <div class="lp-container lp-cta-inner lp-reveal">
                <h2>Come Build Something<br>Focused With Us.</h2>
                <a class="lp-btn lp-btn-dark lp-btn-lg" href=" @route('dashboard') ">Create a Free Account</a>
                <div class="lp-cta-avatars">
                    <span class="lp-avatar" style="--c1:#ffd76a;--c2:#ff9a5a;">JD</span>
                    <span class="lp-avatar" style="--c1:#8ee6c1;--c2:#33b28a;">AR</span>
                    <span class="lp-avatar" style="--c1:#b7a6ff;--c2:#6a5bcf;">ML</span>
                    <span class="lp-avatar" style="--c1:#ff9ab0;--c2:#e35d84;">SR</span>
                    <span class="lp-avatar" style="--c1:#8fd0ff;--c2:#4a9de0;">DL</span>
                </div>
            </div>
        </section>
    </main>

    <footer class="lp-panel lp-footer-panel">
        <div class="lp-container">
            <div class="lp-footer-top">
                <span class="lp-badge lp-badge-light">Ready to Get Organized?</span>
            </div>

            <a class="lp-footer-cta" href=" @route('dashboard') ">
                <h2>GET STARTED</h2>
                <span class="lp-footer-arrow"><i class="fas fa-arrow-up-right-from-square"></i></span>
            </a>

            <div class="lp-footer-columns">
                <div class="lp-footer-brand">
                    <a class="lp-logo" href=" @route('home') ">
                        <img src=" @get_static('media/logo.png') " alt="Buildilume logo">
                        <span>Buildilume</span>
                    </a>
                    <p>Task management, simplified.</p>
                </div>

                <div class="lp-footer-col">
                    <h4>Product</h4>
                    <a href=" @route('features') ">Features</a>
                    <a href="@route('home')#how-it-works">Experience</a>
                    <a href=" @route('pricing') ">Pricing</a>
                    <a href=" @route('dashboard') ">Get Started</a>
                </div>

                <div class="lp-footer-col">
                    <h4>Company</h4>
                    <a href=" @route('home') ">Home</a>
                    <a href=" @route('about') ">About</a>
                </div>

                <div class="lp-footer-col">
                    <h4>Social</h4>
                    <a href="#"><i class="fab fa-x-twitter"></i> Twitter</a>
                    <a href="#"><i class="fab fa-github"></i> GitHub</a>
                    <a href="#"><i class="fab fa-linkedin"></i> LinkedIn</a>
                </div>
            </div>

            <div class="lp-footer-bottom">
                &copy; <?php echo date('Y'); ?> Buildilume. All rights reserved.
            </div>
        </div>
    </footer>

    <script src=" @get_static('landing.js') "></script>
</body>
</html>
