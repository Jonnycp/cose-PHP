<?php
    function getSaluto(){
        $data = date("hh");
        if($data >= 0 && $data < 12) {
            return "Buongiorno";
        } else if($data >= 12 && $data < 18) {
            return "Buon pomeriggio";
        } else {
            return "Buonasera";
        }
    }

    function generateAlert($title, $message, $type){
        echo "
            <div class='alert alert-$type show' role='alert'>
                <strong>$title</strong> 
                <p>$message</p>
            </div>";
    }

    function generateHeroTitle(){
        if (isset($_COOKIE["utente"])) {
            echo getSaluto() . ", " . $_COOKIE["utente"];
        } else {

            echo getSaluto() . ", utente anonimo";
        }
    }

    function generateHeroDescription(){
        if (isset($_COOKIE["utente"])) {
            echo "Nel form di seguito è possibile cambiare il proprio nome e cognome e salvarlo. 
                  Il cookie <code>utente</code> è settato correttamente.<br/>
                  <em>Potrebbe essere necessario ricaricare la pagina, per visualizzare il contenuto del cookie.</em>";
        } else {
            echo "Nel form di seguito puoi impostare il nome e cognome da salvare nel cookie <code>utente</code>.<br/>
                  <em>Potrebbe essere necessario ricaricare la pagina, per visualizzare il contenuto del cookie.</em>";
        }
    }
?>
