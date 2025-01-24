
<link href="css/styles.css" rel="stylesheet" />
<div class="popup" id="popup">
    <h2>Vous êtes connecté !</h2>
    <button id="closePopup">Fermer</button>
</div>
<script>
    // Affiche automatiquement le popup dès que la page est chargée
    window.onload = function() {
        const popup = document.getElementById("popup");
        const overlay = document.getElementById("overlay");
        const closePopup = document.getElementById("closePopup");

        // Afficher le popup et l"overlay
        popup.style.display = "block";
        overlay.style.display = "block";

        // Fermer le popup en cliquant sur le bouton
        closePopup.addEventListener("click", () => {
            popup.style.display = "none";
            overlay.style.display = "none";
        });
    };
</script>