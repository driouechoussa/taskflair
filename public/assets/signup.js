document.addEventListener('DOMContentLoaded', function () {
    var toggleBtn = document.getElementById('signup-toggle-password');
    var passwordInput = document.getElementById('signup-password');

    if (toggleBtn && passwordInput) {
        toggleBtn.addEventListener('click', function () {
            var isHidden = passwordInput.type === 'password';
            passwordInput.type = isHidden ? 'text' : 'password';
            toggleBtn.querySelector('i').className = isHidden ? 'fas fa-eye-slash' : 'fas fa-eye';
            toggleBtn.setAttribute('aria-label', isHidden ? 'Hide password' : 'Show password');
        });
    }

    var form = document.getElementById('signup-form');
    var status = document.getElementById('signup-status');

    if (form && status) {
        form.addEventListener('submit', function (event) {
            event.preventDefault();
            status.textContent = "This is a design preview — account creation isn't connected to a backend yet.";
            status.classList.add('is-visible');
        });
    }
});
