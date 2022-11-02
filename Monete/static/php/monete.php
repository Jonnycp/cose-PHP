<?php
function calcolaMonete($centesimi){
    $possibili = [200, 100, 50, 20, 10, 5, 2, 1];

    $monete = [];
        foreach ($possibili as $possibile) {
            $occorrenze = floor($centesimi / $possibile);
            $centesimi = $centesimi - $occorrenze*$possibile;

            for ($i=0; $i < $occorrenze; $i++) { 
                array_push($monete, $possibile);
            }
        }

        return $monete;
    }
?>