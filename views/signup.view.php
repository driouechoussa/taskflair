<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Create your free Buildilume account — design pages, drop in widgets, and publish your website in minutes.">
    <title>
        @site_name('Sign Up — Buildilume')
    </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href=" @get_static('media/favicon.ico') " type="image/x-icon">
    <link rel="stylesheet" href=" @get_static('style.css') ">
    <link rel="stylesheet" href=" @get_static('landing.css') ">
    <link rel="stylesheet" href=" @get_static('login.css') ">
    <link rel="stylesheet" href=" @get_static('signup.css') ">
</head>
<body class="lp-body login-body">

    <div class="login-page">
        <section class="login-brand lp-panel">
            <div class="login-glow" aria-hidden="true"></div>

            <div class="login-brand-inner">
                <a class="lp-logo" href=" @route('home') ">
                    <img src=" @get_static('media/logo.png') " alt="Buildilume logo">
                    <span>Buildilume</span>
                </a>

                <div class="login-brand-mid">
                    <span class="lp-badge lp-reveal">
                        <span class="lp-badge-dot"></span>
                        No-Code Website Builder
                    </span>

                    <h1 class="login-brand-title lp-reveal">Start<br>Building.</h1>
                    <p class="login-brand-sub lp-reveal">Create your free account and turn a blank canvas into a polished, published website — set up in under a minute.</p>

                    <div class="lp-float-card login-float-card">
                        <div class="lp-float-inner">
                            <div class="lp-float-head">
                                <span>New Page</span>
                                <i class="fas fa-plus"></i>
                            </div>
                            <div class="lp-float-body">
                                <div class="lp-float-input">Design homepage layout</div>
                                <div class="lp-float-progress">
                                    <span>Publishing…</span>
                                    <div class="lp-float-progress-track"><div class="lp-float-progress-fill"></div></div>
                                </div>
                                <div class="lp-float-done"><i class="fas fa-check"></i> Page published</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="login-brand-foot">
                    <div class="lp-avatar-stack">
                        <span class="lp-avatar" style="--c1:#ffd76a;--c2:#ff9a5a;">JD</span>
                        <span class="lp-avatar" style="--c1:#8ee6c1;--c2:#33b28a;">AR</span>
                        <span class="lp-avatar" style="--c1:#b7a6ff;--c2:#6a5bcf;">ML</span>
                    </div>
                    <span>Join 2,000+ teams already using Buildilume</span>
                </div>
            </div>
        </section>

        <section class="login-form-side">
            <div class="login-form-topbar">
                <a class="login-back" href=" @route('home') "><i class="fas fa-arrow-left"></i> Back to home</a>
            </div>

            <div class="login-card lp-reveal">
                <a class="lp-logo login-card-logo" href=" @route('home') ">
                    <img src=" @get_static('media/logo.png') " alt="Buildilume logo">
                    <span>Buildilume</span>
                </a>

                <span class="lp-eyebrow-sm">Get started</span>
                <h2 class="login-title">Create your account</h2>
                <p class="login-sub">Free to start — no credit card required.</p>

                <div class="login-social-row">
                    <button type="button" class="lp-btn lp-btn-ghost login-social-btn login-social-btn-dark">
                        <i class="fab fa-google"></i> Google
                    </button>
                    <button type="button" class="lp-btn lp-btn-ghost login-social-btn login-social-btn-dark">
                        <i class="fab fa-github"></i> GitHub
                    </button>
                </div>

                <div class="login-divider"><span>or sign up with email</span></div>

                <form id="signup-form" class="login-form" novalidate>
                    <div class="login-field">
                        <label for="signup-name">Full name</label>
                        <div class="login-input-wrap">
                            <i class="fas fa-user"></i>
                            <input type="text" id="signup-name" name="name" placeholder="Jane Doe" autocomplete="name" required>
                        </div>
                    </div>

                    <div class="login-field">
                        <label for="signup-email">Email address</label>
                        <div class="login-input-wrap">
                            <i class="fas fa-envelope"></i>
                            <input type="email" id="signup-email" name="email" placeholder="you@example.com" autocomplete="email" required>
                        </div>
                    </div>

                    <div class="login-field">
                        <label for="signup-password">Password</label>
                        <div class="login-input-wrap">
                            <i class="fas fa-lock"></i>
                            <input type="password" id="signup-password" name="password" placeholder="Create a password" autocomplete="new-password" minlength="8" required>
                            <button type="button" class="login-toggle-visibility" id="signup-toggle-password" aria-label="Show password">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <span class="signup-hint">Use 8 or more characters</span>
                    </div>

                    <label class="login-checkbox signup-terms">
                        <input type="checkbox" name="terms" required>
                        <span class="login-checkbox-box"></span>
                        I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>
                    </label>

                    <button type="submit" class="lp-btn lp-btn-lime lp-btn-lg login-submit">
                        Create Account <i class="fas fa-arrow-right"></i>
                    </button>

                    <p class="login-status" id="signup-status" role="status" aria-live="polite"></p>
                </form>

                <p class="login-footer-note">Already have an account? <a href=" @route('login') ">Log in</a></p>
            </div>
        </section>
    </div>

    <script src=" @get_static('landing.js') "></script>
    <script src=" @get_static('signup.js') "></script>
</body>
</html>
