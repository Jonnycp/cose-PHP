<html lang="it">

<head>
    <?php require("static/php/head.php") ?>
    <link rel="stylesheet" href="static/css/viewMeteo.css">
</head>

<body>
    <nav>
        <a href="index.php">
            <iconify-icon icon="eva:arrow-ios-back-fill" width="30"></iconify-icon>
            Indietro
        </a>
    </nav>
    <?php
        $localita = $_POST["localita"];
        $data = $_POST["data"];
        $ora = $_POST["ora"];
        $rilevazione = $_POST["rilevazione"];
        $umidita = $_POST["umidita"];
        $clima = $_POST["clima"];

        $location = 'Location: /index.php?error';
        if (!isset($localita)) header($location);
        if (!isset($data)) header($location);
        if (!isset($ora)) header($location);
        if (!isset($rilevazione)) header($location);
        if (!isset($umidita)) header($location);
        if (!isset($clima)) header($location);

        //Sicurezza contro attacchi XSS
        $localita = htmlspecialchars(strip_tags($localita));
        $data = htmlspecialchars(strip_tags($data));
        $ora = htmlspecialchars(strip_tags($ora));
        $rilevazione = htmlspecialchars(strip_tags($rilevazione));
        $umidita = htmlspecialchars(strip_tags($umidita));
        $clima = htmlspecialchars(strip_tags($clima));
    ?>
    <main>
        <section>
            <img src=<?php echo convert2image($clima) ?> alt=<?php echo $clima?>/>
            <h1><?php echo $localita ?></h1>
        </section>
        <section class="info">
            <div>
                <h2>Umidità</h2>
                <?php echo $umidita ?>
            </div>
            <div>
                <h2>Rilevazione</h2>
                <?php echo $rilevazione ?>
            </div>
            <div>
                <h2>Data</h2>
                <?php echo $data ?>
            </div>
            <div>
                <h2>Ora</h2>
                <?php echo $ora ?>
            </div>
        </section>
    </main>

</body>

</html>