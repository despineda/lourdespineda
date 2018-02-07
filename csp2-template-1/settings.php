<?php

session_start();

function getTitle() {
	echo 'Settings | Beeer Web App';
}

include 'partials/head.php';

$file = file_get_contents('assets/users.json');
$users = json_decode($file, true);

?>

</head>
<body>

	<header>
	<?php

	require 'partials/main_navigation.php';
	
	?>
	</header>

	<main class="wrapper">
		<h1>Settings</h1>

		<table>
			<thead>
				<th>Username</th>
				<th>Password</th>
				<th>Role</th>
			</thead>
			<tbody>
			<?php

			foreach ($users as $key => $value) {
				echo '
					<tr>
						<td><a href="user.php?id=' . $key . '">' . $value['username'] . '</a></td>
						<td>' . $value['password'] . '</td>
						<td>' . $value['role'] . '</td>
					</tr>
				';
			}

			?>
			</tbody>
		</table>
	</main> <!-- /.wrapper -->

	<footer>
	<?php

	include 'partials/footer.php';
	
	?>
	</footer>

<?php

include 'partials/foot.php';

?>