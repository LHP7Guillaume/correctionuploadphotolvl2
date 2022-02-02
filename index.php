<?php
require "controllers/index-controller.php"
?>

<!doctype html>
<html lang="fr">

<head>

    <title>All Pix</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style.css">


</head>

<body class="bg-dark text-white">

    <div class="container text-center mt-5">

        <h1 class="mb-5 display-1">allPIX</h1>

        <form action="" method="POST">
            <input type="text" class="form-control" placeholder="Pseudo" name="login">
            <input type="password" class="form-control mt-5" placeholder="Mot de passe" name="password">
            <input class="mt-5 btn-success" type="submit" value="connexion" name="connexion">
            <div class="text-center">
                <label for="checkbox">Se souvenir de moi</label> <input value="1" id="checkbox" type="checkbox" name="checkbox">
            </div>
        </form>
    </div>
    <div class="text-center mt-5">
        <span class="h1 "><?= $error ?? "" ?></span>
    </div>


    <script src="assets/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>