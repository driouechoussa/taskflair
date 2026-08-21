<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Simple, fair pricing for Buildilume's website builder — start free, upgrade when your site grows. No hidden fees, cancel anytime.">
    <title>
        @site_name('Pricing — Buildilume')
    </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href=" @get_static('media/favicon.ico') " type="image/x-icon">
    <link rel="stylesheet" href=" @get_static('style.css') ">
    <link rel="stylesheet" href=" @get_static('landing.css') ">
    <link rel="stylesheet" href=" @get_static('pricing.css') ">
</head>
<body class="lp-body">

    <div class="lp-panel lp-hero-panel">
        <div class="lp-hero-glow" aria-hidden="true"></div>

        <?php $activeNav = 'pricing'; ?>
        @insert('components/nav/navigation')

        <section class="lp-hero pricing-hero">
            <div class="lp-container lp-hero-content">
                <span class="lp-badge lp-reveal">
                    <span class="lp-badge-dot"></span>
                    Simple Pricing
                </span>

                <h1 class="lp-hero-title lp-reveal">
                    <span class="lp-hero-title-line">PRICING,</span>
                    <span class="lp-hero-title-line">SIMPLIFIED.</span>
                </h1>

                <p class="lp-hero-sub lp-reveal">Start free, upgrade when your team grows. No hidden fees, no surprise charges — cancel anytime.</p>
            </div>
        </section>
    </div>

    <main>
        <section class="lp-section pricing-plans-section">
            <div class="lp-container">
                <div class="pricing-toggle lp-reveal" id="pricing-toggle">
                    <span class="pricing-toggle-label is-active" data-billing="monthly">Monthly</span>
                    <button type="button" class="pricing-toggle-switch" id="pricing-toggle-switch" role="switch" aria-checked="false" aria-label="Toggle yearly billing">
                        <span class="pricing-toggle-thumb"></span>
                    </button>
                    <span class="pricing-toggle-label" data-billing="yearly">Yearly <span class="pricing-toggle-save">Save 20%</span></span>
                </div>

                <div class="pricing-grid">
                    <div class="pricing-card lp-reveal">
                        <div class="pricing-card-header">
                            <h3>Free</h3>
                            <p>For individuals building their first site.</p>
                        </div>
                        <div class="pricing-price">
                            <span class="pricing-price-amount" data-monthly="0" data-yearly="0">$0</span>
                            <span class="pricing-price-period">/mo</span>
                        </div>
                        <p class="pricing-price-note">Free forever</p>
                        <a class="lp-btn lp-btn-outline-dark pricing-cta" href=" @route('dashboard') ">Start For Free</a>
                        <ul class="pricing-features">
                            <li><i class="fas fa-check"></i> Up to 3 pages</li>
                            <li><i class="fas fa-check"></i> Unlimited widgets</li>
                            <li><i class="fas fa-check"></i> Custom themes &amp; scheduling</li>
                            <li><i class="fas fa-check"></i> Light &amp; dark mode</li>
                        </ul>
                    </div>

                    <div class="pricing-card pricing-card-featured lp-reveal">
                        <span class="pricing-badge">Most Popular</span>
                        <div class="pricing-card-header">
                            <h3>Pro</h3>
                            <p>For growing teams that need more.</p>
                        </div>
                        <div class="pricing-price">
                            <span class="pricing-price-amount" data-monthly="9" data-yearly="7">$9</span>
                            <span class="pricing-price-period">/mo</span>
                        </div>
                        <p class="pricing-price-note" data-monthly-note="Billed monthly" data-yearly-note="Billed yearly at $84">Billed monthly</p>
                        <a class="lp-btn lp-btn-lime pricing-cta" href=" @route('dashboard') ">Start Free Trial</a>
                        <ul class="pricing-features">
                            <li><i class="fas fa-check"></i> Everything in Free</li>
                            <li><i class="fas fa-check"></i> Unlimited pages</li>
                            <li><i class="fas fa-check"></i> Site templates</li>
                            <li><i class="fas fa-check"></i> Automation rules</li>
                            <li><i class="fas fa-check"></i> Advanced search &amp; filters</li>
                        </ul>
                    </div>

                    <div class="pricing-card lp-reveal">
                        <div class="pricing-card-header">
                            <h3>Business</h3>
                            <p>For organizations that need control.</p>
                        </div>
                        <div class="pricing-price">
                            <span class="pricing-price-amount" data-monthly="19" data-yearly="15">$19</span>
                            <span class="pricing-price-period">/mo</span>
                        </div>
                        <p class="pricing-price-note" data-monthly-note="Billed monthly" data-yearly-note="Billed yearly at $180">Billed monthly</p>
                        <a class="lp-btn lp-btn-outline-dark pricing-cta" href=" @route('dashboard') ">Start Free Trial</a>
                        <ul class="pricing-features">
                            <li><i class="fas fa-check"></i> Everything in Pro</li>
                            <li><i class="fas fa-check"></i> Traffic reports &amp; analytics</li>
                            <li><i class="fas fa-check"></i> Admin roles &amp; permissions</li>
                            <li><i class="fas fa-check"></i> Priority support</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="lp-section pricing-compare-section">
            <div class="lp-container">
                <div class="lp-section-header">
                    <span class="lp-eyebrow">Compare Plans</span>
                    <h2>Every Detail,<br>Side by Side</h2>
                </div>

                <div class="pricing-compare-wrap">
                    <table class="pricing-compare">
                        <thead>
                            <tr>
                                <th class="pricing-compare-feature-col">Feature</th>
                                <th>Free</th>
                                <th class="pricing-compare-featured-col">Pro</th>
                                <th>Business</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="pricing-compare-feature-col">Pages</td>
                                <td>Up to 3</td>
                                <td class="pricing-compare-featured-col">Unlimited</td>
                                <td>Unlimited</td>
                            </tr>
                            <tr>
                                <td class="pricing-compare-feature-col">Site templates</td>
                                <td><i class="fas fa-minus"></i></td>
                                <td class="pricing-compare-featured-col"><i class="fas fa-check"></i></td>
                                <td><i class="fas fa-check"></i></td>
                            </tr>
                            <tr>
                                <td class="pricing-compare-feature-col">Automation rules</td>
                                <td><i class="fas fa-minus"></i></td>
                                <td class="pricing-compare-featured-col"><i class="fas fa-check"></i></td>
                                <td><i class="fas fa-check"></i></td>
                            </tr>
                            <tr>
                                <td class="pricing-compare-feature-col">Traffic analytics</td>
                                <td><i class="fas fa-minus"></i></td>
                                <td class="pricing-compare-featured-col"><i class="fas fa-minus"></i></td>
                                <td><i class="fas fa-check"></i></td>
                            </tr>
                            <tr>
                                <td class="pricing-compare-feature-col">Admin roles &amp; permissions</td>
                                <td><i class="fas fa-minus"></i></td>
                                <td class="pricing-compare-featured-col"><i class="fas fa-minus"></i></td>
                                <td><i class="fas fa-check"></i></td>
                            </tr>
                            <tr>
                                <td class="pricing-compare-feature-col">Support</td>
                                <td>Community</td>
                                <td class="pricing-compare-featured-col">Priority</td>
                                <td>Priority + SLA</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <section class="lp-section pricing-faq-section">
            <div class="lp-container">
                <div class="lp-section-header">
                    <span class="lp-eyebrow">FAQ</span>
                    <h2>Questions About<br>Pricing</h2>
                </div>

                <div class="pricing-faq">
                    <div class="faq-item lp-reveal">
                        <button type="button" class="faq-question">
                            Can I switch plans later?
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <div class="faq-answer">
                            <p>Yes — upgrade or downgrade anytime from your account settings. Changes apply immediately and we prorate the difference.</p>
                        </div>
                    </div>
                    <div class="faq-item lp-reveal">
                        <button type="button" class="faq-question">
                            Is there a discount for annual billing?
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <div class="faq-answer">
                            <p>Yes — switch to yearly billing with the toggle above and save 20% compared to paying monthly.</p>
                        </div>
                    </div>
                    <div class="faq-item lp-reveal">
                        <button type="button" class="faq-question">
                            What happens after my free trial ends?
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <div class="faq-answer">
                            <p>You'll automatically drop to the Free plan — no surprise charges. You can upgrade again whenever you're ready.</p>
                        </div>
                    </div>
                    <div class="faq-item lp-reveal">
                        <button type="button" class="faq-question">
                            Do you offer a student or nonprofit discount?
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <div class="faq-answer">
                            <p>Yes — reach out to our support team with proof of status and we'll get you set up with a discounted plan.</p>
                        </div>
                    </div>
                    <div class="faq-item lp-reveal">
                        <button type="button" class="faq-question">
                            Can I cancel anytime?
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <div class="faq-answer">
                            <p>Absolutely — cancel from your account settings whenever you like. You'll keep access until the end of your billing period.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="lp-section lp-cta-section">
            <div class="lp-container lp-cta-inner lp-reveal">
                <h2>Ready to Bring Your<br>Site to Life?</h2>
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
    <script src=" @get_static('pricing.js') "></script>
</body>
</html>
