<?php


if(!isset($_SESSION['login'])){
	header("Location: index.php");
	exit();	
}
else{
	?>
	<html>
	<head >
		<script type="application/javascript" src="js/jquery-2.1.4.js"></script>
    	<script type="application/javascript" src="js/main.js"></script>
		<title>contractor employee main page</title>
	</head>
	<body>
		<h3>welcome <?php if($_SESSION['login']['gender'] == "M") echo "Mr "; else echo "Ms";
		?> <?php echo "".$_SESSION['login']['firstName']." ".$_SESSION['login']['lastName'] ?>;</h3>

		<!-- Showing personal info -->
		<button type="button" onclick="alert('page1 should open')">Show personal info</button>
		<!-- Showing satement -->
		<button type="button" onclick="alert('page2 should open')">Show the statement</button>
		<!-- Showing salaries -->
		<button type="button" onclick="alert('page3 should open')">Show salaries</button>

		<hr>

		<button type="button" onclick="alert('login page should open')">Log out</button>	

	</body>
	<?php
}
?>



