<nav class="lp-navbar">
    <div class="lp-nav-inner">
        <a class="lp-logo" href=" @route('home') ">
            <img src=" @get_static('media/logo.png') " alt="Buildilume logo">
            <span>Buildilume</span>
        </a>

        <ul class="lp-nav-links" id="lp-nav-links">
            <li><a href=" @route('features') " <?php if (($activeNav ?? '') === 'features') echo 'class="is-active"'; ?>>Features</a></li>
            <li><a href=" @route('how_it_works') " <?php if (($activeNav ?? '') === 'how_it_works') echo 'class="is-active"'; ?>>Experience</a></li>
            <li><a href=" @route('pricing') " <?php if (($activeNav ?? '') === 'pricing') echo 'class="is-active"'; ?>>Pricing</a></li>
            <li><a href=" @route('about') " <?php if (($activeNav ?? '') === 'about') echo 'class="is-active"'; ?>>About</a></li>
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
