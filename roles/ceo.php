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

<?php } elseif(!!isset($_GET['pId'])){ ?>
    <div class="container pId-main">
        <div class="container col col-lg-6">
            <div class="row center-align"> Personal Information</div>
            <hr>
            <div class="row">
                <div class="col col-lg-6 right-align">
                    Name
                </div>
                <div class="col col-lg-6 for-firstName">

                </div>
            </div>

            <div class="row">
                <div class="col col-lg-6 right-align">
                    Family
                </div>
                <div class="col col-lg-6 for-lastName">

                </div>
            </div>

            <div class="row">
                <div class="col col-lg-6 right-align">
                    Gender
                </div>
                <div class="col col-lg-6 for-gender">

                </div>
            </div>

            <div class="row">
                <div class="col col-lg-6 right-align">
                    Birth Date
                </div>
                <div class="col col-lg-6 for-birthDate">

                </div>
            </div>

            <div class="row">
                <div class="col col-lg-6 right-align">
                    Born Place
                </div>
                <div class="col col-lg-6 for-bornPlace">

                </div>
            </div>

            <div class="row">
                <div class="col col-lg-6 right-align">
                    National ID
                </div>
                <div class="col col-lg-6 for-nationalId">

                </div>
            </div>

            <div class="row">
                <div class="col col-lg-6 right-align">
                    Marital Status
                </div>
                <div class="col col-lg-6 for-maritalStatus">

                </div>
            </div>

            <div class="row">
                <div class="col col-lg-6 right-align">
                    Children Number
                </div>
                <div class="col col-lg-6 for-childrenNumber">

                </div>
            </div>

        </div>


        <div class="container col col-lg-6">
            <div class="row center-align"> Education Information</div>
            <hr>
            <div class="row">
                <div class="col col-lg-6 right-align">
                    Education Level
                </div>
                <div class="col col-lg-6 for-eduLevel">

                </div>
            </div>

            <div class="row">
                <div class="col col-lg-6 right-align">
                    Field
                </div>
                <div class="col col-lg-6 for-field">

                </div>
            </div>

            <div class="row">
                <div class="col col-lg-6 right-align">
                    Institute
                </div>
                <div class="col col-lg-6 for-institute">

                </div>
            </div>

            <div class="row">
                <div class="col col-lg-6 right-align">
                    Graduation Date
                </div>
                <div class="col col-lg-6 for-graduationDate">

                </div>
            </div>

            <div class="row">
                <div class="col col-lg-6 right-align">
                    Final Project Title
                </div>
                <div class="col col-lg-6 for-finalProjectTitle">

                </div>
            </div>

            <div class="row">
                <div class="col col-lg-6 right-align">
                    Average
                </div>
                <div class="col col-lg-6 for-average">

                </div>
            </div>

        </div>


    </div>

<?php } elseif(!!isset($_GET['salary'])){ ?>
    <div class="container salary-main">
        <div class="row center-align">
            <?php if($_SESSION['login']['gender'] == "M") echo "Mr "; else echo "Ms";
            ?> <?php echo "".$_SESSION['login']['firstName']." ".$_SESSION['login']['lastName'] ?>
        </div>

        <div class="row">
            <div class="col col-lg-6 right-align">
                Personal ID
            </div>
            <div class="col col-lg-6">
                <?php echo $_SESSION['login']['personalId'] ?>
            </div>
        </div>
        <br>
        <div class="row center-align"> Salary Information</div>
        <hr>


        <div class="row">
            <div class="col col-lg-6 right-align">
                Base Salary
            </div>
            <div class="col col-lg-6 for-base">

            </div>
        </div>
        <div class="row">
            <div class="col col-lg-6 right-align">
                Management Score
            </div>
            <div class="col col-lg-6 for-mScore">

            </div>
        </div>
        <div class="row">
            <div class="col col-lg-6 right-align">
                Post Score
            </div>
            <div class="col col-lg-6 for-pScore">

            </div>
        </div>
        <div class="row">
            <div class="col col-lg-6 right-align">
                Adding
            </div>
            <div class="col col-lg-6 for-adding">

            </div>
        </div>
        <div class="row">
            <div class="col col-lg-6 right-align">
                Additional
            </div>
            <div class="col col-lg-6 for-additional">

            </div>
        </div>
        <div class="row">
            <div class="col col-lg-6 right-align">
                Bad Climate
            </div>
            <div class="col col-lg-6 for-badClimate">

            </div>
        </div>
        <div class="row">
            <div class="col col-lg-6 right-align">
                Hardness
            </div>
            <div class="col col-lg-6 for-hardness">

            </div>
        </div>
        <div class="row">
            <div class="col col-lg-6 right-align">
                Family Score
            </div>
            <div class="col col-lg-6 for-familyScore">

            </div>
        </div>
        <div class="row">
            <div class="col col-lg-6 right-align">
                Children
            </div>
            <div class="col col-lg-6 for-children">

            </div>
        </div>
        <div class="row">
            <div class="col col-lg-6 right-align">
                Years
            </div>
            <div class="col col-lg-6 for-years">

            </div>
        </div>
        <div class="row">
            <div class="col col-lg-6 right-align">
                Sum
            </div>
            <div class="col col-lg-6 for-sum">

            </div>
        </div>
    </div>

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
                <button class="show-personalInfo" type="button" > <a href="?pId">Show personal info</a> </button>
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
                <button class="show-salaries" type="button" >
                <a href="?salary">Show salaries</a>
                </button>
            </div>
        </div>

        <hr>

        <div class="container statement-brief">
            <div class="row">
                <!-- Showing statement -->
                <button class="show-statement" type="button" ><a href="?statement">Show the statement</a></button>
            </div>
        </div>

    </div>

<?php } ?>



</body>
<?php
}
?>



