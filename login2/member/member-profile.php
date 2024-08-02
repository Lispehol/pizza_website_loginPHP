<?php
	require_once('../../login2/auth.php');

	//Include database connection details
	require_once('../../php/config.php');

	$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link) {
		die('Failed to connect to server: ' . mysqli_error());
	}

	//Select database
	$db = mysqli_select_db($link, DB_DATABASE);
	if(!$db) {
		die("Unable to select database");
	}
?>
<html>
	<head>
		<title>My Profile</title>
		<link href="pizza.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />
	</head>
<body>
	<a href="member-index.php">Home</a> | <a href="../logout.php">Logout</a>
	<div class="container">
		
		<h1>Minun tilaukseni</h1><br>
		<?php 
		$email = $_SESSION['SESS_EMAIL'];
		$results = mysqli_query($link, "SELECT * FROM tilaus where email = '$email' order by ID DESC");
		$orders = mysqli_fetch_all($results, MYSQLI_ASSOC);

		?>

		<p>Tehdyt tilaukset viimeisin ylimpänä:</p>

					
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" id="tilaukseni">
		<?php foreach ($orders as $order): ?>
			<label class="tilatut" for="id"  >Tilauspäivä:<?php echo $order['aika']; ?></label><br>
			<label class="tilatut" for="id" >Pitsa:<?php echo $order['pitsa']; ?> </label><br>
			<label class="tilatut" for="id" >Koko:<?php echo $order['koko']; ?> </label><br><br>
			<?php endforeach; ?>
		</form>



		<?php
		$link->close();
		?>
	</div>
</body>
</html>
