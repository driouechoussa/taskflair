<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Buildilume is a fast, clean task and project management app — organize tasks, set priorities and due dates, and filter your way to focus.">
    <title>
        @site_name('Buildilume — Organize your work, focus on what matters')
    </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href=" @get_static('media/favicon.ico') " type="image/x-icon">
    <link rel="stylesheet" href=" @get_static('style.css') ">
    <link rel="stylesheet" href=" @get_static('landing.css') ">
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
                    <li><a href="#how-it-works">Experience</a></li>
                    <li><a href=" @route('pricing') ">Pricing</a></li>
                    <li><a href=" @route('about') ">About</a></li>
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

        <section class="lp-hero">
            <div class="lp-container lp-hero-content">
                <span class="lp-badge lp-reveal">
                    <span class="lp-badge-dot"></span>
                    Task &amp; Project Management
                </span>

                <h1 class="lp-hero-title lp-reveal">
                    <span class="lp-hero-title-line">TASK</span>
                    <span class="lp-hero-title-line">FLAIR</span>
                </h1>

                <p class="lp-hero-sub lp-reveal">Organize projects, prioritize tasks, and hit every deadline — Buildilume turns a messy to-do list into a calm, focused workflow in minutes.</p>

                <div class="lp-hero-buttons lp-reveal">
                    <a class="lp-btn lp-btn-lime lp-btn-lg" href=" @route('dashboard') ">
                        Start For Free <i class="fas fa-arrow-right"></i>
                    </a>
                    <a class="lp-btn lp-btn-ghost lp-btn-lg" href="#how-it-works">
                        <span class="lp-play-dot"><i class="fas fa-play"></i></span>
                        See How it Works
                    </a>
                </div>

                <div class="lp-hero-floaters" aria-hidden="true">
                    <div class="lp-float-card lp-float-left" data-parallax>
                        <div class="lp-float-inner">
                            <div class="lp-float-head">
                                <span>On Progress</span>
                                <i class="fas fa-ellipsis"></i>
                            </div>
                            <div class="lp-float-body">
                                <div class="lp-float-task">
                                    <span class="lp-float-check checked"></span>
                                    <span class="lp-float-bar" style="--w: 82%"></span>
                                </div>
                                <div class="lp-float-task">
                                    <span class="lp-float-check"></span>
                                    <span class="lp-float-bar" style="--w: 55%"></span>
                                </div>
                                <div class="lp-float-ring">
                                    <svg viewBox="0 0 36 36">
                                        <path class="lp-ring-track" d="M18 2a16 16 0 1 1 0 32 16 16 0 1 1 0-32" />
                                        <path class="lp-ring-fill" d="M18 2a16 16 0 1 1 0 32 16 16 0 1 1 0-32" />
                                    </svg>
                                    <span>72%</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="lp-float-card lp-float-right" data-parallax>
                        <div class="lp-float-inner">
                            <div class="lp-float-head">
                                <span>New Task</span>
                                <i class="fas fa-plus"></i>
                            </div>
                            <div class="lp-float-body">
                                <div class="lp-float-input">Plan sprint kickoff</div>
                                <div class="lp-float-progress">
                                    <span>Saving…</span>
                                    <div class="lp-float-progress-track"><div class="lp-float-progress-fill"></div></div>
                                </div>
                                <div class="lp-float-done"><i class="fas fa-check"></i> Task created</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lp-stats lp-reveal">
                    <div class="lp-stat">
                        <span class="lp-stat-num" data-count="90" data-suffix="%">0%</span>
                        <span class="lp-stat-label">Time Saved</span>
                    </div>
                    <div class="lp-stat">
                        <span class="lp-stat-num" data-count="24000" data-suffix="+">0+</span>
                        <span class="lp-stat-label">Tasks Completed</span>
                    </div>
                    <div class="lp-stat lp-stat-avatars">
                        <div class="lp-avatar-stack">
                            <span class="lp-avatar" style="--c1:#ffd76a;--c2:#ff9a5a;">JD</span>
                            <span class="lp-avatar" style="--c1:#8ee6c1;--c2:#33b28a;">AR</span>
                            <span class="lp-avatar" style="--c1:#b7a6ff;--c2:#6a5bcf;">ML</span>
                        </div>
                        <div class="lp-stat-avatars-text">
                            <span class="lp-stat-num" data-count="1000" data-suffix="+">0+</span>
                            <span class="lp-stat-label">Boosted Teams</span>
                        </div>
                    </div>
                    <div class="lp-stat">
                        <span class="lp-stat-num" data-count="2000" data-suffix="+">0+</span>
                        <span class="lp-stat-label">Active Users</span>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <main>
        <section class="lp-section" id="features">
            <div class="lp-container">
                <div class="lp-collage" aria-hidden="true">
                    <div class="lp-tilt-card lp-tilt-1">
                        <span class="lp-tilt-icon"><i class="fas fa-list-check"></i></span>
                        Smart Task Lists
                    </div>
                    <div class="lp-tilt-card lp-tilt-2 lp-tilt-dark">
                        <span class="lp-tilt-icon"><i class="fas fa-bolt"></i></span>
                        Auto&nbsp;-&nbsp;Prioritization
                    </div>
                    <div class="lp-tilt-card lp-tilt-3">
                        <span class="lp-tilt-icon"><i class="fas fa-diagram-project"></i></span>
                        Team Templates
                    </div>
                    <div class="lp-tilt-card lp-tilt-4 lp-tilt-dark">
                        <span class="lp-tilt-icon"><i class="fas fa-calendar-day"></i></span>
                        Due&nbsp;-&nbsp;Date Alerts
                    </div>
                    <div class="lp-tilt-card lp-tilt-5">
                        <span class="lp-tilt-icon"><i class="fas fa-magnifying-glass"></i></span>
                        Instant Search
                    </div>
                </div>

                <div class="lp-section-header">
                    <span class="lp-eyebrow">Features</span>
                    <h2>Explore the Amazing Features<br>You Can Start Using Today</h2>
                    <p>Dive into a workspace built to keep your tasks, projects, and deadlines in perfect sync.</p>
                    <a class="lp-btn lp-btn-outline-dark" href=" @route('features') ">See All Features</a>
                </div>

                <div class="lp-list-rows">
                    <div class="lp-list-row lp-reveal">
                        <div class="lp-list-top">
                            <span class="lp-list-icon"><i class="fas fa-list-check"></i></span>
                            <span class="lp-list-index">01</span>
                        </div>
                        <h3>Streamlined Task Workflows</h3>
                        <p>Create, edit, and complete tasks in seconds with a clean, keyboard-friendly flow that keeps you moving.</p>
                        <a class="lp-learn-more" href="#how-it-works">Learn More <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="lp-list-row lp-reveal">
                        <div class="lp-list-top">
                            <span class="lp-list-icon"><i class="fas fa-users"></i></span>
                            <span class="lp-list-index">02</span>
                        </div>
                        <h3>Built for Growing Teams</h3>
                        <p>Group related work into color-coded projects so nothing gets lost as your team scales up.</p>
                        <a class="lp-learn-more" href="#how-it-works">Learn More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </section>

        <section class="lp-section lp-testimonial-section">
            <div class="lp-container">
                <div class="lp-testimonial-banner lp-reveal">
                    <i class="fas fa-quote-left lp-quote-icon"></i>

                    <div class="lp-testimonial-track">
                        <blockquote class="lp-testimonial-slide is-active">
                            <p>Buildilume keeps my whole sprint visible at a glance. I can't imagine going back to scattered spreadsheets and sticky notes!</p>
                            <footer>
                                <span class="lp-avatar" style="--c1:#ffd76a;--c2:#ff9a5a;">MK</span>
                                <div>
                                    <strong>Michael Keaton</strong>
                                    <span>Product Lead, Basecamp Corp</span>
                                </div>
                            </footer>
                        </blockquote>
                        <blockquote class="lp-testimonial-slide">
                            <p>Priority levels and due-date alerts alone cut our missed deadlines in half. It's the calmest our team has ever felt during a launch.</p>
                            <footer>
                                <span class="lp-avatar" style="--c1:#8ee6c1;--c2:#33b28a;">SR</span>
                                <div>
                                    <strong>Sara Reyes</strong>
                                    <span>Ops Manager, Northwind</span>
                                </div>
                            </footer>
                        </blockquote>
                        <blockquote class="lp-testimonial-slide">
                            <p>The instant search and filters make triaging a hundred tasks feel like triaging ten. Genuinely changed how our team plans the week.</p>
                            <footer>
                                <span class="lp-avatar" style="--c1:#b7a6ff;--c2:#6a5bcf;">DL</span>
                                <div>
                                    <strong>Daniel Lowe</strong>
                                    <span>Founder, Loomstack</span>
                                </div>
                            </footer>
                        </blockquote>
                    </div>

                    <div class="lp-testimonial-controls">
                        <button class="lp-testimonial-arrow" id="lp-testimonial-prev" aria-label="Previous testimonial"><i class="fas fa-arrow-left"></i></button>
                        <span class="lp-testimonial-count"><span id="lp-testimonial-current">01</span>/03</span>
                        <button class="lp-testimonial-arrow" id="lp-testimonial-next" aria-label="Next testimonial"><i class="fas fa-arrow-right"></i></button>
                    </div>
                </div>
            </div>
        </section>

        <section class="lp-section" id="how-it-works">
            <div class="lp-container">
                <div class="lp-section-header">
                    <span class="lp-eyebrow">Experience</span>
                    <h2>Discover a Better Way to Work</h2>
                    <p>Use every feature exactly how you need it — Buildilume adapts to the way your team already works.</p>
                </div>

                <div class="lp-mockup-row lp-reveal">
                    <div class="lp-mockup-text">
                        <span class="lp-eyebrow-sm">Smart Lists</span>
                        <h3>Enjoy the Convenience of Modern Tools, Including Smart Lists</h3>
                        <p>Countless teams have embraced Smart Lists as the go-to way to maximize focus and productivity, with instant filters for priority, project, and due date.</p>
                        <a class="lp-learn-more" href=" @route('dashboard') ">Learn More <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="lp-mockup-visual">
                        <div class="lp-mock-window">
                            <div class="lp-mock-titlebar">
                                <span class="lp-mock-dot red"></span>
                                <span class="lp-mock-dot yellow"></span>
                                <span class="lp-mock-dot green"></span>
                                <span>Create Task</span>
                                <i class="fas fa-ellipsis"></i>
                            </div>
                            <div class="lp-mock-body">
                                <div class="lp-mock-field">
                                    <label>Task name</label>
                                    <div class="lp-mock-input">Design new onboarding flow</div>
                                </div>
                                <div class="lp-mock-chips">
                                    <span class="lp-mock-chip high">High Priority</span>
                                    <span class="lp-mock-chip">Due Fri</span>
                                </div>
                                <div class="lp-mock-cta">Add Task</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lp-mockup-row lp-mockup-row-reverse lp-reveal">
                    <div class="lp-mockup-visual">
                        <div class="lp-mock-window">
                            <div class="lp-mock-titlebar">
                                <span class="lp-mock-dot red"></span>
                                <span class="lp-mock-dot yellow"></span>
                                <span class="lp-mock-dot green"></span>
                                <span>Customize Workflow</span>
                                <i class="fas fa-ellipsis"></i>
                            </div>
                            <div class="lp-mock-body">
                                <div class="lp-mock-field">
                                    <label>View</label>
                                    <div class="lp-mock-select">Board <i class="fas fa-chevron-down"></i></div>
                                </div>
                                <div class="lp-mock-field">
                                    <label>Group by</label>
                                    <div class="lp-mock-select">Priority <i class="fas fa-chevron-down"></i></div>
                                </div>
                                <div class="lp-mock-cta">Choose Template</div>
                            </div>
                        </div>
                    </div>
                    <div class="lp-mockup-text">
                        <span class="lp-eyebrow-sm">Smart Lists</span>
                        <h3>There Are Conveniences to Use — Smart Lists is One of Them</h3>
                        <p>Switch between board, list, and calendar views instantly, and group by whatever matters most to your team this week.</p>
                        <a class="lp-learn-more" href=" @route('dashboard') ">Learn More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>

                <div class="lp-center">
                    <a class="lp-btn lp-btn-outline-dark" href=" @route('features') ">See All Features</a>
                </div>
            </div>
        </section>

        <section class="lp-section lp-cta-section">
            <div class="lp-container lp-cta-inner lp-reveal">
                <h2>Ready to Bring Flair to<br>Your Task List?</h2>
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
                    <a href="#how-it-works">Experience</a>
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
