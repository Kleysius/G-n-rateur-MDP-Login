<?php

session_start();

if (!empty($_POST)) {
    $userName = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
}

$regexEmail = "/^[^\s@]+@[^\s@]+\.[^\s@]+$/";

if (preg_match($regexEmail, $email)) {
    if (!empty($userName) && !empty($email) && !empty($password)) {
        $user = ["name" => $userName, "email" => $email, "password" => $password];
        $arrayUser = json_decode(file_get_contents('../user.json'), true);
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $user['password'] = $hash;
        array_push($arrayUser, $user);
        file_put_contents('../user.json', json_encode($arrayUser));
        header('location:../pages/login.php');
    } else {
        $_SESSION['error'] = 'Tous les champs doivent être remplis';
    }
} else {
    if (!preg_match($regexEmail, $email)) {
        $_SESSION['error'] = "L'adresse email n'est pas valide.";
    }
    header('location:../pages/login.php');
}
