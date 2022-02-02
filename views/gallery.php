<?php

require "../controllers/gallery-controller.php";

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="../assets/lightbox.css">

    <title>Gallerie</title>
</head>

<body class="bg-dark text-white">

    <div class="text-center mt-5">

        <h1 class="mb-5 display-1">allPIX</h1>
        <p class="display-3 text-warning">Bonjour, <?= $_SESSION['users']['login'] ?>, voici votre gallerie</p>

        <div class='row m-0' data-masonry='{"percentPosition": true }'>
            <?php foreach ($arrayFiles as $value) {

                if ($value != "." && $value != "..") { ?>

                    <div class='col-lg-3 col-4 mb-3'>
                        <div>
                            <a data-lightbox='roadtrip' href='../img/<?= $_SESSION['users']['login'] ?>/<?= $value ?>'>
                                <img class='img-fluid' src='../img/<?= $_SESSION['users']['login'] ?>/<?= $value ?>'>
                            </a>
                        </div>
                    </div>


            <?php  }
            } ?>
        </div>






        <div class=" px-3 mt-5">
            <a href="../views/dashboard.php" class="btn btn-light text-bg d-block mt-3">Retour Dashboard</a>
        </div>
        <p class="btn btn-outline-primary mt-5"><a href="../views/deconnection.php">Déconnexion</a></p>
    </div>

    <!-- JavaScript Bundle with Popper -->
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="../assets/lightbox-plus-jquery.js"></script>
    <script src="assets/script.js"></script>

</body>

</html>