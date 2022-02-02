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

// si aucuns users ne s'est conecté, on le renvoie à l'index
if (!isset($_SESSION['users']["login"])) {
    header("Location: ../index.php");
    exit();
}


// on déclare notre taille et compteur à zéro
$size = 0;
$count = 0;

//on stock le chemin du répertoire personnel de l'utilisateur
$chemin = "../img/" . $_SESSION["users"]["login"] . "/";

//scandir $chemin me scanne le répertoire personnel de l'utilisateur en cours et stock la liste des fichiers du répertoire dans le tableau arrayFiles
$arrayFiles = scandir($chemin);


//on boucle sur le tableau contenant la liste des fichiers et on additionne la taille en octet de chaques fichiers dans la variable "$size"
foreach ($arrayFiles as $value) {
    if ($value != "." && $value != "..") { // "." et ".." sont exclus car ce ne sont pas des fichiers
        $size += filesize($chemin . $value);
        $count++; // on incrémente le compteur pour connaitre le nombres de fichiers
    }
}

$quota = round($size / 1024 ** 2, 2); // on convertit la taille recupéré en megaoctet pour la lecture humaine

// -------------------------------------------------------------------------------------------------------------------------------


// si le bouton upload à été soliciter, on déclenche la phase de verif avant l'upload
if (!empty($_POST)) {

    $errors = []; // on déclare un tableau pour les erreurs futurs
    $extension;
    $errorMime = true; // on met le mime a true

    // ******************************************* DEBUT DES VERIFICATIONS *************************************************//

    $typeImg = fopen('../assets/media-image-type.csv', 'r'); //

    while (($line = fgets($typeImg))) {


        $type = explode(',', $line);

        if ($type[1] == $_FILES["fileToUpload"]["type"]) {
            $errorMime = false;
            $extension = $type[0];
        }
    }

    if ($errorMime) {
        $errors["mime"] = "Le format d'image est invalide";
    }

    if ($_FILES["fileToUpload"]["size"] > 3000000) {
        $errors["size"] = "Le fichier est trop volumineux";
    }

    if (($quota * 1024 ** 2) + $_FILES["fileToUpload"]["size"] >= $_SESSION['users']['quota'] * 1024 ** 2) {
        $errors["quota"] = "Vous allez depassé votre quota";
    }

    if (
        $_FILES["fileToUpload"]["error"] > 0
    ) {
        $errors["error"] = "Une erreur est survenue";
    }


    // si auncunes erreurs n'a été stocké dans le tableau erreurs; on effectue ce script
    if (empty($errors)) {

        // la fonction upload permet de transférer du répertoire  temporaire au répertoire utilisateur
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "../img/" . $_SESSION["users"]["login"] . "/" . uniqid() . '.' . $extension);


        //répétition du code plus haut pour actualiser la taille et le compteur "$size et $count" pour le quota
        //comme le code est répété, le mettre dans un function() plus tard. 
        $chemin = "../img/" . $_SESSION["users"]["login"] . "/";
        $arrayFiles = scandir($chemin);

        $size = 0;
        $count = 0;

        foreach ($arrayFiles as $value) {
            if ($value != "." && $value != "..") {
                $size += filesize($chemin . $value);
                $count++;
            }
        }

        $quota = round($size / 1024 ** 2, 2);
    }
}
