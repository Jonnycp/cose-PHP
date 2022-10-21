<?php
    function cleanInputs($input) {
        //Attenzione agli attacchi XSS
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        $input = str_replace(' ', '', $input);
        $input = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $input);
        $input = preg_replace('/[^A-Za-z0-9\-]/', '', $input);
        $input = strtoupper($input);
        return $input;
    }

    function calcolaCodiceFiscale($nome, $cognome, $luogoNascita, $dataNascita, $sesso){
        $cf = "";
        $cf .= estrazioneLettere($cognome, false);
        $cf .= estrazioneLettere($nome, true);
        $cf .= dataNascita($dataNascita, $sesso);
        $cf .= luogoNascita($luogoNascita);
        $cf .= carattereControllo($cf);

        return $cf;
    }

    function verificaCodiceFiscale($codiceFiscale, $cfGenerato){
        return $codiceFiscale === $cfGenerato;
    }

    function controlliInput($input, $lunghezza=null, $isData=false) {
        if(empty($input)) {
            return false;
        }

        if($lunghezza != null && strlen($input) != $lunghezza) {
            return false;
        }

        if($isData) {
            $data = explode("-", $input);
            if(count($data) != 3) {
                return false;
            }
            if(!checkdate($data[1], $data[2], $data[0])) {
                return false;
            }
        }
        return true;
    }
    function estrazioneLettere($nominativo, $isNome=true){
        $cf = [];
        $lettere = getConsonantiVocali($nominativo);
        $salto = count($lettere["consonanti"]) > 3 && $isNome;

        $indiceVocale = 0;
        $indiceConsonante = 0;
        for($j = 0; $j < 3; $j++){
            if($salto && $indiceConsonante === 1){
                $indiceConsonante++;
                $j--;
            }else{
                if(count($lettere["consonanti"]) > $indiceConsonante){
                    array_push($cf, $lettere["consonanti"][$indiceConsonante]);
                    $indiceConsonante++;
                }
            }
        }

        //CAS0 Consonanti < 3 == Si prendono vocali
        if (count($lettere["consonanti"])<3){
            for($j = count($lettere["consonanti"]); $j < 3; $j++){
                if(count($lettere["vocali"]) > $indiceVocale){
                    array_push($cf, $lettere["vocali"][$indiceVocale]);
                    $indiceVocale++;
                }
            }
        }

        //CASO Nominativo di 2 caratteri == Si aggiungono X
        if(strlen($nominativo) == 2){
            array_push($cf, "X");
        }

        return join("", $cf);
    }

    function getConsonantiVocali($nominativo){
        $consonanti = [];
        $vocali = [];

        foreach(str_split($nominativo) as $lettera){
            if(preg_match('/[AEIOU]/', $lettera)){
                array_push($vocali, $lettera);
            }else{
                array_push($consonanti, $lettera);
            }
        }
        return array("consonanti"=>$consonanti, "vocali"=>$vocali);
    }


    function annoNascita($anno){
        $anno = substr($anno, 2);
        return $anno;
    }
    function meseNascita($mese){
        $lettereMese = ["A", "B", "C", "D", "E", "H", "L", "M", "P", "R", "S", "T"];
        return $lettereMese[$mese-1];
    }
    function giornoNascita($giorno, $sesso){
        $giorno = $giorno + ($sesso == "M" ? 0 : 40);
        return $giorno < 10 ? "0".$giorno : $giorno;
    }
    function dataNascita($dataNascita, $sesso){
        $data = explode("-", $dataNascita);
        return annoNascita($data[0]).meseNascita($data[1]).giornoNascita($data[2], $sesso);
    }

    
    function luogoNascita($luogoNascita){
        return getCode($luogoNascita);
    }


    function carattereControllo($cf){
        $caratteri = ['A', 'B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','0','1','2','3','4','5','6','7','8','9'];
        $conversioneDispari = [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,0,1,2,3,4,5,6,7,8,9];
        $conversionePari = [1,0,5,7,9,13,15,17,19,21,2,4,18,20,11,3,6,8,12,14,16,10,22,25,24,23,1,0,5,7,9,13,15,17,19,21];
        $conversione = ['A','B','C','D','E','F','G','H','I','J', 'K', 'L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];

        $somma = 0;
        for($i=0; $i<strlen($cf); $i++){
            if($i%2){
              $somma += $conversioneDispari[array_search($cf[$i], $caratteri)];  
            }else{
              $somma += $conversionePari[array_search($cf[$i], $caratteri)]; 
            }
        }

        return $conversione[$somma%26];
    }
?>