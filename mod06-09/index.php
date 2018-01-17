<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">

	<title>GET, POST and SESSIONS</title>

	<link rel="stylesheet" type="text/css" href="">

</head>
<body>
	<?php
	 
	 // $userName = $_GET['username'];
	 // $password = $_GET['password'];
	
	 // $userName = htmlspecialchars($_GET['username']);
	 // $password = htmlspecialchars($_GET['password']);
	 // $firstname = htmlspecialchars($_GET['firstname']);

	 // echo $userName. '<br>';
	 // echo $password. '<br>';
	 // echo $firstname;

	
	?>


	<!-- for GET request -->
	<!-- <form method="GET" action="lib/validate.php">
		<label for="username">Username</label>
		<input type="text" name="username" id="username">
		
		<label for="password">Password</label>
		<input type="password" name="password" id="password">
		
		<label for="firstname">Firstname</label>
		<input type="text" name="firstname" id="firstname">

		<input type="submit" name="submit" value="Submit">
	</form> -->


		<form method="POST" action="lib/validate.php">
		<label for="username">Username</label>
		<input type="text" name="username" id="username">
		
		<label for="password">Password</label>
		<input type="password" name="password" id="password">
		
		<label for="firstname">Firstname</label>
		<input type="text" name="firstname" id="firstname">

		<input type="submit" name="submit" value="Submit">
	</form>

</body>
</html>