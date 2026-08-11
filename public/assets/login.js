document.addEventListener('DOMContentLoaded', function () {
    var toggleBtn = document.getElementById('login-toggle-password');
    var passwordInput = document.getElementById('login-password');

    if (toggleBtn && passwordInput) {
        toggleBtn.addEventListener('click', function () {
            var isHidden = passwordInput.type === 'password';
            passwordInput.type = isHidden ? 'text' : 'password';
            toggleBtn.querySelector('i').className = isHidden ? 'fas fa-eye-slash' : 'fas fa-eye';
            toggleBtn.setAttribute('aria-label', isHidden ? 'Hide password' : 'Show password');
        });
    }

    var form = document.getElementById('login-form');
    var status = document.getElementById('login-status');

    if (form && status) {
        form.addEventListener('submit', function (event) {
            event.preventDefault();
            status.textContent = "This is a design preview — sign-in isn't connected to an account system yet.";
            status.classList.add('is-visible');
        });
    }
});
