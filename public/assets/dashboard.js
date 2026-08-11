document.addEventListener('DOMContentLoaded', function () {
    // ---------- Storage helpers ----------
    function load(key, fallback) {
        try {
            const raw = localStorage.getItem(key);
            return raw ? JSON.parse(raw) : fallback;
        } catch (e) {
            return fallback;
        }
    }
    function save(key, value) {
        localStorage.setItem(key, JSON.stringify(value));
    }
    function generateId() {
        return Date.now().toString(36) + Math.random().toString(36).substr(2);
    }
    function escapeHtml(value) {
        const div = document.createElement('div');
        div.textContent = value == null ? '' : value;
        return div.innerHTML;
    }
    function slugify(value) {
        const slug = value.toLowerCase().trim()
            .replace(/[^a-z0-9\s-]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-')
            .replace(/^-|-$/g, '');
        return '/' + slug;
    }
    function daysAgo(n) {
        const d = new Date();
        d.setDate(d.getDate() - n);
        return d.toISOString();
    }
    function timeAgo(iso) {
        const diffMs = Date.now() - new Date(iso).getTime();
        const mins = Math.round(diffMs / 60000);
        if (mins < 1) return 'Just now';
        if (mins < 60) return mins + 'm ago';
        const hours = Math.round(mins / 60);
        if (hours < 24) return hours + 'h ago';
        const days = Math.round(hours / 24);
        if (days < 30) return days + 'd ago';
        return new Date(iso).toLocaleDateString(undefined, { month: 'short', day: 'numeric', year: 'numeric' });
    }

    const THEMES = [
        { id: 'lime', name: 'Lime Classic', color: '#d7f24a', ink: '#0b0d09' },
        { id: 'ocean', name: 'Ocean Blue', color: '#4ea8de', ink: '#0b1220' },
        { id: 'coral', name: 'Sunset Coral', color: '#ff6b5c', ink: '#1a0a08' },
        { id: 'violet', name: 'Violet Dusk', color: '#8a5cf6', ink: '#f5f2ff' },
        { id: 'amber', name: 'Golden Amber', color: '#f0a83c', ink: '#1a1206' },
        { id: 'forest', name: 'Forest Green', color: '#3fae5a', ink: '#eafbee' }
    ];

    const WIDGET_ICONS = {
        Layout: 'fa-table-cells-large',
        Content: 'fa-align-left',
        Form: 'fa-square-check',
        Media: 'fa-photo-film',
        Navigation: 'fa-bars'
    };

    const CONTENT_ICONS = {
        Image: 'fa-image',
        Document: 'fa-file-lines',
        Video: 'fa-film',
        Snippet: 'fa-code'
    };

    // ---------- Seed data (first load only) ----------
    function seedIfEmpty() {
        if (localStorage.getItem('cms_seeded')) return;

        save('cms_pages', [
            { id: generateId(), title: 'Home', slug: '/', status: 'published', content: 'The main landing page.', createdAt: daysAgo(30) },
            { id: generateId(), title: 'Features', slug: '/features', status: 'published', content: 'Everything Buildilume ships with.', createdAt: daysAgo(21) },
            { id: generateId(), title: 'Pricing', slug: '/pricing', status: 'published', content: 'Plans and billing.', createdAt: daysAgo(14) },
            { id: generateId(), title: 'About', slug: '/about', status: 'published', content: 'Our story and values.', createdAt: daysAgo(9) },
            { id: generateId(), title: 'Sign Up', slug: '/signup', status: 'published', content: 'Create a new account.', createdAt: daysAgo(4) },
            { id: generateId(), title: 'Roadmap', slug: '/roadmap', status: 'draft', content: "What's coming next.", createdAt: daysAgo(1) }
        ]);

        save('cms_widgets', [
            { id: generateId(), name: 'Hero Banner', type: 'Layout', description: 'Big headline and CTA section for the top of a page.', createdAt: daysAgo(30) },
            { id: generateId(), name: 'Feature Grid', type: 'Content', description: 'Icon, title and description cards in a grid.', createdAt: daysAgo(25) },
            { id: generateId(), name: 'Pricing Table', type: 'Content', description: 'Side-by-side plan comparison with a billing toggle.', createdAt: daysAgo(18) },
            { id: generateId(), name: 'Testimonial Slider', type: 'Content', description: 'Rotating customer quotes.', createdAt: daysAgo(12) },
            { id: generateId(), name: 'Contact Form', type: 'Form', description: 'Name, email and message fields with validation.', createdAt: daysAgo(6) },
            { id: generateId(), name: 'Footer Links', type: 'Navigation', description: 'Column of links shown in the site footer.', createdAt: daysAgo(2) }
        ]);

        save('cms_content', [
            { id: generateId(), name: 'logo.png', type: 'Image', notes: 'Primary brand logo.', createdAt: daysAgo(30) },
            { id: generateId(), name: 'favicon.ico', type: 'Image', notes: 'Browser tab icon.', createdAt: daysAgo(30) },
            { id: generateId(), name: 'hero-copy.txt', type: 'Snippet', notes: 'Draft copy for the homepage hero.', createdAt: daysAgo(5) }
        ]);

        save('cms_history', [
            { text: 'Site created', at: daysAgo(30) },
            { text: "Published page 'Home'", at: daysAgo(30) },
            { text: "Published page 'Pricing'", at: daysAgo(14) },
            { text: "Added widget 'Contact Form'", at: daysAgo(6) },
            { text: "Saved draft page 'Roadmap'", at: daysAgo(1) }
        ]);

        save('cms_saves', 5);
        save('cms_clicks', 0);
        localStorage.setItem('cms_theme', 'lime');
        localStorage.setItem('cms_seeded', '1');
    }

    seedIfEmpty();

    // ---------- State ----------
    let pages = load('cms_pages', []);
    let widgets = load('cms_widgets', []);
    let contentItems = load('cms_content', []);
    let history = load('cms_history', []);
    let totalSaves = load('cms_saves', 0);
    let totalClicks = load('cms_clicks', 0);
    let currentTheme = localStorage.getItem('cms_theme') || 'lime';

    // ---------- DOM refs ----------
    const themeSwitch = document.getElementById('theme-switch');
    const navButtons = document.querySelectorAll('#cms-nav button');
    const panels = document.querySelectorAll('.db-panel');
    const searchInput = document.getElementById('dashboard-search');
    const topbarHint = document.getElementById('topbar-hint');

    const pageModal = document.getElementById('page-modal');
    const widgetModal = document.getElementById('widget-modal');
    const contentModal = document.getElementById('content-modal');
    const pageForm = document.getElementById('page-form');
    const widgetForm = document.getElementById('widget-form');
    const contentForm = document.getElementById('content-form');

    init();

    function init() {
        const savedTheme = localStorage.getItem('theme') || 'light';
        setLightDark(savedTheme);
        themeSwitch.checked = savedTheme === 'dark';

        applyAccentTheme(currentTheme, false);

        setupNav();
        setupModals();
        setupForms();
        setupQuickActions();
        setupCssPanel();
        setupClickTracking();
        setupSearch();

        goToPanel('overview');
    }

    function setLightDark(theme) {
        document.documentElement.setAttribute('data-theme', theme);
        localStorage.setItem('theme', theme);
    }

    // ---------- Navigation ----------
    function setupNav() {
        navButtons.forEach(btn => {
            btn.addEventListener('click', () => goToPanel(btn.getAttribute('data-panel')));
        });

        document.getElementById('sidebar-new-page-btn').addEventListener('click', () => openPageModal());

        themeSwitch.addEventListener('change', function () {
            setLightDark(this.checked ? 'dark' : 'light');
        });
    }

    function goToPanel(panel) {
        navButtons.forEach(btn => btn.classList.toggle('active', btn.getAttribute('data-panel') === panel));
        panels.forEach(p => p.classList.toggle('active', p.getAttribute('data-panel') === panel));

        const searchable = panel === 'pages' || panel === 'widgets' || panel === 'content';
        searchInput.closest('.db-search').style.display = searchable ? 'flex' : 'none';
        searchInput.value = '';

        topbarHint.textContent = panel === 'themes' ? 'Changes apply instantly to your dashboard.' : '';

        renderAll();
    }

    // ---------- Search ----------
    function setupSearch() {
        searchInput.addEventListener('input', renderAll);
    }

    function getSearchQuery() {
        return searchInput.value.trim().toLowerCase();
    }

    // ---------- History / stats ----------
    function pushHistory(text) {
        history.unshift({ text, at: new Date().toISOString() });
        history = history.slice(0, 20);
        save('cms_history', history);

        totalSaves += 1;
        save('cms_saves', totalSaves);

        renderHistory();
        renderStats();
    }

    function renderStats() {
        document.getElementById('stat-pages').textContent = pages.length;
        document.getElementById('stat-widgets').textContent = widgets.length;
        document.getElementById('stat-saves').textContent = totalSaves;
        document.getElementById('stat-clicks').textContent = totalClicks;
    }

    function renderHistory() {
        const list = document.getElementById('history-list');
        if (!history.length) {
            list.innerHTML = '<li>No activity yet.</li>';
            return;
        }
        list.innerHTML = history.map(entry => `
            <li>
                <span class="db-history-dot"></span>
                <span>
                    ${escapeHtml(entry.text)}
                    <span class="db-history-time">${timeAgo(entry.at)}</span>
                </span>
            </li>
        `).join('');
    }

    // ---------- Click tracking ----------
    function setupClickTracking() {
        document.querySelector('.db-shell').addEventListener('click', function () {
            totalClicks += 1;
            save('cms_clicks', totalClicks);
            const el = document.getElementById('stat-clicks');
            if (el) el.textContent = totalClicks;
        });
    }

    // ---------- Quick actions ----------
    function setupQuickActions() {
        document.querySelectorAll('.db-quick-action').forEach(btn => {
            btn.addEventListener('click', function () {
                const open = this.getAttribute('data-open');
                const goTo = this.getAttribute('data-goto');
                if (open === 'page') openPageModal();
                if (open === 'widget') openWidgetModal();
                if (open === 'content') openContentModal();
                if (goTo) goToPanel(goTo);
            });
        });
    }

    // ---------- Modals ----------
    function setupModals() {
        document.querySelectorAll('.close-btn').forEach(btn => {
            btn.addEventListener('click', function () {
                this.closest('.modal').style.display = 'none';
            });
        });

        window.addEventListener('click', function (e) {
            if (e.target.classList.contains('modal')) e.target.style.display = 'none';
        });

        document.getElementById('add-page-btn').addEventListener('click', () => openPageModal());
        document.getElementById('add-widget-btn').addEventListener('click', () => openWidgetModal());
        document.getElementById('add-content-btn').addEventListener('click', () => openContentModal());

        document.getElementById('page-title').addEventListener('input', function () {
            const idInput = document.getElementById('page-id');
            const slugInput = document.getElementById('page-slug');
            if (!idInput.value && this.value) {
                slugInput.value = slugify(this.value);
            }
        });
    }

    function openPageModal(page = null) {
        pageForm.reset();
        const idInput = document.getElementById('page-id');
        const titleEl = document.getElementById('page-modal-title');
        if (page) {
            titleEl.textContent = 'Edit Page';
            idInput.value = page.id;
            document.getElementById('page-title').value = page.title;
            document.getElementById('page-slug').value = page.slug;
            document.getElementById('page-status').value = page.status;
            document.getElementById('page-content').value = page.content || '';
        } else {
            titleEl.textContent = 'New Page';
            idInput.value = '';
        }
        pageModal.style.display = 'flex';
    }

    function openWidgetModal() {
        widgetForm.reset();
        widgetModal.style.display = 'flex';
    }

    function openContentModal() {
        contentForm.reset();
        contentModal.style.display = 'flex';
    }

    // ---------- Forms ----------
    function setupForms() {
        pageForm.addEventListener('submit', function (e) {
            e.preventDefault();
            const id = document.getElementById('page-id').value;
            const title = document.getElementById('page-title').value.trim();
            let slug = document.getElementById('page-slug').value.trim();
            const status = document.getElementById('page-status').value;
            const content = document.getElementById('page-content').value.trim();

            if (!title) { alert('Page title is required!'); return; }
            if (!slug) slug = slugify(title);
            if (!slug.startsWith('/')) slug = '/' + slug;

            if (id) {
                const existing = pages.find(p => p.id === id);
                if (existing) {
                    Object.assign(existing, { title, slug, status, content, updatedAt: new Date().toISOString() });
                    pushHistory(`Updated page '${title}'`);
                }
            } else {
                pages.push({ id: generateId(), title, slug, status, content, createdAt: new Date().toISOString() });
                pushHistory(`Created page '${title}'`);
            }

            save('cms_pages', pages);
            renderPages();
            renderStats();
            pageModal.style.display = 'none';
        });

        widgetForm.addEventListener('submit', function (e) {
            e.preventDefault();
            const name = document.getElementById('widget-name').value.trim();
            const type = document.getElementById('widget-type').value;
            const description = document.getElementById('widget-description').value.trim();

            if (!name) { alert('Widget name is required!'); return; }

            widgets.push({ id: generateId(), name, type, description, createdAt: new Date().toISOString() });
            save('cms_widgets', widgets);
            pushHistory(`Added widget '${name}'`);
            renderWidgets();
            renderStats();
            widgetModal.style.display = 'none';
        });

        contentForm.addEventListener('submit', function (e) {
            e.preventDefault();
            const name = document.getElementById('content-name').value.trim();
            const type = document.getElementById('content-type').value;
            const notes = document.getElementById('content-notes').value.trim();

            if (!name) { alert('Content name is required!'); return; }

            contentItems.push({ id: generateId(), name, type, notes, createdAt: new Date().toISOString() });
            save('cms_content', contentItems);
            pushHistory(`Added content '${name}'`);
            renderContent();
            contentModal.style.display = 'none';
        });
    }

    // ---------- Renderers ----------
    function renderAll() {
        renderStats();
        renderHistory();
        renderPages();
        renderWidgets();
        renderContent();
        renderThemes();
    }

    function renderPages() {
        const list = document.getElementById('pages-list');
        const q = getSearchQuery();
        const filtered = pages.filter(p => !q || p.title.toLowerCase().includes(q) || p.slug.toLowerCase().includes(q));

        if (!filtered.length) {
            list.innerHTML = `<div class="db-empty-state"><i class="fas fa-file-lines"></i><p>${pages.length ? 'No pages match your search.' : 'No pages yet — create your first page.'}</p></div>`;
            return;
        }

        list.innerHTML = filtered
            .slice()
            .sort((a, b) => new Date(b.updatedAt || b.createdAt) - new Date(a.updatedAt || a.createdAt))
            .map(page => `
                <div class="db-list-item" data-id="${page.id}">
                    <span class="db-list-item-icon"><i class="fas fa-file-lines"></i></span>
                    <div class="db-list-item-body">
                        <div class="db-list-item-title">
                            ${escapeHtml(page.title)}
                            <span class="db-badge ${page.status === 'published' ? 'is-published' : ''}">${escapeHtml(page.status)}</span>
                        </div>
                        <div class="db-list-item-meta">
                            <span>${escapeHtml(page.slug)}</span>
                            <span>Updated ${timeAgo(page.updatedAt || page.createdAt)}</span>
                        </div>
                    </div>
                    <div class="db-list-item-actions">
                        <button class="db-item-action-btn edit-page" data-id="${page.id}" aria-label="Edit page"><i class="fas fa-pen"></i></button>
                        <button class="db-item-action-btn delete delete-page" data-id="${page.id}" aria-label="Delete page"><i class="fas fa-trash"></i></button>
                    </div>
                </div>
            `).join('');

        list.querySelectorAll('.edit-page').forEach(btn => {
            btn.addEventListener('click', function () {
                const page = pages.find(p => p.id === this.getAttribute('data-id'));
                if (page) openPageModal(page);
            });
        });

        list.querySelectorAll('.delete-page').forEach(btn => {
            btn.addEventListener('click', function () {
                const id = this.getAttribute('data-id');
                const page = pages.find(p => p.id === id);
                if (page && confirm(`Delete page '${page.title}'?`)) {
                    pages = pages.filter(p => p.id !== id);
                    save('cms_pages', pages);
                    pushHistory(`Deleted page '${page.title}'`);
                    renderPages();
                    renderStats();
                }
            });
        });
    }

    function renderWidgets() {
        const grid = document.getElementById('widgets-grid');
        const q = getSearchQuery();
        const filtered = widgets.filter(w => !q || w.name.toLowerCase().includes(q) || w.type.toLowerCase().includes(q));

        if (!filtered.length) {
            grid.innerHTML = `<div class="db-empty-state"><i class="fas fa-shapes"></i><p>${widgets.length ? 'No widgets match your search.' : 'No widgets yet — add your first one.'}</p></div>`;
            return;
        }

        grid.innerHTML = filtered.map(widget => `
            <div class="db-widget-card" data-id="${widget.id}">
                <div class="db-widget-card-head">
                    <span class="db-widget-icon"><i class="fas ${WIDGET_ICONS[widget.type] || 'fa-shapes'}"></i></span>
                    <span class="db-badge">${escapeHtml(widget.type)}</span>
                </div>
                <h3>${escapeHtml(widget.name)}</h3>
                <p>${escapeHtml(widget.description || 'No description yet.')}</p>
                <div class="db-widget-card-foot">
                    <span class="db-history-time">Added ${timeAgo(widget.createdAt)}</span>
                    <button class="db-item-action-btn delete delete-widget" data-id="${widget.id}" aria-label="Delete widget"><i class="fas fa-trash"></i></button>
                </div>
            </div>
        `).join('');

        grid.querySelectorAll('.delete-widget').forEach(btn => {
            btn.addEventListener('click', function () {
                const id = this.getAttribute('data-id');
                const widget = widgets.find(w => w.id === id);
                if (widget && confirm(`Delete widget '${widget.name}'?`)) {
                    widgets = widgets.filter(w => w.id !== id);
                    save('cms_widgets', widgets);
                    pushHistory(`Deleted widget '${widget.name}'`);
                    renderWidgets();
                    renderStats();
                }
            });
        });
    }

    function renderContent() {
        const list = document.getElementById('content-list');
        const q = getSearchQuery();
        const filtered = contentItems.filter(c => !q || c.name.toLowerCase().includes(q) || c.type.toLowerCase().includes(q));

        if (!filtered.length) {
            list.innerHTML = `<div class="db-empty-state"><i class="fas fa-photo-film"></i><p>${contentItems.length ? 'No content matches your search.' : 'No content yet — add your first item.'}</p></div>`;
            return;
        }

        list.innerHTML = filtered.map(item => `
            <div class="db-list-item" data-id="${item.id}">
                <span class="db-list-item-icon"><i class="fas ${CONTENT_ICONS[item.type] || 'fa-file'}"></i></span>
                <div class="db-list-item-body">
                    <div class="db-list-item-title">
                        ${escapeHtml(item.name)}
                        <span class="db-badge">${escapeHtml(item.type)}</span>
                    </div>
                    <div class="db-list-item-meta">
                        <span>${escapeHtml(item.notes || 'No notes')}</span>
                        <span>Added ${timeAgo(item.createdAt)}</span>
                    </div>
                </div>
                <div class="db-list-item-actions">
                    <button class="db-item-action-btn delete delete-content" data-id="${item.id}" aria-label="Delete content"><i class="fas fa-trash"></i></button>
                </div>
            </div>
        `).join('');

        list.querySelectorAll('.delete-content').forEach(btn => {
            btn.addEventListener('click', function () {
                const id = this.getAttribute('data-id');
                const item = contentItems.find(c => c.id === id);
                if (item && confirm(`Delete '${item.name}'?`)) {
                    contentItems = contentItems.filter(c => c.id !== id);
                    save('cms_content', contentItems);
                    pushHistory(`Deleted content '${item.name}'`);
                    renderContent();
                }
            });
        });
    }

    function renderThemes() {
        const grid = document.getElementById('theme-grid');
        grid.innerHTML = THEMES.map(theme => `
            <div class="db-theme-card ${theme.id === currentTheme ? 'is-active' : ''}" data-id="${theme.id}" style="--db-theme-color: ${theme.color}">
                <span class="db-theme-swatch" style="background:${theme.color}"><i class="fas fa-check"></i></span>
                <h3>${escapeHtml(theme.name)}</h3>
                <span class="db-theme-status">${theme.id === currentTheme ? 'Active' : 'Activate'}</span>
            </div>
        `).join('');

        grid.querySelectorAll('.db-theme-card').forEach(card => {
            card.addEventListener('click', function () {
                const id = this.getAttribute('data-id');
                if (id === currentTheme) return;
                currentTheme = id;
                localStorage.setItem('cms_theme', id);
                applyAccentTheme(id, true);
                renderThemes();
            });
        });
    }

    function applyAccentTheme(id, logIt) {
        const theme = THEMES.find(t => t.id === id) || THEMES[0];
        document.body.style.setProperty('--db-accent', theme.color);
        document.body.style.setProperty('--db-accent-ink', theme.ink);
        if (logIt) pushHistory(`Switched theme to '${theme.name}'`);
    }

    // ---------- Custom CSS panel ----------
    function setupCssPanel() {
        const textarea = document.getElementById('custom-css-input');
        const saveBtn = document.getElementById('save-css-btn');
        let styleTag = document.getElementById('custom-css-output');
        if (!styleTag) {
            styleTag = document.createElement('style');
            styleTag.id = 'custom-css-output';
            document.head.appendChild(styleTag);
        }

        const savedCss = localStorage.getItem('cms_custom_css') || '';
        textarea.value = savedCss;
        styleTag.textContent = savedCss;

        saveBtn.addEventListener('click', function () {
            const css = textarea.value;
            styleTag.textContent = css;
            localStorage.setItem('cms_custom_css', css);
            pushHistory('Saved custom CSS');
        });
    }
});
