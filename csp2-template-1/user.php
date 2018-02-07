<?php

session_start();

function getTitle() {
	echo 'User | Beeer Web App';
}

include 'partials/head.php';

$id = $_GET['id'];  // get id from query string

$file = file_get_contents('assets/users.json');
$users = json_decode($file, true);

$user = $users[$id];  // get details of current user based on id

?>

</head>
<body>

	<header>
	<?php

	require 'partials/main_navigation.php';
	
	?>
	</header>

	<main class="wrapper">
		<h1>User</h1>

		<label>Username</label>
		<input type="text" name="username" value="<?php echo $user['username']; ?>" disabled>

		<label>Password</label>
		<input type="password" name="password" value="<?php echo $user['password']; ?>" disabled>

		<label>Role</label>
		<input type="text" name="role" value="<?php echo $user['role']; ?>" disabled>

		<button>Edit</button>
		<button>Delete</button>
	</main> <!-- /.wrapper -->

	<footer>
	<?php

	include 'partials/footer.php';
	
	?>
	</footer>

<?php

include 'partials/foot.php';

?>