<?php

function getTitle() {
	return '12 Days of Christmas';
}

function getLyrics($day) {

	$days = array('first', 'second', 'third', 'fourth', 'fifth', 'sixth', 'seventh', 'eigth', 'ninth', 'tenth', 'elevent', 'twelfth');

	$gifts = array(
		'A partride in a pear tree',
		'Two turtle doves',
		'Three French hens',
		'Four calling birds',
		'Five golden rings',
		'Six geese a-laying',
		'Seven swans a-swimming',
		'Eight maids a-milking',
		'Nine ladies dancing',
		'Ten lords a-leaping',
		'Eleven pipers piping',
		'Twelve drummers drumming'
	);

	for ($i = 0; $i < count($days); $i++) {
		echo '<div id="day' . $i . '">';
		echo 'On the' . $days[$i] . ' day of Christmas my true love gave to me<br>';

		if ($i == 0) //first day
			echo $gifts[$i] . '<br>';
		else //days 2 to 12
			for ($j = $i; $j >= 0; $j--) {
				if ($j == 0)
					echo'and' . $gifts[$j] . '<br>';
				else
				echo $gifts[$j] . '<br>'; 
			
			}
	}


/*    $font = new SWFFont("day");
  	  $text = new SWFText();
   	 	$text->setFont($font);
   		 $text->moveTo(300, 500);
   			$text->setColor(0, 0xff, 0);
    		$text->setHeight(200);

    $movie = new SWFMovie();
    $movie->setDimension(6400, 4800);

    $displayitem = $movie->add($text);

    for($i = 0; $i < 100; ++$i) {
        $displayitem->rotate(-1);
        $displayitem->scale(1.01, 1.01);
        $movie->nextFrame();
    }

    header('Content-type: application/x-shockwave-flash');
    $movie->output();
*/
}