<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Set up your Buildilume site in under a minute.">
    <title>
        @site_name('Set Up Your Site — Buildilume')
    </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href=" @get_static('media/favicon.ico') " type="image/x-icon">
    <link rel="stylesheet" href=" @get_static('style.css') ">
    <link rel="stylesheet" href=" @get_static('landing.css') ">
    <link rel="stylesheet" href=" @get_static('onboarding.css') ">
</head>
<body class="lp-body onboarding-body">

    <div class="onboarding-page">
        <section class="onboarding-shell lp-panel">
            <div class="onboarding-glow" aria-hidden="true"></div>

            <div class="onboarding-top">
                <a class="lp-logo" href=" @route('home') ">
                    <img src=" @get_static('media/logo.png') " alt="Buildilume logo">
                    <span>Buildilume</span>
                </a>
                <a class="onboarding-skip" id="onboarding-skip" href=" @route('dashboard') ">Skip for now <i class="fas fa-arrow-right"></i></a>
            </div>

            <div class="onboarding-progress">
                <div class="onboarding-progress-track" id="onboarding-progress-track">
                    <span class="onboarding-progress-seg"></span>
                    <span class="onboarding-progress-seg"></span>
                    <span class="onboarding-progress-seg"></span>
                    <span class="onboarding-progress-seg"></span>
                    <span class="onboarding-progress-seg"></span>
                </div>
                <span class="onboarding-progress-label" id="onboarding-progress-label">Step 1 of 5</span>
            </div>

            <div class="onboarding-viewport">
                <div class="onboarding-track" id="onboarding-track">

                    <!-- Step 1: Welcome -->
                    <div class="onboarding-step" data-step="0">
                        <div class="onboarding-step-inner onboarding-welcome">
                            <div class="lp-badge">
                                <span class="lp-badge-dot"></span>
                                Quick Setup
                            </div>
                            <h1 class="onboarding-title">Let's set up<br>your site.</h1>
                            <p class="onboarding-sub">A few quick questions to personalize Buildilume for how you build — this takes about a minute.</p>

                            <div class="lp-float-card onboarding-float-card">
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
                                            <span class="lp-float-bar" style="--w: 50%"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 2: Role -->
                    <div class="onboarding-step" data-step="1">
                        <div class="onboarding-step-inner">
                            <span class="lp-eyebrow-sm onboarding-eyebrow-light">About you</span>
                            <h2 class="onboarding-heading">What best describes you?</h2>
                            <p class="onboarding-sub onboarding-sub-light">Pick the option that fits best — you can always change this later.</p>

                            <div class="onboarding-option-grid" data-group="role">
                                <button type="button" class="onboarding-option" data-value="Individual">
                                    <span class="onboarding-option-icon"><i class="fas fa-user"></i></span>
                                    <span class="onboarding-option-label">Individual</span>
                                    <span class="onboarding-option-check"><i class="fas fa-check"></i></span>
                                </button>
                                <button type="button" class="onboarding-option" data-value="Team Lead">
                                    <span class="onboarding-option-icon"><i class="fas fa-people-arrows"></i></span>
                                    <span class="onboarding-option-label">Team Lead</span>
                                    <span class="onboarding-option-check"><i class="fas fa-check"></i></span>
                                </button>
                                <button type="button" class="onboarding-option" data-value="Freelancer">
                                    <span class="onboarding-option-icon"><i class="fas fa-briefcase"></i></span>
                                    <span class="onboarding-option-label">Freelancer</span>
                                    <span class="onboarding-option-check"><i class="fas fa-check"></i></span>
                                </button>
                                <button type="button" class="onboarding-option" data-value="Student">
                                    <span class="onboarding-option-icon"><i class="fas fa-graduation-cap"></i></span>
                                    <span class="onboarding-option-label">Student</span>
                                    <span class="onboarding-option-check"><i class="fas fa-check"></i></span>
                                </button>
                            </div>
                            <p class="onboarding-error" data-error-for="1">Choose one to continue.</p>
                        </div>
                    </div>

                    <!-- Step 3: Team size -->
                    <div class="onboarding-step" data-step="2">
                        <div class="onboarding-step-inner">
                            <span class="lp-eyebrow-sm onboarding-eyebrow-light">Your team</span>
                            <h2 class="onboarding-heading">How big is your team?</h2>
                            <p class="onboarding-sub onboarding-sub-light">This helps us tailor project templates and limits to the right scale.</p>

                            <div class="onboarding-chip-row" data-group="size">
                                <button type="button" class="onboarding-chip" data-value="Just me">Just me</button>
                                <button type="button" class="onboarding-chip" data-value="2–10 people">2–10 people</button>
                                <button type="button" class="onboarding-chip" data-value="11–50 people">11–50 people</button>
                                <button type="button" class="onboarding-chip" data-value="50+ people">50+ people</button>
                            </div>
                            <p class="onboarding-error" data-error-for="2">Choose one to continue.</p>
                        </div>
                    </div>

                    <!-- Step 4: Focus areas -->
                    <div class="onboarding-step" data-step="3">
                        <div class="onboarding-step-inner">
                            <span class="lp-eyebrow-sm onboarding-eyebrow-light">Your focus</span>
                            <h2 class="onboarding-heading">What do you want to build?</h2>
                            <p class="onboarding-sub onboarding-sub-light">Pick as many as you like — Buildilume adapts to fit.</p>

                            <div class="onboarding-chip-row onboarding-chip-row-multi" data-group="focus" data-multi="true">
                                <button type="button" class="onboarding-chip" data-value="Landing Pages"><i class="fas fa-list-check"></i> Landing Pages</button>
                                <button type="button" class="onboarding-chip" data-value="Blog"><i class="fas fa-diagram-project"></i> Blog</button>
                                <button type="button" class="onboarding-chip" data-value="Portfolio"><i class="fas fa-bolt"></i> Portfolio</button>
                                <button type="button" class="onboarding-chip" data-value="Online Store"><i class="fas fa-bullseye"></i> Online Store</button>
                                <button type="button" class="onboarding-chip" data-value="Content Calendar"><i class="fas fa-calendar-day"></i> Content Calendar</button>
                                <button type="button" class="onboarding-chip" data-value="Client Sites"><i class="fas fa-handshake"></i> Client Sites</button>
                            </div>
                        </div>
                    </div>

                    <!-- Step 5: Workspace name -->
                    <div class="onboarding-step" data-step="4">
                        <div class="onboarding-step-inner onboarding-step-narrow">
                            <span class="lp-eyebrow-sm onboarding-eyebrow-light">Almost there</span>
                            <h2 class="onboarding-heading">Name your site.</h2>
                            <p class="onboarding-sub onboarding-sub-light">You can invite teammates and change this anytime from settings.</p>

                            <div class="onboarding-input-wrap">
                                <i class="fas fa-building"></i>
                                <input type="text" id="onboarding-workspace-name" placeholder="e.g. Acme Team" maxlength="40" autocomplete="off">
                            </div>
                            <p class="onboarding-slug-preview">buildilume.app/<span id="onboarding-slug-value">your-site</span></p>
                            <p class="onboarding-error" data-error-for="4">Give your site a name to continue.</p>
                        </div>
                    </div>

                    <!-- Step 6: Completion -->
                    <div class="onboarding-step" data-step="5">
                        <div class="onboarding-step-inner onboarding-complete">
                            <div class="onboarding-check-badge"><i class="fas fa-check"></i></div>
                            <h1 class="onboarding-title">You're all set!</h1>
                            <p class="onboarding-sub">Here's what we set up for <strong id="onboarding-summary-name">your site</strong>:</p>

                            <ul class="onboarding-summary">
                                <li><i class="fas fa-user"></i> Role — <span id="onboarding-summary-role">—</span></li>
                                <li><i class="fas fa-people-arrows"></i> Team size — <span id="onboarding-summary-size">—</span></li>
                                <li><i class="fas fa-list-check"></i> Focus — <span id="onboarding-summary-focus">—</span></li>
                            </ul>

                            <a class="lp-btn lp-btn-lime lp-btn-lg" href=" @route('dashboard') ">
                                Go to Dashboard <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

            <div class="onboarding-nav" id="onboarding-nav">
                <button type="button" class="lp-btn lp-btn-ghost" id="onboarding-back">
                    <i class="fas fa-arrow-left"></i> Back
                </button>
                <button type="button" class="lp-btn lp-btn-lime" id="onboarding-next">
                    Continue <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </section>
    </div>

    <script src=" @get_static('onboarding.js') "></script>
</body>
</html>
