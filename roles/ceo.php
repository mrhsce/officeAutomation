<?php


if(!isset($_SESSION['login'])){
    header("Location: index.php");
    exit();
}
else{
?>
<body>


<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Office Automation</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

                <?php if(!isset($_GET['managerPanel'])){ ?>
                <li class="active"><a href="?home">Home</a></li>
                <li ><a href="?managerPanel">Manager Panel <span class="sr-only">(current)</span></a></li>
                <li><a type="button" class="btn btn-default">Add Employee</a></li>
                <?php } else{ ?>
                <li ><a href="?home">Home</a></li>
                <li class="active"><a href="?managerPanel">Manager Panel <span class="sr-only">(current)</span></a></li>
                <li><a type="button" class="btn btn-default">Add Employee</a></li>
                <?php } ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a style="color:cornflowerblue">
                    Welcome <?php if($_SESSION['login']['gender'] == "M") echo "Mr "; else echo "Ms";
                    ?> <?php echo "".$_SESSION['login']['firstName']." ".$_SESSION['login']['lastName'] ?>
                    </a>
                </li>
                <li><a class="logout-link" href="#">Logout</a></li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<?php if(!!isset($_GET['managerPanel'])){ ?>
    <!-- List all the employees -->
    <button class="show-employeeList" type="button" >List all the employees</button>
    <!-- Showing offices -->
    <button class="show-offices" type="button" >Show offices</button>
    <!-- Showing posts -->
    <button class="show-posts" type="button" >Show Posts</button>
    <!-- Showing basic tables -->
    <button class="show-basicTables" type="button" >Show Basic tables</button>
<?php } else{ ?>

    <div class="container ceo-home-main">
        <div class="container info-brief">
            <div class="row">
                Name: <?php echo $_SESSION['login']['firstName'] ?>
            </div>
            <div class="row">
                Last Name: <?php echo $_SESSION['login']['lastName'] ?>
            </div>
            <div class="row">
                Gender: <?php if($_SESSION['login']['gender']=='M') echo 'Male'; else echo "Female" ;?>
            </div>
            <div class="row">
                <!-- Showing personal info -->
                <button class="show-personalInfo" type="button" >Show personal info</button>
            </div>

        </div>

        <hr>

        <div class="container contract-brief">
            <div class="row pid">
                PersonalId: <?php echo $_SESSION['login']['personalId'] ?>
            </div>
            <div class="row sum-salary">
                Salary:
            </div>
            <div class="row">
                <!-- Showing salaries -->
                <button class="show-salaries" type="button" >Show salaries</button>
            </div>
        </div>

        <hr>

        <div class="container statement-brief">
            <div class="row">
                <!-- Showing statement -->
                <button class="show-statement" type="button" >Show the statement</button>
            </div>
        </div>

    </div>

<?php } ?>



</body>
<?php
}
?>



