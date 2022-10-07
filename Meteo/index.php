<html lang="it">

<head>
    <?php require("static/php/head.php") ?>
    <link rel="stylesheet" href="static/css/styleA.css">
</head>

<body>
    <section>
        <h1>Rilevazione meteorologica</h1>
        <p>Usa questo form per aggiornare il meteo nella tua città</p>
        <?php echo (isset($_GET["error"]) ? '<div class="alert">Dati mancanti.. ricontrolla</div>' : null); ?>
        <form method="post" action="viewMeteo.php">
            <div>
                <label for="localita">Località<strong>*</strong></label>
                <input type="text" name="localita" id="localita" placeholder="Inserisci città" required autocomplete="false">
            </div>

            <div>
                <label for="data">Data<strong>*</strong></label>
                <input type="date" name="data" id="data" required>
            </div>

            <div>
                <label for="ora">Ora<strong>*</strong></label>
                <input type="time" name="ora" id="ora" required>
            </div>

            <div>
                <span>Tipo rilevazione<strong>*</strong></span>
                <div class="radio" required>
                    <input type="radio" id="rilevazione-ofc" name="rilevazione" value="OFC">
                    <label for="rilevazione-ofc">OFC</label>
                    <input type="radio" id="rilevazione-amb" name="rilevazione" value="AMB">
                    <label for="rilevazione-amb">AMB</label>
                    <input type="radio" id="rilevazione-dra" name="rilevazione" value="DRA">
                    <label for="rilevazione-dra">DRA</label>
                </div>
            </div>

            <div>
                <label for="umidita">Umidità<strong>*</strong></label>
                <select id="umidita" name="umidita" required>
                    <option selected>ASSOLUTA</option>
                    <option>RELATIVA</option>
                </select>
            </div>

            <div>
                <label for="clima">Clima attuale<strong>*</strong></label>
                <select id="clima" name="clima" required>
                    <option selected>SERENO</option>
                    <option>PIOGGIA</option>
                    <option>VENTOSO</option>
                    <option>UMIDO</option>
                    <option>FOSCHIA</option>
                </select>
            </div>

            <input type="submit" value="Invia segnalazione">
        </form>
    </section>

    <script src="static/js/script.js"></script>
</body>

</html>