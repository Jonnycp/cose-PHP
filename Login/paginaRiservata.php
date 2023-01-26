<?php require("static/php/login.php") ?>

<!DOCTYPE html>
<html lang="it">

<head>
    <?php require("static/php/head.php") ?>
    <?php require("static/php/utils.php") ?>
</head>

<body>
    <?php
    if (isset($_COOKIE["email"])) {
        generateAlert("Ciao, capo!", "info");
    }else{
        header("Location: index.php");
    }
    ?>
    <main>
        <div class="container col-xl-10 col-xxl-8 px-4 py-5">
            <div class="row align-items-center g-lg-5 py-5">
                <div class="col-lg-7 text-center text-lg-start">
                    <h1 class="display-4 fw-bold lh-1 mb-5">
                        <?php generateHeroTitle() ?>
                    </h1>
                    <form method="POST" action="index.php">
                        <input type="hidden" name="exit" value="true">
                        <button class="btn btn-danger btn-lg" type="submit">Esci</button>
                   </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>