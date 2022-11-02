<!DOCTYPE html>
<html lang="it">

<head>
    <?php require("static/php/head.php") ?>
    <?php require("static/php/monete.php"); ?>
</head>

<body>
    <h1>Calcolo monete</h1>
    <main>
        <form action="#" method="POST">
            <div>
                <input type="number" name="centesimi" id="centesimi" autocomplete="off" required min="1" max="2000" value="<?php echo isset($_POST["centesimi"]) ? cleanInputs($_POST["centesimi"]) : null ?>" />
                <label for="centesimi">centesimi</label>
            </div>
            <button type="submit">Calcola</button>
        </form>

        <section>
            <?php
            if (isset($_POST["centesimi"])) {
                $centesimi = cleanInputs($_POST["centesimi"]);

                if (controlliInput($centesimi, 1, 2000)) {
                    echo "<ul>";
                    $monete = calcolaMonete($centesimi);
                    foreach ($monete as $moneta) {
                        echo "<li><img src='./static/images/$moneta.png'/></li>";
                    }
                    echo "</ul>";
                } else {
                    echo "<p>Valore non valido</p>";
                }
            }
            ?>
        </section>
    </main>
</body>

</html>