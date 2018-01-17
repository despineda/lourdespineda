<?php

/*for GET -- super global variable*/
// $username = htmlspecialchars($_GET['username']);
// $password = htmlspecialchars($_GET['password']);
// $firstname = htmlspecialchars($_GET['firstname']);


$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);
$firstname = htmlspecialchars($_POST['firstname']);

echo "
	<h3>Username: $username</h3>
	<h3>Password: $password</h3>
	<h3>$firstname Welcome to PHP world!</h3>
";

