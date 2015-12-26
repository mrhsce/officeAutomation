<?php


if(!isset($_SESSION['login'])){
	header("Location: index.php");
	exit();	
}
else{
	?>
	<html>
	<head >
		<script type="application/javascript" src="../js/jquery-2.1.4.js"></script>
    	<script type="application/javascript" src="../js/main.js"></script>
		<title>contractor employee main page</title>
	</head>
	<body>
		<h3>welcome <?php if($_SESSION['login']['gender'] == "M") echo "Mr "; else echo "Ms";
		?> <?php echo "".$_SESSION['login']['firstName']." ".$_SESSION['login']['lastName'] ?>;</h3>

		<!-- Showing personal info -->
		<button class="show-info" type="button" >Show personal info</button>
		<!-- Showing statement -->
		<button class="show-statement" type="button" >Show the statement</button>
		<!-- Showing salaries -->
		<button class="show-salary" type="button" >Show salaries</button>

		<hr>

		<button class="logout" type="button">Log out</button>

	</body>
	<?php
}
?>



