# Buildilume → CMS Builder: Implementation Plan (DRAFT — for review)

Status: **draft, not started.** Nothing in this plan has been implemented yet. This is the file you
asked to review before I touch any code. Everything below is grounded in the actual current code
(verified by reading it directly, not guessed from the Readme, which — see §1 — is inaccurate).

---

## 0. Open questions — please answer these before I start building

These change scope enough that I don't want to guess:

1. **What does "CMS builder" mean here?** Three real options, in increasing order of effort:
   - **(A) Simple CMS** — admin creates/edits fixed "Pages" (title, slug, body, published/draft), public
     site renders them by slug. This is what most people mean by "a CMS" in the WordPress-lite sense.
   - **(B) Block-based page builder** — admin assembles each page from reusable blocks (hero, text,
     image, CTA, etc.), reorders them, fills in each block's fields; page stored as structured
     data and rendered dynamically. This is what "builder" usually implies (closer to Webflow/Elementor).
   - **(C) Generic/headless CMS** — admin *defines custom content types* with custom fields (like
     WordPress custom post types or Strapi collections), then manages entries per type.
   
   **My recommendation: start with (A), design the database so it can grow into (B) later** (see §5).
   (C) is a much bigger undertaking (a schema-builder-for-schemas) — tell me if that's really what you need.

2. **Is the existing task-management feature staying, going, or merging in?** Today: `TaskService` /
   `MysqlTaskRepository` exist but are never called by any route (dead code), and the `/` page is a
   fully client-side, `localStorage`-only to-do app with zero connection to the PHP backend (see §1).
   Options: (a) rip it out and focus purely on the new CMS, (b) keep it as-is untouched, (c) properly
   wire it to the backend as one more admin-managed content type alongside Pages. Tell me which.

3. **Public registration, or admin-created accounts only?** A CMS admin panel usually has no public
   sign-up — accounts are created by an existing admin. Assuming **no public registration** unless
   you say otherwise (affects whether I build a `/register` route at all).

