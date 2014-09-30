<?php
	
	$getal 	= 	1; 
	$dagVanDeWeek ="";
          
    if ( $getal == 1 ) 
    { 
        $dagVanDeWeek = 'maandag'; 
    } 
      
    if ( $getal == 2 ) 
    { 
        $dagVanDeWeek = 'dinsdag'; 
    } 
      
    if ( $getal == 3 ) 
    { 
        $dagVanDeWeek = 'woensdag'; 
    } 
      
    if ( $getal == 4 ) 
    { 
        $dagVanDeWeek = 'donderdag'; 
    } 
      
    if ( $getal == 5 ) 
    { 
        $dagVanDeWeek = 'vrijdag'; 
    } 
      
    if ( $getal == 6 ) 
    { 
        $dagVanDeWeek = 'zaterdag'; 
    } 
      
    if ( $getal == 7 ) 
    { 
        $dagVanDeWeek = 'zondag'; 
    } 
	
    $dagVanDeWeek 	=	strtoupper( $dagVanDeWeek );
    $positieLaatsteA    =   strrpos( $dagVanDeWeek, 'A' );
    $dagVanDeWeek 	        =	substr_replace( $dagVanDeWeek, 'a', $positieLaatsteA, 1 );

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Oplossing conditional statements: deel1</title>
	</head>
	<body>
        
        <h1>Oplossing conditional statements: deel1</h1>

		<p>De dag die overeenkomt met het getal "1" is: <?= $dagVanDeWeek ?></p>
	</body>
</html>