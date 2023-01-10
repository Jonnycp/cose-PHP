<?php require("static/php/checkInputs.php") ?>
<?php require("static/php/cookies.php") ?>

<!DOCTYPE html>
<html lang="it">

<head>
    <?php require("static/php/head.php") ?>
    <?php require("static/php/utils.php") ?>
</head>

<body>
    <?php
    if (!isset($_COOKIE["utente"])) {
        generateAlert("Registrati per continuare", "Il cookie di nome <code>utente</code> non è settato.", "danger");
    }else{
        generateAlert("Benvenuto, " . $_COOKIE["utente"], "Il cookie di nome <code>utente</code> è settato correttamente.", "info");
    }
    ?>
    <main>
        <div class="container col-xl-10 col-xxl-8 px-4 py-5">
            <div class="row align-items-center g-lg-5 py-5">
                <div class="col-lg-7 text-center text-lg-start">
                    <h1 class="display-4 fw-bold lh-1 mb-3"><?php generateHeroTitle() ?></h1>
                    <p class="col-lg-10 fs-4"><?php generateHeroDescription() ?></p>
                </div>
                <div class="col-md-10 mx-auto col-lg-5">
                    <form class="p-4 p-md-5 border rounded-3 bg-light" method="POST" action="/">
                        <div class="form-floating mb-3">
                            <input type="text" name="nome" id="nome" class="form-control" placeholder="Il tuo nome" required autocomplete="off" value="<?php echo isset($_POST["nome"]) ? cleanInputs($_POST["nome"]) : null ?>">
                            <label for="nome">Nome</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="cognome" id="cognome" class="form-control" placeholder="Il tuo cognome" required autocomplete="off" value="<?php echo isset($_POST["cognome"]) ? cleanInputs($_POST["cognome"]) : null ?>">
                            <label for="cognome">Cognome</label>
                        </div>
                        <button class="button-82-pushable" role="button" type="submit">
                            <span class="button-82-shadow"></span>
                            <span class="button-82-edge"></span>
                            <span class="button-82-front text">
                                Salva
                            </span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>