<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style/dashboard.css">
    <title>Tableau de bord</title>
</head>

<body>
    <header>
        <h1>Bienvenue</h1>
        <nav>
            <ul>
                <li><a href="#">Accueil</a></li>
                <li><a href="#">À propos</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section id="hero">
            <h1>Générateur de mot de passe</h1>
            <p>Générez des mots de passe sûrs et forts pour vos comptes en ligne.</p>
            <style id='thumbStyle'>
                #slider::-webkit-slider-thumb {
                    border: none;
                    height: 24px;
                    width: 24px;
                    border-radius: 25px;
                    background: #24c266;
                    cursor: pointer;
                    -webkit-appearance: none;
                }
            </style>
            <div class="container">
                <input value="" id="password" disabled="disabled">
                <br>
                <label for="slider" class="labelSlider">Longueur <input type="text" value="16" maxlength="2" id="display-password-length" disabled="disabled" oninput="document.getElementById('slider').value=this.value"></label>
                <br>
                <input type="range" id="slider" name="slider" step="1" value="16" min="4" max="30" oninput="document.getElementById('display-password-length').value=this.value">

                <div class="check">
                    <div class="setting">
                        <label for="uppercase">A-Z</label>
                        <input type="checkbox" id="uppercase" name="uppercase" checked>
                    </div>
                    <div class="setting">
                        <label for="lowercase">a-z</label>
                        <input type="checkbox" id="lowercase" name="lowercase" checked>
                    </div>
                    <div class="setting">
                        <label for="numbers">0-9⁭</label>
                        <input type="checkbox" id="numbers" name="numbers" checked>
                    </div>
                    <div class="setting">
                        <label for="symbols">Symboles</label>
                        <input type="checkbox" id="symbols" name="symbols" checked>
                    </div>
                </div>
                <button type="submit" onclick="generate()">Générer</button>
                <button type="submit" id="copy" onclick="copyPassword()">Copier</button>
            </div>
        </section>
        <section id="features">
            <h2>Caractéristiques</h2>
            <ul>
                <li><span class="icon">&#128272;</span>
                    <p>Longueur réglable</p>
                </li>
                <li><span class="icon">&#128274;</span>
                    <p>Combinaison de caractères</p>
                </li>
                <li><span class="icon">&#128273;</span>
                    <p>Génération instantanée</p>
                </li>
                <li><span class="icon">&#128275;</span>
                    <p>Mot de passe sécurisé</p>
                </li>
            </ul>
        </section>
        <section id="howto">
            <h2>Comment ça marche</h2>
            <ol>
                <li>Réglez la longueur et choisissez les types de caractères que vous voulez inclure.</li>
                <li>Cliquez sur le bouton "Générer".</li>
                <li>Copiez le mot de passe généré et utilisez-le pour vos comptes en ligne.</li>
            </ol>
        </section>
    </main>
    <footer>
        <p>&copy; 2023 Générateur de mot de passe. Tous droits réservés.</p>
    </footer>
    <script src="../controllers/script.js"></script>
</body>

</html>