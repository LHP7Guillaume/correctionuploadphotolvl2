<?php
require "../controllers/dashboard-controller.php";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style.css">
    <title>Espace Membre</title>

</head>

<body class="bg-dark text-white">

    <div class="container text-center mt-5">

        <h1 class="mb-5">allPIX</h1>

        <p class="display-5">Bonjour <?= $_SESSION['users']['login'] ?></p>

        <div class="mt-5 ps-4 text-start">
            <p class="display-6"><span class="fw-bold text-warning">Votre formule : <?= $_SESSION['users']['formule'] ?></span></p>
            <p class="display-6"><span class="fw-bold text-warning">Quota : <?= $quota ?> / <?= $_SESSION['users']['quota'] ?> Mo</span></p>
            <p class="display-6"><span class="fw-bold text-warning">Total d'image(s) : <?= $count ?></span></p>

        </div>

        <!--------------------------------------------------------------------- envoie image ----------------------------------------------------------------------------------------------- -->

        <form enctype="multipart/form-data" method="POST" action="">
            <div class="mt-5 mb-5">
                <input type="hidden" name="MAX_FILE_SIZE" value="3145728" />
                <img class="img-fluid pt-5 pb-5" id="preview">
                <!-- Le nom de l'élément input détermine le nom dans le tableau $_FILES -->
                <input type="file" name="fileToUpload" id="fileToUpload"><br>
                <input class="mt-3 btn btn-success" type="submit" value="Envoyer le fichier" />
            </div>
        </form>
        <!---------------------------------------------------------------------- envoie image ----------------------------------------------------------------------------------------------- -->

        <?php
        if (!empty($_POST)) {
            if (!empty($errors)) {
                foreach ($errors as $value) {
                    echo "<span class='h1 text-danger'>" . $value . "</span><br>";
                }
            } else {
                echo "<span class='h1 text-success'>L'image à été enregistrée !<br></span>";
            }
        }

        ?>


        <div class="px-3 mt-5">
            <a href="../views/gallery.php" class="btn btn-light text-bg d-block mt-3">Gallery</a>
        </div>
        <p class="btn btn-outline-primary mt-5"><a href="../views/deconnection.php">Déconnexion</a></p>
    </div>


    <script src="../assets/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>