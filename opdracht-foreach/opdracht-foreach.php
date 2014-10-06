<?php 


$text = file_get_contents('text-file.txt');

$textChars = str_split($text);

rsort($textChars);

$textCharReversed = array_reverse($textChars);

$tellerArray = array();


foreach($textCharReversed as $value)
  {
    if ( isset ( $tellerArray[ $value ] ) )
    {
      ++$tellerArray[ $value ];
    }
    else
    {
      $tellerArray[ $value ] = 1;
    }
    
  }
?>
<!DOCTYPE html>
<html>
	<head>
		<title>PHP oefening 015 - oplossing</title>
	</head>
	<body>

		<h1>Array van Z naar A</h1>
		<pre><?php var_dump($textChars) ?></pre>

		<h1>Array reversed</h1>
    <pre><?php var_dump($textCharReversed) ?></pre>
		

		<h1>Array reversed</h1>
    <pre><?php var_dump($tellerArray) ?></pre>
		
		
	</body>
</html>