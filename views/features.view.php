<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Every feature Buildilume ships with — planning, collaboration, automation, and insight — all in one focused workspace.">
    <title>
        @site_name('Features — Buildilume')
    </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href=" @get_static('media/favicon.ico') " type="image/x-icon">
    <link rel="stylesheet" href=" @get_static('style.css') ">
    <link rel="stylesheet" href=" @get_static('landing.css') ">
    <link rel="stylesheet" href=" @get_static('features.css') ">
</head>
<body class="lp-body">

    <div class="lp-panel lp-hero-panel">
        <div class="lp-hero-glow" aria-hidden="true"></div>

        <?php $activeNav = 'features'; ?>
        @insert('components/nav/navigation')

        <section class="lp-hero features-hero">
            <div class="lp-container lp-hero-content">
                <span class="lp-badge lp-reveal">
                    <span class="lp-badge-dot"></span>
                    All Features
                </span>

                <h1 class="lp-hero-title lp-reveal">
                    <span class="lp-hero-title-line">BUILT FOR</span>
                    <span class="lp-hero-title-line">FOCUS.</span>
                </h1>

                <p class="lp-hero-sub lp-reveal">Every tool Buildilume ships with, organized by what it helps you do — planning, collaboration, automation, and insight.</p>

                <div class="lp-hero-buttons lp-reveal">
                    <a class="lp-btn lp-btn-lime lp-btn-lg" href=" @route('dashboard') ">
                        Start For Free <i class="fas fa-arrow-right"></i>
                    </a>
                    <a class="lp-btn lp-btn-ghost lp-btn-lg" href=" @route('home') ">
                        Back to Home
                    </a>
                </div>
            </div>
        </section>
    </div>

    <main>
        <div class="features-categories">
        <nav class="features-subnav" id="features-subnav">
            <div class="features-subnav-inner">
                <a href="#planning">Planning</a>
                <a href="#collaboration">Collaboration</a>
                <a href="#automation">Automation</a>
                <a href="#insights">Insights</a>
            </div>
        </nav>

        <section class="lp-section" id="planning">
            <div class="lp-container">
                <div class="lp-section-header">
                    <span class="lp-eyebrow">Planning</span>
                    <h2>Lay Out the Work<br>Before You Start It</h2>
                    <p>Turn a wall of to-dos into a structure your whole team can follow.</p>
                </div>

                <div class="feature-grid">
                    <div class="feature-card lp-reveal">
                        <span class="feature-icon"><i class="fas fa-list-check"></i></span>
                        <h3>Smart Task Lists</h3>
                        <p>Create, edit, and complete tasks in seconds with a clean, keyboard-friendly workflow.</p>
                    </div>
                    <div class="feature-card lp-reveal">
                        <span class="feature-icon"><i class="fas fa-diagram-project"></i></span>
                        <h3>Project Grouping</h3>
                        <p>Organize related tasks into color-coded projects so nothing gets lost in the noise.</p>
                    </div>
                    <div class="feature-card lp-reveal">
                        <span class="feature-icon"><i class="fas fa-calendar-day"></i></span>
                        <h3>Due Date Tracking</h3>
                        <p>Never miss a deadline with due dates, overdue alerts, and at-a-glance filters.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="lp-section" id="collaboration">
            <div class="lp-container">
                <div class="lp-section-header">
                    <span class="lp-eyebrow">Collaboration</span>
                    <h2>Built for Teams,<br>Not Just Individuals</h2>
                    <p>Keep everyone looking at the same picture, without another meeting.</p>
                </div>

                <div class="feature-grid">
                    <div class="feature-card lp-reveal">
                        <span class="feature-icon"><i class="fas fa-people-group"></i></span>
                        <h3>Team Templates</h3>
                        <p>Spin up a new project from proven templates your whole team can reuse.</p>
                    </div>
                    <div class="feature-card lp-reveal">
                        <span class="feature-icon"><i class="fas fa-building"></i></span>
                        <h3>Shared Workspaces</h3>
                        <p>Give every project its own space with shared visibility for the whole team.</p>
                    </div>
                    <div class="feature-card lp-reveal">
                        <span class="feature-icon"><i class="fas fa-comments"></i></span>
                        <h3>Comments &amp; Mentions</h3>
                        <p>Discuss tasks in context and pull teammates in with an @mention.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="lp-section" id="automation">
            <div class="lp-container">
                <div class="lp-section-header">
                    <span class="lp-eyebrow">Automation</span>
                    <h2>Let Buildilume<br>Handle the Busywork</h2>
                    <p>The routine parts of task management, running quietly in the background.</p>
                </div>

                <div class="feature-grid">
                    <div class="feature-card lp-reveal">
                        <span class="feature-icon"><i class="fas fa-bolt"></i></span>
                        <h3>Auto-Prioritization</h3>
                        <p>Buildilume nudges the right task to the top based on urgency and workload.</p>
                    </div>
                    <div class="feature-card lp-reveal">
                        <span class="feature-icon"><i class="fas fa-rotate"></i></span>
                        <h3>Recurring Tasks</h3>
                        <p>Set it once — daily, weekly, or custom schedules keep repeating work off your plate.</p>
                    </div>
                    <div class="feature-card lp-reveal">
                        <span class="feature-icon"><i class="fas fa-bell"></i></span>
                        <h3>Smart Reminders</h3>
                        <p>Get nudged before something slips, not after it's already late.</p>
                    </div>
                </div>

                <div class="lp-mockup-row lp-reveal features-spotlight">
                    <div class="lp-mockup-text">
                        <span class="lp-eyebrow-sm">Automation in Action</span>
                        <h3>Rules That Reprioritize Your Day For You</h3>
                        <p>Define a rule once — "due within 24 hours" or "blocked for 2+ days" — and Buildilume automatically resurfaces it to the top of your list.</p>
                        <a class="lp-learn-more" href=" @route('dashboard') ">Learn More <i class="fas fa-arrow-right"></i></a>
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
                                    <div class="lp-mock-select">Due within 24 hours <i class="fas fa-chevron-down"></i></div>
                                </div>
                                <div class="lp-mock-field">
                                    <label>Then</label>
                                    <div class="lp-mock-select">Move to top of list <i class="fas fa-chevron-down"></i></div>
                                </div>
                                <div class="lp-mock-chips">
                                    <span class="lp-mock-chip high">Active</span>
                                    <span class="lp-mock-chip">12 tasks affected</span>
                                </div>
                                <div class="lp-mock-cta">Save Rule</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="lp-section" id="insights">
            <div class="lp-container">
                <div class="lp-section-header">
                    <span class="lp-eyebrow">Insights</span>
                    <h2>Know Exactly Where<br>Everything Stands</h2>
                    <p>No status meeting required — the data speaks for itself.</p>
                </div>

                <div class="feature-grid">
                    <div class="feature-card lp-reveal">
                        <span class="feature-icon"><i class="fas fa-chart-line"></i></span>
                        <h3>Progress Analytics</h3>
                        <p>See completion trends and burndown at a glance, per project or team-wide.</p>
                    </div>
                    <div class="feature-card lp-reveal">
                        <span class="feature-icon"><i class="fas fa-scale-balanced"></i></span>
                        <h3>Workload Reports</h3>
                        <p>Spot overloaded teammates before they burn out, not after.</p>
                    </div>
                    <div class="feature-card lp-reveal">
                        <span class="feature-icon"><i class="fas fa-clock-rotate-left"></i></span>
                        <h3>Activity Timeline</h3>
                        <p>A complete, searchable history of every change made to a task.</p>
                    </div>
                </div>
            </div>
        </section>
        </div>

        <section class="lp-section lp-cta-section">
            <div class="lp-container lp-cta-inner lp-reveal">
                <h2>Ready to Put These<br>Features to Work?</h2>
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
                    <a href=" @route('how_it_works') ">Experience</a>
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
    <script src=" @get_static('features.js') "></script>
</body>
</html>
