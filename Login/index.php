<?php require(__DIR__."/static/php/login.php");?>

<!DOCTYPE html>
<html lang="it">

<head>
    <?php require("static/php/head.php") ?>
    <?php require("static/php/utils.php") ?>
</head>

<body>
    <?php
    if (!isset($_COOKIE["email"])) {
        generateAlert("Esegui il login per continuare", "danger");
    }else{
        header("Location: paginaRiservata.php");
    }
    ?>
    <main>
        <div class="container col-xl-10 col-xxl-8 px-4 py-5">
            <div class="row align-items-center g-lg-5 py-5">
                <div class="col-lg-7 text-center text-lg-start">
                    <h1 class="display-4 fw-bold lh-1 mb-5">Entra nel servizio</h1>
                </div>
                <div class="col-md-10 mx-auto col-lg-5">
                    <form class="p-4 p-md-5 border rounded-3 bg-light" method="POST" action="paginaRiservata.php">
                        <div class="form-floating mb-3">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email" required autocomplete="off">
                            <label for="nome">Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="password" id="password" minlength="8" class="form-control" placeholder="Password" required autocomplete="off">
                            <label for="cognome">Password</label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="true" name="remember" id="remember">
                            <label class="form-check-label" for="remember">
                                Ricordami
                            </label>
                        </div>
                        <button class="button-82-pushable" role="button" type="submit">
                            <span class="button-82-shadow"></span>
                            <span class="button-82-edge"></span>
                            <span class="button-82-front text">
                                Login
                            </span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>