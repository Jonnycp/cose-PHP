<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
<title>Meteo</title>
<link rel="shortcut icon" href="./static/images/favicon.png" type="image/png">

<?php
    function convert2image($clima){
        $clima = strtoupper($clima);

        switch ($clima) {
            case 'SERENO':
                return './static/images/sun.gif';
            case 'PIOGGIA':
                return './static/images/rain.gif';
            case 'VENTOSO':
                return './static/images/wind.gif';
            case 'UMIDO':
                return './static/images/drop.gif';
            case 'FOSCHIA':
                return './static/images/foggy.gif';
            default:
                return '';
        }
    };
?>