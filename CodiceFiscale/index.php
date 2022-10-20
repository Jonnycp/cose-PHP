<!DOCTYPE html>
<html lang="it">

<head>
    <?php require("static/php/head.php") ?>
    <?php require("static/php/verificaCodice.php"); ?>
</head>

<body>
    <div>
        <header>
            <h1>VERIFICA CODICE FISCALE</h1>
        </header>
        <form action="#" method="POST">
            <div>
                <label for="codiceFiscale">Codice Fiscale</label>
                <input type="text" name="codiceFiscale" id="codiceFiscale" minlength="16" maxlength="16" autocomplete="false" value="<?php echo isset($_POST["codiceFiscale"]) ? cleanInputs($_POST["codiceFiscale"]) : null?>"/>

                <label for="cognome">Cognome</label>
                <input type="text" name="cognome" id="cognome" required minlength="2" autocomplete="false" value="<?php echo isset($_POST["cognome"]) ? cleanInputs($_POST["cognome"]) : null?>"/>

                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" required minlength="2" autocomplete="false"  value="<?php echo isset($_POST["nome"]) ? cleanInputs($_POST["nome"]) : null?>"/>

                <label for="luogoNascita">Luogo di nascita</label>
                <input type="text" list="luogoNascitaList" name="luogoNascita" id="luogoNascita" required autocomplete="false" value="<?php echo isset($_POST["luogoNascita"]) ? cleanInputs($_POST["luogoNascita"]) : null?>"/>
                <datalist id="luogoNascitaList">
                    <?php
                        require("static/php/readFile.php");
                        csv2Datalist();
                    ?>
                </datalist>

                <label for="dataNascita">Data di nascita</label>
                <input type="date" name="dataNascita" id="dataNascita" required autocomplete="false" value="<?php echo isset($_POST["dataNascita"]) ? cleanInputs($_POST["dataNascita"]) : null?>"/>

                <label for="sesso">Sesso</label>
                <select id="sesso" name="sesso" required>
                    <option value="M" <?php echo isset($_POST["sesso"]) && $_POST["sesso"] == "M" ? "selected" : null ?>>M</option>
                    <option value="F" <?php echo isset($_POST["sesso"]) && $_POST["sesso"] == "F" ? "selected" : null ?>>F</option>
                </select>
            </div>
            <button type="submit">Verifica il codice Fiscale</button>
        </form>
    </div>
    <?php 
        if(isset($_POST["nome"]) && isset($_POST["cognome"]) && isset($_POST["dataNascita"]) && isset($_POST["sesso"]) && isset($_POST["luogoNascita"])) {
            $nome = cleanInputs($_POST["nome"]);
            $cognome = cleanInputs($_POST["cognome"]);
            $dataNascita = cleanInputs($_POST["dataNascita"]);
            $sesso = cleanInputs($_POST["sesso"]);
            $luogoNascita = cleanInputs($_POST["luogoNascita"]);

            verificaCodiceFiscale($nome, $cognome, $luogoNascita, $dataNascita, $sesso);
        }


    ?>
</body>
</html>