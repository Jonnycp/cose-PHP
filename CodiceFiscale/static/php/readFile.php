<?php
    function readCsv() {
        $file = fopen("static/data/codiciCatastali.csv", "r");
        $luoghiNascita = [];
        while(!feof($file)) {
            $luogoNascita = fgets($file);
            array_push($luoghiNascita, trim($luogoNascita));
        }
        fclose($file);
        return $luoghiNascita;
    }

    function csv2Datalist() {
        $luoghiNascita = readCsv();
        foreach($luoghiNascita as $luogoNascita) {
            $luogoNascita = explode(";", $luogoNascita);
            //RALLENTA PERFORMANCE... meglio JS
            echo "<option value='".$luogoNascita[0]."'>".trim($luogoNascita[0])."</option>";
        }
    }

    function getCode($citta) {
        $luoghiNascita = readCsv();
        foreach($luoghiNascita as $luogoNascita) {
            $luogoNascita = explode(";", $luogoNascita);
            if(cleanInputs($luogoNascita[0]) === $citta) {
                return $luogoNascita[2];
            }
        }
    }
?>