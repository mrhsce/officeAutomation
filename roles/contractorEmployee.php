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
	<div class="main">
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

	</div>


	<div class="show-statement" style="display: none;">
		<span>Personal Id</span>
		<span class="personalId"></span>
		<table class="personalInfo">
			<thead>
			<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Birth Date</th>
				<th>Sodoor Place</th>
				<th>NationalId</th>
				<th>Marital State</th>
				<th>Gender</th>
				<th>Children Number</th>
				<th>Education Level</th>

			</tr>
			</thead>
			<tbody>
			<tr>
				<td class="firstName"></td>
				<td class="lastName"></td>
				<td class="birthDate"></td>
				<td class="sodoorPlace"></td>
				<td class="nationalId"></td>
				<td class="maritalState"></td>
				<td class="gender"></td>
				<td class="childrenNumber"></td>
				<td class="eduLevel"></td>
			</tr>
			</tbody>
		</table>

		<hr>

		<table class="contractInfo">
			<thead>
			<tr>
				<th>Contract Type</th>
				<th>Post Title</th>
				<th>Office Title</th>
				<th>Manager Id</th>

			</tr>
			</thead>
			<tbody>
			<tr>
				<td class="contractType"></td>
				<td class="postTitle"></td>
				<td class="officeTitle"></td>
				<td class="managerId"></td>
			</tr>
			</tbody>
		</table>

		<hr>

		<table class="salaryInfo">
			<thead>
			<tr>
				<th>Management Score</th>
				<th>Post Score</th>
				<th>Base</th>
				<th>Adding</th>
				<th>Additional</th>
				<th>Bad Climate</th>
				<th>Hardness</th>
				<th>Family Score</th>
				<th>Children Number</th>
				<th>Years</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td class="mScore"></td>
				<td class="pScore"></td>
				<td class="base"></td>
				<td class="adding"></td>
				<td class="additional"></td>
				<td class="badClimate"></td>
				<td class="hardness"></td>
				<td class="familyScore"></td>
				<td class="childrenNumber"></td>
				<td class="years"></td>
			</tr>
			</tbody>
		</table>
	</div>

	</body>
	<?php
}
?>



