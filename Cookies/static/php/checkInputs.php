<?php
    function cleanInputs($input) {
        //Attenzione agli attacchi XSS
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        $input = str_replace(' ', '', $input);
        $input = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $input);
        $input = preg_replace('/[^A-Za-z0-9\-]/', '', $input);
        return $input;
    }

    function controlliInput($input, $min=null, $max=null) {
        if(empty($input)) {
            return false;
        }

        if($min != null && $input < $min) {
            return false;
        }
        if($max != null && $input > $max) {
            return false;
        }

        return true;
    }
?>