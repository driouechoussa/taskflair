<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="See how Buildilume works — from creating your site to automating your busywork, in four simple steps.">
    <title>
        @site_name('How It Works — Buildilume')
    </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href=" @get_static('media/favicon.ico') " type="image/x-icon">
    <link rel="stylesheet" href=" @get_static('style.css') ">
    <link rel="stylesheet" href=" @get_static('landing.css') ">
    <link rel="stylesheet" href=" @get_static('how-it-works.css') ">
</head>
<body class="lp-body">

    <div class="lp-panel lp-hero-panel">
        <div class="lp-hero-glow" aria-hidden="true"></div>

        <?php $activeNav = 'how_it_works'; ?>
        @insert('components/nav/navigation')

        <section class="lp-hero how-it-works-hero">
            <div class="lp-container lp-hero-content">
                <span class="lp-badge lp-reveal">
                    <span class="lp-badge-dot"></span>
                    How It Works
                </span>

                <h1 class="lp-hero-title lp-reveal">
                    <span class="lp-hero-title-line">FOUR STEPS</span>
                    <span class="lp-hero-title-line">TO CLARITY.</span>
                </h1>

                <p class="lp-hero-sub lp-reveal">From your first login to your first published page, here's exactly how Buildilume takes a blank canvas and turns it into a live, polished website.</p>

                <div class="lp-hero-buttons lp-reveal">
                    <a class="lp-btn lp-btn-lime lp-btn-lg" href=" @route('dashboard') ">
                        Start For Free <i class="fas fa-arrow-right"></i>
                    </a>
                    <a class="lp-btn lp-btn-ghost lp-btn-lg" href="#step-01">
                        <span class="lp-play-dot"><i class="fas fa-play"></i></span>
                        Walk Me Through It
                    </a>
                </div>
            </div>
        </section>
    </div>

    <main>
        <nav class="steps-subnav" id="steps-subnav">
            <div class="steps-subnav-inner">
                <a href="#step-01"><span class="steps-subnav-num">01</span> Sign Up</a>
                <a href="#step-02"><span class="steps-subnav-num">02</span> Set Up</a>
                <a href="#step-03"><span class="steps-subnav-num">03</span> Automate</a>
                <a href="#step-04"><span class="steps-subnav-num">04</span> Track</a>
            </div>
        </nav>

        <section class="lp-section how-step" id="step-01">
            <div class="lp-container">
                <div class="lp-mockup-row lp-reveal">
                    <div class="lp-mockup-text">
                        <span class="step-number">01</span>
                        <span class="lp-eyebrow-sm">Get Started</span>
                        <h3>Create Your Free Site in Seconds</h3>
                        <p>No credit card, no setup calls. Sign up with your email, name your site, and you're already looking at an empty canvas ready for your first page.</p>
                        <ul class="step-points">
                            <li><i class="fas fa-check"></i> Free forever plan, upgrade only when you outgrow it</li>
                            <li><i class="fas fa-check"></i> Invite teammates right from onboarding</li>
                            <li><i class="fas fa-check"></i> Import existing content from a spreadsheet or CMS export</li>
                        </ul>
                        <a class="lp-learn-more" href=" @route('signup') ">Create an Account <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="lp-mockup-visual">
                        <div class="lp-mock-window">
                            <div class="lp-mock-titlebar">
                                <span class="lp-mock-dot red"></span>
                                <span class="lp-mock-dot yellow"></span>
                                <span class="lp-mock-dot green"></span>
                                <span>Create Site</span>
                                <i class="fas fa-ellipsis"></i>
                            </div>
                            <div class="lp-mock-body">
                                <div class="lp-mock-field">
                                    <label>Site name</label>
                                    <div class="lp-mock-input">Acme Marketing Site</div>
                                </div>
                                <div class="lp-mock-field">
                                    <label>Work email</label>
                                    <div class="lp-mock-input">jordan@acme.com</div>
                                </div>
                                <div class="lp-mock-chips">
                                    <span class="lp-mock-chip high">Free Plan</span>
                                    <span class="lp-mock-chip">No card required</span>
                                </div>
                                <div class="lp-mock-cta">Create Account</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="lp-section how-step" id="step-02">
            <div class="lp-container">
                <div class="lp-mockup-row lp-mockup-row-reverse lp-reveal">
                    <div class="lp-mockup-visual">
                        <div class="lp-mock-window">
                            <div class="lp-mock-titlebar">
                                <span class="lp-mock-dot red"></span>
                                <span class="lp-mock-dot yellow"></span>
                                <span class="lp-mock-dot green"></span>
                                <span>New Page</span>
                                <i class="fas fa-ellipsis"></i>
                            </div>
                            <div class="lp-mock-body">
                                <div class="lp-mock-field">
                                    <label>Page title</label>
                                    <div class="lp-mock-input">Design new landing page</div>
                                </div>
                                <div class="lp-mock-field">
                                    <label>Site</label>
                                    <div class="lp-mock-select">Marketing Site <i class="fas fa-chevron-down"></i></div>
                                </div>
                                <div class="lp-mock-chips">
                                    <span class="lp-mock-chip high">Draft</span>
                                    <span class="lp-mock-chip">Publish Fri</span>
                                </div>
                                <div class="lp-mock-cta">Add Page</div>
                            </div>
                        </div>
                    </div>
                    <div class="lp-mockup-text">
                        <span class="step-number">02</span>
                        <span class="lp-eyebrow-sm">Build Your Site</span>
                        <h3>Set Up Pages Exactly How You Want</h3>
                        <p>Group pages into a clean site structure, add layouts and themes, then switch between page, widget, or content view — whichever fits the moment.</p>
                        <ul class="step-points">
                            <li><i class="fas fa-check"></i> Start from a blank page or a ready-made template</li>
                            <li><i class="fas fa-check"></i> Drag widgets between page, section, and content views</li>
                            <li><i class="fas fa-check"></i> Group and filter by status, page, or owner</li>
                        </ul>
                        <a class="lp-learn-more" href="@route('features')#planning">See Building Features <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </section>

        <section class="lp-section how-step" id="step-03">
            <div class="lp-container">
                <div class="lp-mockup-row lp-reveal">
                    <div class="lp-mockup-text">
                        <span class="step-number">03</span>
                        <span class="lp-eyebrow-sm">Automate</span>
                        <h3>Let Buildilume Handle the Busywork</h3>
                        <p>Define a rule once — "draft older than 7 days" or "traffic spike detected" — and Buildilume automatically resurfaces it to the top of the right queue, no manual triage required.</p>
                        <ul class="step-points">
                            <li><i class="fas fa-check"></i> Auto-prioritize pages based on urgency and traffic</li>
                            <li><i class="fas fa-check"></i> Set recurring content on daily, weekly, or custom schedules</li>
                            <li><i class="fas fa-check"></i> Get reminders before a draft goes stale, not after</li>
                        </ul>
                        <a class="lp-learn-more" href="@route('features')#automation">See Automation Features <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="lp-mockup-visual">
                        <div class="lp-mock-window">
                            <div class="lp-mock-titlebar">
                                <span class="lp-mock-dot red"></span>
                                <span class="lp-mock-dot yellow"></span>
                                <span class="lp-mock-dot green"></span>
                                <span>New Automation</span>
                                <i class="fas fa-ellipsis"></i>
                            </div>
                            <div class="lp-mock-body">
                                <div class="lp-mock-field">
                                    <label>When</label>
                                    <div class="lp-mock-select">Draft older than 7 days <i class="fas fa-chevron-down"></i></div>
                                </div>
                                <div class="lp-mock-field">
                                    <label>Then</label>
                                    <div class="lp-mock-select">Flag for review <i class="fas fa-chevron-down"></i></div>
                                </div>
                                <div class="lp-mock-chips">
                                    <span class="lp-mock-chip high">Active</span>
                                    <span class="lp-mock-chip">12 pages affected</span>
                                </div>
                                <div class="lp-mock-cta">Save Rule</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="lp-section how-step" id="step-04">
            <div class="lp-container">
                <div class="lp-mockup-row lp-mockup-row-reverse lp-reveal">
                    <div class="lp-mockup-visual">
                        <div class="lp-mock-window">
                            <div class="lp-mock-titlebar">
                                <span class="lp-mock-dot red"></span>
                                <span class="lp-mock-dot yellow"></span>
                                <span class="lp-mock-dot green"></span>
                                <span>Weekly Report</span>
                                <i class="fas fa-ellipsis"></i>
                            </div>
                            <div class="lp-mock-body">
                                <div class="lp-mock-field">
                                    <label>This week</label>
                                    <div class="lp-mock-select">12 pages published <i class="fas fa-chevron-down"></i></div>
                                </div>
                                <div class="lp-mock-field">
                                    <label>Site traffic</label>
                                    <div class="lp-mock-select">+18% vs last week <i class="fas fa-chevron-down"></i></div>
                                </div>
                                <div class="lp-mock-chips">
                                    <span class="lp-mock-chip high">72% Complete</span>
                                    <span class="lp-mock-chip">On Track</span>
                                </div>
                                <div class="lp-mock-cta">View Full Report</div>
                            </div>
                        </div>
                    </div>
                    <div class="lp-mockup-text">
                        <span class="step-number">04</span>
                        <span class="lp-eyebrow-sm">Track Progress</span>
                        <h3>Know Exactly Where Everything Stands</h3>
                        <p>Traffic trends, publishing charts, and content reports update themselves — no status meeting required, and no page quietly going stale.</p>
                        <ul class="step-points">
                            <li><i class="fas fa-check"></i> See performance at a glance, per page or site-wide</li>
                            <li><i class="fas fa-check"></i> Spot stale or underperforming pages before they hurt your site</li>
                            <li><i class="fas fa-check"></i> A searchable activity timeline for every page</li>
                        </ul>
                        <a class="lp-learn-more" href="@route('features')#insights">See Insights Features <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </section>

        <section class="lp-section lp-cta-section">
            <div class="lp-container lp-cta-inner lp-reveal">
                <h2>Ready to See It<br>Work for You?</h2>
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
                <span class="lp-badge lp-badge-light">Ready to Build Your Site?</span>
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
                    <p>Websites, simplified.</p>
                </div>

                <div class="lp-footer-col">
                    <h4>Product</h4>
                    <a href=" @route('features') ">Features</a>
                    <a href=" @route('how_it_works') ">How it Works</a>
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
    <script src=" @get_static('how-it-works.js') "></script>
</body>
</html>
