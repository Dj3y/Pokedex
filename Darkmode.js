
document.getElementById('dark-mode-toggle').addEventListener('click', function() {
    document.body.classList.toggle('dark-mode');
});
// Darkmode.js

// Check for saved dark mode preference and apply it
if (localStorage.getItem('nav') === 'enabled') {
    document.getElementById('nav').classList.add('dark-mode');
}

// Toggle dark mode for navbar and save preference
document.getElementById('dark-mode-toggle').addEventListener('click', function() {
    const navbar = document.getElementById('nav');
    navbar.classList.toggle('dark-mode');
    if (navbar.classList.contains('dark-mode')) {
        localStorage.setItem('nav', 'enabled');
    } else {
        localStorage.removeItem('nav');
    }
});