4. **Real database credentials.** No `.env` file exists in this repo, and I'm not going to invent a
   database and connect to something imaginary. I'll write `.env.example` with the correct variable
   names (matching what `database.php` actually reads — see §1's typo note) and you'll need to either
   give me real local MySQL credentials or confirm you'll set up the DB yourself from the migration
   files I write.

5. **File uploads / media library** — in scope for v1 (e.g., page featured images) or later? Affects
   Phase 4 scope in §6.

---

## 1. Current state — verified facts, not assumptions

Read directly (not summarized from the Readme, which is materially wrong — see below):

- **Framework**: hand-rolled custom PHP 8+ micro-framework (namespace `Buildilume\`), not Yii2/Laravel/
  Slim/anything recognized. One real dependency: `vlucas/phpdotenv` (declared but **not actually used**
  — the `env()` helper in `src/core/helpers.php` hand-parses `.env` itself). No ORM, no router package,
  no templating engine, no PSR-7/15. **`vendor/` is not installed** — the app cannot run until
  `composer install` is run.
- **Routing** (`src/Http/Route.php`, `src/Http/App.php`): exact static-string matching only —
  `Route::$routes[$method][$uri]`. **No route parameters/wildcards at all** (no `/pages/{slug}`
  support). No middleware/guard concept whatsoever. Only 3 routes exist total: `GET /` → `indexController`,
  `GET /home` → `homeController` (named `dashboard`, renders an almost-empty view), `GET /about`.
- **Views** (`src/core/viewCompiler.php`, `src/core/helpers.php`): a tiny regex-based preprocessor
  for `@directive(...)` calls (`@insert`, `@route`, `@get_static`, `@site_name`) — not Blade/Twig, no
  `@if`/`@foreach` block directives, no `{{ }}` auto-escaping syntax. **Critical gap**: `make_view()`
  accepts a `$context` array to pass data into a view, but the code that would `extract()` it into
  scope is commented out (`helpers.php` lines 19–24) — **there is currently no working mechanism to
  pass any dynamic data into any view.** Nothing CMS/admin/dashboard-shaped can render real data until
  this is fixed. This is Phase 0, item 1, non-negotiable.
- **Request** (`src/Http/Request.php`): reads `$_GET`/`$_POST`/raw JSON body, sanitizes with
  `FILTER_SANITIZE_SPECIAL_CHARS`. No session access, no cookies, no headers, no file uploads, no
  route-parameter access (there are no route parameters to access yet).
- **DI Container** (`src/core/Container.php`): genuinely solid — reflection-based constructor
  autowiring, works recursively. This part I'm keeping as-is, no changes needed.
- **Database** (`src/core/database.php`): PDO/MySQL, prepared statements via `query()`/`execute()`
  taking a `$params` array — **good, already SQL-injection-safe by construction**, just needs to stay
  that way in every new repository. Env vars it actually reads (note the existing typo, kept
  intentionally below so `.env.example` matches working code):
  `DATABASE_CONECTION` *(sic)*, `DATABASE_HOST`, `DATABASE_PORT`, `DATABASE_NAME`, `DATABASE_USERNAME`,
  `DATABASE_PASSWORD`. **No `.env` file, no migrations, no schema files exist anywhere in the repo.**
- **Auth**: none. Zero. No User model, no login route, no `session_start()` anywhere, no
  `password_hash` usage, no middleware to hook a guard into (have to build the guard mechanism too).
- **Admin/CMS**: none. The only "dashboard" is the route *name* `dashboard` on `/home`, rendering a
  near-empty view. No admin panel, no content management, no roles.
- **The Readme is aspirational and inaccurate** — describes a Node.js-style project structure, `npm run dev`,
  a `/api` REST layer, and `POST /api/auth/login`, none of which exist in the actual PHP code. Treat it
  as a statement of product intent only; I did not use it as a source of implementation truth.

---

## 2. Architecture decision: extend the existing framework, don't replace it

You didn't ask for a rewrite, and the existing pieces that *do* work (DI container, PDO wrapper with
prepared statements, the directive-based view compiler) are reasonable for this project's size. Pulling
in Laravel/Symfony wholesale would be a bigger, riskier change than what you asked for. Plan is to
**extend** the current framework with the specific missing pieces, in the same hand-rolled style:

| Gap | Fix |
|---|---|
| View context not passed | Un-comment/fix `helpers.php` + `viewCompiler::render()` to `extract()` the `$context` array before `require`-ing the compiled view |
| No route parameters | Extend `Route::setRoute()` to accept `{param}` placeholders, convert to a regex on registration, capture named params on match, expose via `Request` |
| No middleware | Add a `middleware(array $names)` method to the object `Route::setRoute()` returns (mirrors the existing `->name()` pattern), run registered middleware callables in `App::execute()` before dispatching, each can short-circuit (e.g. redirect to `/login`) |
| No sessions | New `Buildilume\Http\Session` class wrapping native PHP sessions: start, get/set, flash messages, `regenerate()` (called on login, to prevent session fixation) |
| No CSRF protection | New `csrf_token()`/`csrf_field()` helpers + a `csrf` middleware that verifies the token on every POST |
| No password hashing | Native `password_hash()`/`password_verify()` (PHP built-in, no package needed) |
| No migrations | Minimal custom runner: numbered `.sql` files in a new `database/migrations/` folder, tracked in a `migrations` table, run via a small CLI script (`php database/migrate.php`) — consistent with the project's "hand-roll it" style so far, no new dependency |

---

## 3. Security checklist (non-negotiable, regardless of which CMS option from §0.1 you pick)

- Passwords: `password_hash()` (PHP default: bcrypt), never store/log plaintext.
- CSRF token on every state-changing form (login, logout, all admin create/edit/delete forms).
- Session ID regenerated on login (fixation protection); session cookie flagged `HttpOnly` +
  `Secure` (when served over HTTPS) + `SameSite=Lax`.
- All new DB queries go through the existing `query()`/`execute()` prepared-statement methods —
  **never** string-concatenate user input into SQL.
- All dynamic output in views escaped with `htmlspecialchars()` — I'll add a short `e()` helper
  (`function e($v) { return htmlspecialchars($v, ENT_QUOTES, 'UTF-8'); }`) and use it everywhere,
  since the view compiler has no auto-escaping syntax to fall back on.
- Role-gated middleware on every `/admin/*` route — a logged-in non-admin must not be able to reach
  admin actions by guessing the URL.
- If media uploads are in scope (§0.5): validate real MIME type (not just extension), rename files
  on save (prevent path traversal / overwrite), store under a path Apache/Nginx won't execute as PHP.
- `.env` stays gitignored (already is) and is never committed; I will not put real credentials in
  any file that gets committed.

---

## 4. Proposed database schema

```
users
  id              INT PK AUTO_INCREMENT
  name            VARCHAR(255)
  email           VARCHAR(255) UNIQUE
  password_hash   VARCHAR(255)
  role            ENUM('admin','editor','viewer') DEFAULT 'viewer'
  remember_token  VARCHAR(100) NULL
  created_at      DATETIME
  updated_at      DATETIME

pages                                    -- only if §0.1 answer is (A) or (B)
  id              INT PK AUTO_INCREMENT
  title           VARCHAR(255)
  slug            VARCHAR(255) UNIQUE
  status          ENUM('draft','published') DEFAULT 'draft'
  content         LONGTEXT NULL          -- used directly if (A); unused/ignored if (B)
  author_id       INT FK -> users.id
  published_at    DATETIME NULL
  created_at      DATETIME
  updated_at      DATETIME

page_blocks                              -- only if §0.1 answer is (B)
  id              INT PK AUTO_INCREMENT
  page_id         INT FK -> pages.id
  type            VARCHAR(50)            -- 'hero', 'text', 'image', 'cta', ...
  position        INT                    -- display order
  config          JSON                   -- block-specific fields
  created_at      DATETIME
  updated_at      DATETIME

media                                    -- only if §0.5 answer is "in scope"
  id              INT PK AUTO_INCREMENT
  filename        VARCHAR(255)
  path            VARCHAR(500)
  mime_type       VARCHAR(100)
  size_bytes      INT
  uploaded_by     INT FK -> users.id
  created_at      DATETIME

migrations                               -- framework bookkeeping, always needed
  id              INT PK AUTO_INCREMENT
  migration       VARCHAR(255)
  applied_at      DATETIME
```

If §0.1's answer is (C) (generic content types), this schema is insufficient — that needs
`content_types` + `content_type_fields` + a generic `content_entries` (with a JSON payload) design
instead of fixed `pages`. I have not designed that version since (C) is not the recommended default;
tell me if you want it and I'll redo this section.

---

## 5. Phased roadmap

| Phase | Deliverable | Depends on |
|---|---|---|
| **0** | Framework foundations: view context-passing fix, route params, middleware pipeline, `Session` class, CSRF helpers, `.env.example` + real `.env`, migration runner | Your answer to §0.4 |
| **1** | Auth: `users` migration, `AuthController` (login/logout), `auth`/`guest`/`role:admin` middleware, session-based login, password hashing | Phase 0 |
| **2** | Admin shell: `/admin` layout (sidebar + topbar, finally wiring the existing `user_avatar`/`header_home` stub components to a real logged-in user), role-gated, admin dashboard with real stats (user count, content count) | Phase 1 |
| **3** | User management: admin CRUD for users (list/create/edit/delete, role assignment) | Phase 2 |
| **4** | CMS content: `pages` CRUD in admin + public `GET /pages/{slug}` render route (shape depends on your §0.1 answer) | Phase 2, your §0.1 + §0.5 answers |
| **5** | *(only if §0.1 = B)* Block-based page builder UI: add/remove/reorder blocks, per-block config forms | Phase 4 |
| **6** | Polish: `.htaccess`/nginx config for clean URLs (currently missing entirely), basic activity log, README rewritten to match reality | All above |

## 6. What I need from you to actually start

1. Answers to §0's five questions.
2. Real (or "I'll set up my own") MySQL credentials for `.env`, per §0.4.
3. Confirmation you're OK with the Phase 0 framework changes (route params + middleware are a real
   change to how routing behaves, even though they're additive/backward-compatible with the 3 existing routes).

Once I have those, I'll start at Phase 0 and work down the table, checking in after each phase rather
than disappearing and coming back with everything at once.
