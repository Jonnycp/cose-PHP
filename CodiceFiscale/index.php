<!DOCTYPE html>
<html lang="it">

<head>
    <?php require("static/php/head.php") ?>
</head>

<body>
    <div>
        <header>
            <h1>VERIFICA CODICE FISCALE</h1>
        </header>
        <form action="#" method="POST">
            <div>
                <label for="codiceFiscale">Codice Fiscale</label>
                <input type="text" name="codiceFiscale" id="codiceFiscale" minlength="16" autocomplete="false" />

                <label for="cognome">Cognome</label>
                <input type="text" name="cognome" id="cognome" required autocomplete="false" />

                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" required autocomplete="false" />

                <label for="luogoNascita">Luogo di nascita</label>
                <input type="text" list="luogoNascitaList" name="luogoNascita" id="luogoNascita" required autocomplete="false"/>
                <datalist id="luogoNascitaList">
                    <?php
                        require("static/php/readFile.php");
                        csv2Datalist();
                    ?>
                </datalist>

                <label for="dataNascita">Data di nascita</label>
                <input type="date" name="dataNascita" id="dataNascita" required autocomplete="false" />
            </div>
            <button type="submit">Verifica il codice Fiscale</button>
        </form>
    </div>
    <?php 
        if(isset($_POST["nome"]) && isset($_POST["cognome"]) && isset($_POST["luogoNascita"]) && isset($_POST["dataNascita"]) && isset($_POST["codiceFiscale"])) {
            $nome = $_POST["nome"];
            $cognome = $_POST["cognome"];
            $luogoNascita = $_POST["luogoNascita"];
            $dataNascita = $_POST["dataNascita"];
            $codiceFiscale = $_POST["codiceFiscale"];

            require("static/php/verificaCodice.php");
            verificaCodiceFiscale($nome, $cognome, $luogoNascita, $dataNascita, $codiceFiscale);
        }


    ?>
</body>
</html>