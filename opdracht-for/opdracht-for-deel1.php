<?php

    $getallen       =   array();
    $aantalGetallen =   100;

    for ( $getal = 0; $getal < $aantalGetallen; ++$getal )
    {
        $getallen[] =   $getal;
    }

    $getallenReeks  =   implode( ', ', $getallen );

    /*

    */

    $getallen2  =   array();
    for ( $getal = 0; $getal < $aantalGetallen; ++$getal )
    {
        if ( $getal % 3 == 0 && $getal > 40 && $getal < 80 )
        {
            $getallen2[]    =   $getal;
        }
    }

    $getallenReeks2 =   implode( ', ', $getallen2 );
?>
    

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Oplossing for: deel1</title>

    </head>
    <body>
        
        <h1>Oplossing for: deel1</h1>

        <p>Getallenreeks1: <?= $getallenReeks ?></p>

        <p>Getallenreeks2: <?= $getallenReeks2 ?></p>

    </body>
</html>