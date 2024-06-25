// theme-toggle.js

document.addEventListener('DOMContentLoaded', (event) => {
    const themeToggle = document.getElementById('theme-toggle');
    
    // Check for saved user preference, if any, on load of the website
    if (localStorage.getItem('dark-mode') === 'true') {
        document.body.classList.add('dark-mode');
        themeToggle.classList.remove('fa-moon');
        themeToggle.classList.add('fa-sun');
    }

    themeToggle.addEventListener('click', () => {
        document.body.classList.toggle('dark-mode');
        if (document.body.classList.contains('dark-mode')) {
            themeToggle.classList.remove('fa-moon');
            themeToggle.classList.add('fa-sun');
            localStorage.setItem('dark-mode', 'true');
        } else {
            themeToggle.classList.remove('fa-sun');
            themeToggle.classList.add('fa-moon');
            localStorage.setItem('dark-mode', 'false');
        }
    });
});
