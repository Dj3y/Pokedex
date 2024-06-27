
document.getElementById('dark-mode-toggle').addEventListener('click', function() {
    document.body.classList.toggle('dark-mode');
});
// Check for saved dark mode preference and apply it
if (localStorage.getItem('nav-dark-mode') === 'enabled') {
    document.getElementById('navbar').classList.add('dark-mode');
}

// Toggle dark mode for navbar and save preference
document.getElementById('dark-mode-toggle').addEventListener('click', function() {
    const navbar = document.getElementById('navbar');
    navbar.classList.toggle('dark-mode');
    if (navbar.classList.contains('dark-mode')) {
        localStorage.setItem('nav-dark-mode', 'enabled');
    } else {
        localStorage.removeItem('nav-dark-mode');
    }
});
