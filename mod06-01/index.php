<?php
	// echo "Welcome to PHP programming!";

	// phpinfo();

	// $name = "Juan Dela Cruz";

	// print "Good evening, $name";

	// echo "Today is " . date("F j, Y") . ".";	

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, intial-scale=1.0, maximum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">

	<title>Welcome to PHP programming!</title>
</head>
<body>

	<?php
		// $msg = "Welcome to PHP programming!";
		// echo "$msg";
		
		// $username = 'Jane Smith';
		// echo $username;
		// echo '<br>';
		// $username = 'John Doe';
		// $current_user = $username;
		// echo $current_user;

		
		// echo 'Buzz Lightyear once said: "You\'re a toy!"<br>';

		// echo 'You deleted c:\\*.*<br>';
		// echo 'You deleted c:\*.*';

		// echo "This will not expand: \n a newline";

		// $number1 = 150;
		// $number2 = 33.5;

		// $sum = $number1 + $number2;
		// $product = $number1 * $number2;
		// $difference = $number1 - $number2;
		// $qoutient = $number1 / $number2;

		// echo "sum is: $sum" . '<br>';
		// echo "Product is: $product"; . '<br>';
		// echo "Difference is: $difference" . '<br>';
		// echo"Quotient is: $qoutient" . '<br>';

		// echo 'Sum is: $sum';

		// $members = array('Kato', 'Shem', 'Angeli', 'Ali', 'Carmela');
		// $colors = array('red', 'green', 'blue');
		// $fruits = array('mango', 'apple', 'orange');

		// echo $members[4];
		// echo $colors[0];
		// echo $fruits[1];
		// echo $fruits[2];

	define("USER_NAME", "Juan Dela Cruz");
	$current_user = USER_NAME;
	echo $current_user;
	?>

</body>
</html>