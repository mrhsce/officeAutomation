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
<div class="main">
    <h3>welcome <?php if($_SESSION['login']['gender'] == "M") echo "Mr "; else echo "Ms";
        ?> <?php echo "".$_SESSION['login']['firstName']." ".$_SESSION['login']['lastName'] ?>;</h3>

    <hr>
    <h4>Personal panel</h4>
    <!-- Showing personal info -->
    <button class="show-personalInfo" type="button" >Show personal info</button>
    <!-- Showing statement -->
    <button class="show-statement" type="button" >Show the statement</button>
    <!-- Showing salaries -->
    <button class="show-salaries" type="button" >Show salaries</button>

    <hr>
    <h4>ceo panel</h4>
    <!-- List all the employees -->
    <button class="show-employeeList" type="button" >List all the employees</button>
    <!-- Showing offices -->
    <button class="show-offices" type="button" >Show offices</button>
    <!-- Showing posts -->
    <button class="show-posts" type="button" >Show Posts</button>
    <!-- Showing basic tables -->
    <button class="show-basicTables" type="button" >Show Basic tables</button>
    <hr>

    <button class="logout" type="button">Log out</button>

</div>

<div class="show-employeeList" style="display: none;">

</div>

<div class="show-offices" style="display: none;">

</div>

<div class="show-posts" style="display: none;">

</div>

<div class="show-basicTables" style="display: none;">

</div>

<div class="show-statement" style="display: none;">
    <span>Personal Id</span>
    <span class="personalId"></span>
    <table class="personalInfo" style="border: 1px;">
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
            <td class="maritalStatus"></td>
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
            <th>Children</th>
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
            <td class="children"></td>
            <td class="years"></td>
        </tr>
        </tbody>
    </table>
</div>

<div class="show-personalInfo" style="display: none;">
    <span>Personal Information</span>
    <span class="personalId"></span>
    <table class="personalInfo" style="border: 1px;">
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

        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="firstName"></td>
            <td class="lastName"></td>
            <td class="birthDate"></td>
            <td class="sodoorPlace"></td>
            <td class="nationalId"></td>
            <td class="maritalStatus"></td>
            <td class="gender"></td>
            <td class="childrenNumber"></td>

        </tr>
        </tbody>
    </table>

    <hr>

    <table class="educationInfo">
        <thead>
        <tr>
            <th>Education Level</th>
            <th>Filed</th>
            <th>Institute</th>
            <th>Graduation Date</th>
            <th>Final Project Title</th>
            <th>Average</th>

        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="eduLevel"></td>
            <td class="field"></td>
            <td class="institute"></td>
            <td class="graduationDate"></td>
            <td class="finalProjectTitle"></td>
            <td class="average"></td>
        </tr>
        </tbody>
    </table>
</div>


<div class="show-salary" style="display: none;">
    <span>Salary Information</span>
    <span class="personalId"></span>

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
            <th>Children</th>
            <th>Years</th>
            <th>Sum</th>

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
            <td class="children"></td>
            <td class="years"></td>
            <td class="sum"></td>
        </tr>
        </tbody>
    </table>
</div>

</body>
<?php
}
?>



