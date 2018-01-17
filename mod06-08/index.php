<?php

require_once 'assets/lib/twelve_days.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">

	<title><?php echo getTitle(); ?> Lyrics</title>

	<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>

	<?php

	echo getLyrics(1);

	?>

	<script src="js/script.js"></script>
</body>
</html>