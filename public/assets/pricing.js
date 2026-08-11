document.addEventListener('DOMContentLoaded', function () {
    // Billing toggle
    var toggleSwitch = document.getElementById('pricing-toggle-switch');
    var toggleLabels = document.querySelectorAll('.pricing-toggle-label');
    var priceAmounts = document.querySelectorAll('.pricing-price-amount');
    var priceNotes = document.querySelectorAll('.pricing-price-note');

    function setBilling(isYearly) {
        toggleSwitch.classList.toggle('is-yearly', isYearly);
        toggleSwitch.setAttribute('aria-checked', isYearly ? 'true' : 'false');

        toggleLabels.forEach(function (label) {
            var billing = label.getAttribute('data-billing');
            label.classList.toggle('is-active', (billing === 'yearly') === isYearly);
        });

        priceAmounts.forEach(function (el) {
            var value = isYearly ? el.getAttribute('data-yearly') : el.getAttribute('data-monthly');
            el.textContent = '$' + value;
        });

        priceNotes.forEach(function (el) {
            var note = isYearly ? el.getAttribute('data-yearly-note') : el.getAttribute('data-monthly-note');
            if (note) el.textContent = note;
        });
    }

    if (toggleSwitch) {
        toggleSwitch.addEventListener('click', function () {
            setBilling(!toggleSwitch.classList.contains('is-yearly'));
        });

        toggleLabels.forEach(function (label) {
            label.addEventListener('click', function () {
                setBilling(label.getAttribute('data-billing') === 'yearly');
            });
        });
    }

    // FAQ accordion
    document.querySelectorAll('.faq-question').forEach(function (btn) {
        btn.addEventListener('click', function () {
            btn.closest('.faq-item').classList.toggle('is-open');
        });
    });
});
