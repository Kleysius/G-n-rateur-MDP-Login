<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../assets/style/register.css">
    <title>Inscription</title>
</head>

<body>
    <div class="container">
        <input type="checkbox" id="flip">
        <div class="cover">
            <div class="front">
                <img src="../assets/images/frontImg.jpg" alt="frontImg">
                <div class="text">
                    <span class="text-1">Créez des mots de passe forts et sûrs pour garantir la sécurité de vos comptes web</span>
                </div>
            </div>
            <div class="back">
                <img class="backImg" src="../assets/images/backImg.jpg" alt="backImg">
                <div class="text">
                    <span class="text-1">Qu’est-ce qui fait la force<br> d’un mot de passe ?</span>
                    <span class="text-2">Sa longueur <br>Sa complexité <br>Son caractère unique</span>
                </div>
            </div>
        </div>

        <div class="forms">
            <div class="form-content">
                <div class="login-form">
                    <div class="title">Connexion</div>
                    <form action="../controllers/login.php" method="post">
                        <div class="input-boxes">
                            <div class="input-box">
                                <i class="fas fa-envelope"></i>
                                <input type="text" name="email" placeholder="Adresse email" required>
                            </div>
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input type="password" name="password" placeholder="Mot de passe" required>
                            </div>
                            <div class="text"><a href="#">Mot de passe oublié ?</a></div>
                            <div class="error-message">
                                <?php
                                if (isset($_SESSION['error_mail'])) {
                                    echo $_SESSION['error_mail'];
                                    unset($_SESSION['error_mail']);
                                }
                                ?></div>
                            <div class="button input-box">
                                <input type="submit" value="Connexion">
                            </div>
                            <div class="text sign-up-text">Vous n'avez pas de compte ? <label for="flip">Inscrivez-vous</label></div>
                        </div>
                    </form>
                </div>

                <div class="signup-form">
                    <div class="title">Inscription</div>
                    <form action="../controllers/register.php" method="post">
                        <div class="input-boxes">
                            <div class="input-box">
                                <i class="fas fa-user"></i>
                                <input type="text" name="username" placeholder="Votre nom" required>
                            </div>
                            <div class="input-box">
                                <i class="fas fa-envelope"></i>
                                <input type="text" name="email" placeholder="Votre adresse email" required>
                            </div>
                            <div class="error-message">
                                <?php
                                if (isset($_SESSION['error'])) {
                                    echo $_SESSION['error'];
                                    unset($_SESSION['error']);
                                }
                                ?></div>
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input type="password" name="password" placeholder="Votre mot de passe" required>
                            </div>
                            <div class="button input-box">
                                <input type="submit" value="S'inscrire">
                            </div>
                            <div class="text sign-up-text">Vous avez déjà un compte ? <label for="flip">Connectez-vous</label></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>