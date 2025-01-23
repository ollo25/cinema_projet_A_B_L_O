<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Popup avec condition</title>
    <style>
        /* Styles po
    </style>
</head>
<body>
<!-- Arrière-plan sombre -->
<div class="overlay" id="overlay"></div>

<div class="popup" id="popup">
    <h2>Vous êtes connecté !</h2>
    <button id="closePopup">Fermer</button>
</div>

<script>


        const popup = document.getElementById('popup');
        const overlay = document.getElementById('overlay');
        const closePopup = document.getElementById('closePopup');

        // Afficher le popup et l'overlay
        popup.style.display = 'block';
        overlay.style.display = 'block';

        // Fermer le popup en cliquant sur le bouton
        closePopup.addEventListener('click', () => {
            popup.style.display = 'none';
            overlay.style.display = 'none';
        });

</script>
</body>
</html>
