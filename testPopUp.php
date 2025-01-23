<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Popup Automatique</title>
    <style>
        /* Styles pour le popup */

        .popup {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 300px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
            text-align: center;
            padding: 20px;
            z-index: 1000;
            display: none; /* Masqué par défaut */
        }

        .popup h2 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .popup button {
            padding: 10px 20px;
            font-size: 14px;
            border: none;
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .popup button:hover {
            background-color: #45a049;
        }

        /* Masquer le fond noir derrière */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
            display: none; /* Masqué par défaut */
        }
    </style>
</head>
<body>
<!-- Arrière-plan sombre -->
<div class="overlay" id="overlay"></div>

<!-- Popup -->
<div class="popup" id="popup">
    <h2>Vous êtes connecté !</h2>
    <button id="closePopup">Fermer</button>
</div>

<script>
    // Affiche automatiquement le popup dès que la page est chargée
    window.onload = function() {
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
    };
</script>
</body>
</html>