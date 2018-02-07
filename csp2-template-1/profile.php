<?php

session_start();

function getTitle() {
	echo 'Profile | Beeer Web App';
}

include 'partials/head.php';

?>

</head>
<body>

	<header>
	<?php

	require 'partials/main_navigation.php';
	
	?>
	</header>

	<main class="wrapper">
		<h1>Profile</h1>
	</main> <!-- /.wrapper -->

	<footer>
	<?php

	include 'partials/footer.php';
	
	?>
	</footer>

<?php

include 'partials/foot.php';

?>