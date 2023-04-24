<?php

session_start();

if (!empty($_POST)) {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $userArray = json_decode(file_get_contents('../user.json'), true);
    $userFilter = array_filter($userArray, function ($user) {
        return $user['email'] == $_POST['email'];
    });
    $userFilter = array_values($userFilter);
    if (!empty($userFilter)) {
        if (password_verify($_POST['password'], $userFilter[0]["password"])) {
            header('location:../pages/dashboard.php');
        } else {
            header('location:../pages/login.php');
        }
    } else {
        $_SESSION['error_mail'] = 'Adresse email ou mot de passe incorrect';
        header('location:../pages/login.php');
    }
}
