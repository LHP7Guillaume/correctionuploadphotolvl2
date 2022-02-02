<?php
require "../my-config.php";

session_start();

if (isset($_COOKIE["sessionLogin"])) {
    $_SESSION["users"] = [
        'login' => $users[$_COOKIE["sessionLogin"]]["login"],
        'formule' => $users[$_COOKIE["sessionLogin"]]["formule"],
        'quota' => $users[$_COOKIE["sessionLogin"]]["quota"]
    ];
}

if (!isset($_SESSION['users']["login"])) {
    header("Location: ../index.php");
    exit();
}
$chemin = "../img/" . $_SESSION["users"]["login"] . "/";
$arrayFiles = scandir($chemin);
