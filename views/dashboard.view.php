<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @site_name('Dashboard — Buildilume')
    </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href=" @get_static('media/favicon.ico') " type="image/x-icon">
    <link rel="stylesheet" href=" @get_static('style.css') ">
    <link rel="stylesheet" href=" @get_static('landing.css') ">
    <link rel="stylesheet" href=" @get_static('dashboard.css') ">
</head>
<body class="lp-body db-body">

    <div class="db-shell">
        <aside class="db-sidebar">
            <a class="lp-logo db-logo" href=" @route('home') ">
                <img src=" @get_static('media/logo.png') " alt="Buildilume logo">
                <span>Buildilume</span>
            </a>

            <button type="button" class="db-new-page-btn" id="sidebar-new-page-btn">
                <i class="fas fa-sliders"></i> Customize
            </button>

            <nav class="sidebar-menu" id="cms-nav">
                <button type="button" data-panel="overview" class="active"><i class="fas fa-gauge-high"></i> <span>Overview</span></button>
                <button type="button" data-panel="pages"><i class="fas fa-file-lines"></i> <span>Pages</span></button>
                <button type="button" data-panel="widgets"><i class="fas fa-shapes"></i> <span>Widgets</span></button>
                <button type="button" data-panel="content"><i class="fas fa-photo-film"></i> <span>Content</span></button>
                <button type="button" data-panel="themes"><i class="fas fa-palette"></i> <span>Themes</span></button>
                <button type="button" data-panel="css"><i class="fas fa-code"></i> <span>CSS</span></button>
            </nav>

            <div class="db-sidebar-foot">
                <label class="db-theme-switch">
                    <input type="checkbox" id="theme-switch">
                    <span class="db-theme-track">
                        <i class="fas fa-sun"></i>
                        <i class="fas fa-moon"></i>
                        <span class="db-theme-thumb"></span>
                    </span>
                    <span>Dark Mode</span>
                </label>
                <a href=" @route('home') " class="db-back-home"><i class="fas fa-arrow-left"></i> Back to Site</a>
            </div>
        </aside>

        <main class="db-main">
            <header class="db-topbar">
                <div class="db-search">
                    <i class="fas fa-magnifying-glass"></i>
                    <input type="text" id="dashboard-search" placeholder="Search pages, widgets, content...">
                </div>
                <span class="db-topbar-hint" id="topbar-hint"></span>
            </header>

            <div class="db-content">

                <!-- Overview -->
                <section class="db-panel active" data-panel="overview">
                    <div class="db-panel-head">
                        <h1>Overview</h1>
                        <p>Here's what's happening with your site.</p>
                    </div>

                    <div class="db-stats-grid">
                        <div class="db-stat-card">
                            <span class="db-stat-icon"><i class="fas fa-file-lines"></i></span>
                            <span class="db-stat-value" id="stat-pages">0</span>
                            <span class="db-stat-name">Pages</span>
                        </div>
                        <div class="db-stat-card">
                            <span class="db-stat-icon"><i class="fas fa-shapes"></i></span>
                            <span class="db-stat-value" id="stat-widgets">0</span>
                            <span class="db-stat-name">Widgets</span>
                        </div>
                        <div class="db-stat-card">
                            <span class="db-stat-icon"><i class="fas fa-floppy-disk"></i></span>
                            <span class="db-stat-value" id="stat-saves">0</span>
                            <span class="db-stat-name">Saves</span>
                        </div>
                        <div class="db-stat-card">
                            <span class="db-stat-icon"><i class="fas fa-arrow-pointer"></i></span>
                            <span class="db-stat-value" id="stat-clicks">0</span>
                            <span class="db-stat-name">Clicks</span>
                        </div>
                    </div>

                    <div class="db-overview-grid">
                        <div class="db-card db-history-card">
                            <div class="db-card-head"><h2>Last Edits</h2></div>
                            <ul class="db-history-list" id="history-list"></ul>
                        </div>

                        <div class="db-card db-quick-actions-card">
                            <div class="db-card-head"><h2>Quick Actions</h2></div>
                            <div class="db-quick-actions">
                                <button type="button" class="db-quick-action" data-open="page"><i class="fas fa-file-circle-plus"></i> New Page</button>
                                <button type="button" class="db-quick-action" data-open="widget"><i class="fas fa-square-plus"></i> New Widget</button>
                                <button type="button" class="db-quick-action" data-open="content"><i class="fas fa-upload"></i> Add Content</button>
                                <button type="button" class="db-quick-action" data-goto="css"><i class="fas fa-code"></i> Edit CSS</button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Pages -->
                <section class="db-panel" data-panel="pages">
                    <div class="db-panel-head">
                        <div>
                            <h1>Pages</h1>
                            <p>Create and manage the pages on your site.</p>
                        </div>
                        <button type="button" class="lp-btn lp-btn-lime lp-btn-sm" id="add-page-btn"><i class="fas fa-plus"></i> New Page</button>
                    </div>
                    <div class="db-list" id="pages-list"></div>
                </section>

                <!-- Widgets -->
                <section class="db-panel" data-panel="widgets">
                    <div class="db-panel-head">
                        <div>
                            <h1>Widgets</h1>
                            <p>Reusable blocks you can drop onto any page.</p>
                        </div>
                        <button type="button" class="lp-btn lp-btn-lime lp-btn-sm" id="add-widget-btn"><i class="fas fa-plus"></i> New Widget</button>
                    </div>
                    <div class="db-widget-grid" id="widgets-grid"></div>
                </section>

                <!-- Content -->
                <section class="db-panel" data-panel="content">
                    <div class="db-panel-head">
                        <div>
                            <h1>Content</h1>
                            <p>Media and files available to use across your pages.</p>
                        </div>
                        <button type="button" class="lp-btn lp-btn-lime lp-btn-sm" id="add-content-btn"><i class="fas fa-plus"></i> Add Content</button>
                    </div>
                    <div class="db-list" id="content-list"></div>
                </section>

                <!-- Themes -->
                <section class="db-panel" data-panel="themes">
                    <div class="db-panel-head">
                        <div>
                            <h1>Themes</h1>
                            <p>Pick an accent color for your dashboard.</p>
                        </div>
                    </div>
                    <div class="db-theme-grid" id="theme-grid"></div>
                </section>

                <!-- CSS -->
                <section class="db-panel" data-panel="css">
                    <div class="db-panel-head">
                        <div>
                            <h1>Custom CSS</h1>
                            <p>Write CSS overrides and preview them live below. Preview only — publishing to the live site needs the backend, which isn't wired up yet.</p>
                        </div>
                    </div>

                    <div class="db-css-editor-wrap">
                        <textarea id="custom-css-input" placeholder=".sample-btn { border-radius: 4px !important; }" spellcheck="false"></textarea>
                        <button type="button" class="lp-btn lp-btn-lime lp-btn-sm" id="save-css-btn"><i class="fas fa-floppy-disk"></i> Save &amp; Preview</button>
                    </div>

                    <div class="db-css-preview" id="css-preview-sandbox">
                        <span class="db-css-preview-label">Live Preview</span>
                        <button type="button" class="lp-btn lp-btn-lime sample-btn">Sample Button</button>
                        <button type="button" class="lp-btn lp-btn-outline-dark sample-btn">Secondary Button</button>
                        <span class="db-css-preview-card sample-card">Sample card text</span>
                    </div>
                </section>

            </div>
        </main>
    </div>

    <!-- Page modal -->
    <div class="modal" id="page-modal">
        <div class="modal-content">
            <button type="button" class="close-btn" aria-label="Close"><i class="fas fa-xmark"></i></button>
            <h2 id="page-modal-title">New Page</h2>
            <form id="page-form">
                <input type="hidden" id="page-id">
                <div class="form-group">
                    <label for="page-title">Title</label>
                    <input type="text" id="page-title" placeholder="e.g. Contact Us" required>
                </div>
                <div class="form-group">
                    <label for="page-slug">Slug</label>
                    <input type="text" id="page-slug" placeholder="/contact-us">
                </div>
                <div class="form-group">
                    <label for="page-status">Status</label>
                    <select id="page-status">
                        <option value="draft">Draft</option>
                        <option value="published">Published</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="page-content">Content</label>
                    <textarea id="page-content" rows="3" placeholder="Short summary or body content..."></textarea>
                </div>
                <button type="submit" class="submit-btn lp-btn lp-btn-lime lp-btn-lg">Save Page</button>
            </form>
        </div>
    </div>

    <!-- Widget modal -->
    <div class="modal" id="widget-modal">
        <div class="modal-content">
            <button type="button" class="close-btn" aria-label="Close"><i class="fas fa-xmark"></i></button>
            <h2>New Widget</h2>
            <form id="widget-form">
                <div class="form-group">
                    <label for="widget-name">Name</label>
                    <input type="text" id="widget-name" placeholder="e.g. Newsletter Signup" required>
                </div>
                <div class="form-group">
                    <label for="widget-type">Type</label>
                    <select id="widget-type">
                        <option value="Layout">Layout</option>
                        <option value="Content">Content</option>
                        <option value="Form">Form</option>
                        <option value="Media">Media</option>
                        <option value="Navigation">Navigation</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="widget-description">Description</label>
                    <textarea id="widget-description" rows="3" placeholder="What does this widget do?"></textarea>
                </div>
                <button type="submit" class="submit-btn lp-btn lp-btn-lime lp-btn-lg">Save Widget</button>
            </form>
        </div>
    </div>

    <!-- Content modal -->
    <div class="modal" id="content-modal">
        <div class="modal-content">
            <button type="button" class="close-btn" aria-label="Close"><i class="fas fa-xmark"></i></button>
            <h2>Add Content</h2>
            <form id="content-form">
                <div class="form-group">
                    <label for="content-name">Name</label>
                    <input type="text" id="content-name" placeholder="e.g. hero-banner.jpg" required>
                </div>
                <div class="form-group">
                    <label for="content-type">Type</label>
                    <select id="content-type">
                        <option value="Image">Image</option>
                        <option value="Document">Document</option>
                        <option value="Video">Video</option>
                        <option value="Snippet">Text Snippet</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="content-notes">Notes</label>
                    <textarea id="content-notes" rows="3" placeholder="Optional notes..."></textarea>
                </div>
                <button type="submit" class="submit-btn lp-btn lp-btn-lime lp-btn-lg">Save Content</button>
            </form>
        </div>
    </div>

    <script src=" @get_static('dashboard.js') "></script>
</body>
</html>
