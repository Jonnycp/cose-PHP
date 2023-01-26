<?php
    function getSaluto(){
        $data = date("h")+1;
        if($data >= 0 && $data < 12) {
            return "Buongiorno";
        } else if($data >= 12 && $data < 18) {
            return "Buon pomeriggio";
        } else {
            return "Buonasera";
        }
    }

    function generateAlert($title, $type){
        echo "
            <div class='alert alert-$type show' role='alert'>
                <strong>$title</strong> 
            </div>";
    }

    function generateHeroTitle(){
        if (isset($_COOKIE["email"])) {
            echo getSaluto() . ", <br>" . $_COOKIE["email"];
        } else {

            echo getSaluto() . ", utente anonimo";
        }
    }
?>
