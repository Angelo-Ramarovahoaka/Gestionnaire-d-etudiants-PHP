document.addEventListener("DOMContentLoaded", function() {
    // Afficher la page de connexion après 3 secondes
    setTimeout(function() {
        document.querySelector(".loader-container").classList.add("loaded");
        document.querySelector(".login-container").classList.add("show");
    }, 500);
});
