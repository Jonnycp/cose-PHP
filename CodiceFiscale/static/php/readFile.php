<?php
    function readCsv() {
        $file = fopen("static/data/codiciCatastali.csv", "r");
        $luoghiNascita = array();
        while(!feof($file)) {
            $luogoNascita = fgets($file);
            echo $luogoNascita;
            //array_push($luogoNascita, $luogoNascita);
            print($luoghiNascita);
        }
        fclose($file);
        return $luoghiNascita;
    }

    function csv2Datalist() {
        $luoghiNascita = readCsv();
        print_r($luoghiNascita);
        foreach($luoghiNascita as $luogoNascita) {
            echo "<option value='trim(".$luogoNascita[0].")'>".trim($luogoNascita[0])."</option>";
        }
    }
?>