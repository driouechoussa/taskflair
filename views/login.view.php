<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Log in to Buildilume — organize tasks, set priorities and due dates, and filter your way to focus.">
    <title>
        @site_name('Log In — Buildilume')
    </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href=" @get_static('media/favicon.ico') " type="image/x-icon">
    <link rel="stylesheet" href=" @get_static('style.css') ">
    <link rel="stylesheet" href=" @get_static('landing.css') ">
    <link rel="stylesheet" href=" @get_static('login.css') ">
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
                        Task &amp; Project Management
                    </span>

                    <h1 class="login-brand-title lp-reveal">Welcome<br>Back.</h1>
                    <p class="login-brand-sub lp-reveal">Sign in to pick up right where you left off — your boards, priorities, and deadlines are exactly where you put them.</p>

                    <div class="lp-float-card login-float-card">
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
                                    <span class="lp-float-bar" style="--w: 45%"></span>
                                </div>
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
                    <span>Trusted by 2,000+ active teams</span>
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

                <span class="lp-eyebrow-sm">Welcome back</span>
                <h2 class="login-title">Log in to your account</h2>
                <p class="login-sub">Enter your details below to continue organizing your work.</p>

                <div class="login-social-row">
                    <button type="button" class="lp-btn lp-btn-ghost login-social-btn login-social-btn-dark">
                        <i class="fab fa-google"></i> Google
                    </button>
                    <button type="button" class="lp-btn lp-btn-ghost login-social-btn login-social-btn-dark">
                        <i class="fab fa-github"></i> GitHub
                    </button>
                </div>

                <div class="login-divider"><span>or continue with email</span></div>

                <form id="login-form" class="login-form" novalidate>
                    <div class="login-field">
                        <label for="login-email">Email address</label>
                        <div class="login-input-wrap">
                            <i class="fas fa-envelope"></i>
                            <input type="email" id="login-email" name="email" placeholder="you@example.com" autocomplete="email" required>
                        </div>
                    </div>

                    <div class="login-field">
                        <label for="login-password">Password</label>
                        <div class="login-input-wrap">
                            <i class="fas fa-lock"></i>
                            <input type="password" id="login-password" name="password" placeholder="Enter your password" autocomplete="current-password" required>
                            <button type="button" class="login-toggle-visibility" id="login-toggle-password" aria-label="Show password">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <div class="login-row">
                        <label class="login-checkbox">
                            <input type="checkbox" name="remember">
                            <span class="login-checkbox-box"></span>
                            Remember me
                        </label>
                        <a href="#" class="login-forgot">Forgot password?</a>
                    </div>

                    <button type="submit" class="lp-btn lp-btn-lime lp-btn-lg login-submit">
                        Log In <i class="fas fa-arrow-right"></i>
                    </button>

                    <p class="login-status" id="login-status" role="status" aria-live="polite"></p>
                </form>

                <p class="login-footer-note">New to Buildilume? <a href=" @route('signup') ">Sign up free</a></p>
            </div>
        </section>
    </div>

    <script src=" @get_static('landing.js') "></script>
    <script src=" @get_static('login.js') "></script>
</body>
</html>
