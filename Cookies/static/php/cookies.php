<?php
    if (isset($_POST["nome"]) && isset($_POST["cognome"])) {
        $nome = cleanInputs($_POST["nome"]);
        $cognome = cleanInputs($_POST["cognome"]);

        if (controlliInput($nome) && controlliInput($cognome)) {
            setcookie("utente", $nome . " " . $cognome, time() + 60*60*24, "/", false, true);
        }
    }
?>