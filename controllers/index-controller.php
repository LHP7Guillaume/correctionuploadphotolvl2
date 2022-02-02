<?php
require "my-config.php";
// var_dump($_POST);
session_start();

if (isset($_COOKIE["sessionLogin"])) {
    header("Location: views/dashboard.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST["connexion"])) {

    if (array_key_exists($_POST["login"], $users)) {
        if (password_verify($_POST["password"], $users[$_POST["login"]]["password"])) {

            if (isset($_POST["checkbox"]) && $_POST["checkbox"] == 1) {
                setcookie("sessionLogin", $users[$_POST["login"]]["login"], time() + 60 * 60 * 24 * 30, "/");
            }
            $_SESSION["users"] = [
                'login' => $users[$_POST["login"]]["login"],
                'formule' => $users[$_POST["login"]]["formule"],
                'quota' => $users[$_POST["login"]]["quota"],
            ];
            header("Location: views/dashboard.php");
            exit;
        } else {
            $error = "Pseudo / Mot de passe invalide";
        }
    } else {
        $error = "Pseudo / Mot de passe invalide";
    }
}
