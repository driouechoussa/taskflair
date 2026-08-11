document.addEventListener('DOMContentLoaded', function () {
    var shell = document.querySelector('.onboarding-shell');
    var track = document.getElementById('onboarding-track');
    var steps = Array.prototype.slice.call(document.querySelectorAll('.onboarding-step'));
    var segments = Array.prototype.slice.call(document.querySelectorAll('.onboarding-progress-seg'));
    var label = document.getElementById('onboarding-progress-label');
    var backBtn = document.getElementById('onboarding-back');
    var nextBtn = document.getElementById('onboarding-next');
    var nameInput = document.getElementById('onboarding-workspace-name');
    var slugValue = document.getElementById('onboarding-slug-value');

    if (!track || !steps.length) return;

    var totalSteps = steps.length;
    var numberedSteps = segments.length; // steps that count toward "Step X of N" (excludes the completion screen)
    var current = 0;

    var selections = {
        role: null,
        size: null,
        focus: []
    };

    function slugify(value) {
        var slug = value.toLowerCase().trim()
            .replace(/[^a-z0-9\s-]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-')
            .replace(/^-|-$/g, '');
        return slug || 'your-workspace';
    }

    function hideError(stepIndex) {
        var error = document.querySelector('.onboarding-error[data-error-for="' + stepIndex + '"]');
        if (error) error.classList.remove('is-visible');
    }

    function showError(stepIndex) {
        var error = document.querySelector('.onboarding-error[data-error-for="' + stepIndex + '"]');
        if (error) {
            error.classList.remove('is-visible');
            // restart the shake animation even if it's already visible
            requestAnimationFrame(function () { error.classList.add('is-visible'); });
        }
    }

    function validate(index) {
        if (index === 1) return !!selections.role;
        if (index === 2) return !!selections.size;
        if (index === 4) return !!(nameInput && nameInput.value.trim().length);
        return true;
    }

    function updateNav() {
        if (backBtn) backBtn.classList.toggle('is-invisible', current === 0);

        if (nextBtn) {
            if (current >= numberedSteps - 1 && current < totalSteps - 1) {
                nextBtn.innerHTML = 'Finish Setup <i class="fas fa-arrow-right"></i>';
            } else {
                nextBtn.innerHTML = 'Continue <i class="fas fa-arrow-right"></i>';
            }
        }
    }

    function updateProgress() {
        var boundedIndex = Math.min(current, numberedSteps - 1);
        segments.forEach(function (seg, i) {
            seg.classList.toggle('is-filled', i <= boundedIndex || current >= numberedSteps);
        });
        if (label) {
            label.textContent = 'Step ' + (boundedIndex + 1) + ' of ' + numberedSteps;
        }
    }

    function populateSummary() {
        var name = nameInput && nameInput.value.trim() ? nameInput.value.trim() : 'your workspace';
        var role = document.getElementById('onboarding-summary-role');
        var size = document.getElementById('onboarding-summary-size');
        var focus = document.getElementById('onboarding-summary-focus');
        var nameEl = document.getElementById('onboarding-summary-name');

        if (nameEl) nameEl.textContent = name;
        if (role) role.textContent = selections.role || '—';
        if (size) size.textContent = selections.size || '—';
        if (focus) focus.textContent = selections.focus.length ? selections.focus.join(', ') : 'Not specified yet';
    }

    function goTo(index) {
        current = Math.max(0, Math.min(index, totalSteps - 1));
        track.style.transform = 'translateX(-' + (current * 100) + '%)';
        updateProgress();
        updateNav();
        if (shell) shell.classList.toggle('is-complete', current === totalSteps - 1);
        if (current === totalSteps - 1) populateSummary();
    }

    if (nextBtn) {
        nextBtn.addEventListener('click', function () {
            if (validate(current)) {
                hideError(current);
                goTo(current + 1);
            } else {
                showError(current);
            }
        });
    }

    if (backBtn) {
        backBtn.addEventListener('click', function () {
            goTo(current - 1);
        });
    }

    // Single-select option cards (role)
    document.querySelectorAll('.onboarding-option-grid').forEach(function (grid) {
        grid.querySelectorAll('.onboarding-option').forEach(function (btn) {
            btn.addEventListener('click', function () {
                grid.querySelectorAll('.onboarding-option').forEach(function (b) { b.classList.remove('is-selected'); });
                btn.classList.add('is-selected');
                selections.role = btn.getAttribute('data-value');
                hideError(current);
            });
        });
    });

    // Chip rows: single-select (size) or multi-select (focus)
    document.querySelectorAll('.onboarding-chip-row').forEach(function (row) {
        var group = row.getAttribute('data-group');
        var isMulti = row.getAttribute('data-multi') === 'true';

        row.querySelectorAll('.onboarding-chip').forEach(function (chip) {
            chip.addEventListener('click', function () {
                var value = chip.getAttribute('data-value');

                if (isMulti) {
                    chip.classList.toggle('is-selected');
                    var idx = selections.focus.indexOf(value);
                    if (chip.classList.contains('is-selected') && idx === -1) {
                        selections.focus.push(value);
                    } else if (!chip.classList.contains('is-selected') && idx !== -1) {
                        selections.focus.splice(idx, 1);
                    }
                } else {
                    row.querySelectorAll('.onboarding-chip').forEach(function (c) { c.classList.remove('is-selected'); });
                    chip.classList.add('is-selected');
                    if (group === 'size') selections.size = value;
                    hideError(current);
                }
            });
        });
    });

    // Workspace name + live slug preview
    if (nameInput && slugValue) {
        nameInput.addEventListener('input', function () {
            slugValue.textContent = slugify(nameInput.value);
            hideError(current);
        });

        nameInput.addEventListener('keydown', function (event) {
            if (event.key === 'Enter') {
                event.preventDefault();
                if (nextBtn) nextBtn.click();
            }
        });
    }

    goTo(0);
});
