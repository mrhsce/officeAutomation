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
                    <li><a type="button" href="?add" class="btn btn-default">Add Employee</a></li>
                    <?php if(!isset($_GET['home']) and !isset($_GET['add'])){ ?>
                        <li><a type="button" class="btn btn-default export-btn">Export The Page</a></li>
                    <?php } ?>
                <?php } else{ ?>
                    <li ><a href="?home">Home</a></li>
                    <li class="active"><a href="?managerPanel">Manager Panel <span class="sr-only">(current)</span></a></li>
                    <li><a type="button"  href="?add" class="btn btn-default">Add Employee</a></li>
                    <?php if(!isset($_GET['home']) and !isset($_GET['add'])){ ?>
                        <li><a type="button" class="btn btn-default export-btn">Export The Page</a></li>
                    <?php } ?>
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

    <div class="container all-employee-table-container table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>National ID</th>
                <th>Personal ID</th>
                <th>Contract Type</th>
                <th>Post</th>
                <th>Office Unit</th>
                <th>Education Level</th>
            </tr>
            </thead>
            <tbody>

            </tbody>

        </table>
    </div>



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
        <hr>
        <div class="row">
            <div class="col col-lg-6 right-align">
                Sum
            </div>
            <div class="col col-lg-6 for-sum">

            </div>
        </div>
    </div>
<?php } elseif(!!isset($_GET['statement'])){ ?>
    <div class="container">

        <div class="container pId-main col col-lg-8">
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

        <div class="container salary-main col col-lg-4">
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
            <hr>
            <div class="row">
                <div class="col col-lg-6 right-align">
                    Sum
                </div>
                <div class="col col-lg-6 for-sum">

                </div>
            </div>
        </div>




    </div>
<?php } elseif(!!isset($_GET['add'])){ ?>
    <div class="container-fluid">
    <form class="add-employee-form" method="get">
        <div class="container-fluid row">

            <div class="container-fluid col col-lg-3">
                <div class="row center-align">
                    Personal Information
                </div>

                <hr>

                <div class="container-fluid row">
                    <label class="right-align col col-lg-6" for="firstName">First Name</label>
                    <input class="col col-lg-6" name="firstName" id="firstName" type="text">

                </div>

                <div class="container-fluid row">
                    <label class="right-align col col-lg-6" for="lastName">Last Name</label>
                    <input class="col col-lg-6" name="lastName" id="lastName" type="text">
                </div>

                <div class="container-fluid row">
                    <label class="right-align col col-lg-6" for="gender">Gender</label>
                    <select class="col col-lg-6" name="gender" id="gender">
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                    </select>
                </div>

                <div class="container-fluid row">
                    <label class="right-align col col-lg-6" for="nationalId">National ID</label>
                    <input class="col col-lg-6" name="nationalId" id="nationalId" type="text">
                </div>

                <div class="container-fluid row">
                    <label class="right-align col col-lg-6" for="birthDate">Birth Date</label>
                    <input class="col col-lg-6" name="birthDate" id="birthDate" type="date">
                </div>

                <div class="container-fluid row">
                    <label class="right-align col col-lg-6" for="sodoorPlace">Born City</label>
                    <input class="col col-lg-6" name="sodoorPlace" id="sodoorPlace" type="text">
                </div>


                <div class="container-fluid row">
                    <label class="right-align col col-lg-6" for="maritalStatus">Marital Status</label>
                    <select class="col col-lg-6" name="maritalStatus" id="maritalStatus">
                        <option value="M">Married</option>
                        <option value="S">Single</option>
                    </select>
                </div>


                <div class="container-fluid row">
                    <label class="right-align col col-lg-6" for="childrenNumber">Children Number</label>
                    <input class="col col-lg-6" name="childrenNumber" id="childrenNumber" type="number">

                </div>



            </div>

            <div class="container-fluid col col-lg-3">
                <div class="row center-align">
                    Education Information
                </div>

                <hr>

                <div class="container-fluid row">
                    <label class="right-align col col-lg-6" for="eduLevel">Education Level</label>
                    <select class="col col-lg-6" name="eduLevel" id="eduLevel">
                        <option value="Associate">Associate</option>
                        <option value="Bachelor">Bachelor</option>
                        <option value="Diploma">Diploma</option>
                        <option value="Elementery">Elementery</option>
                        <option value="Master">Master</option>
                        <option value="Ph.D">Ph.D</option>
                    </select>
                </div>

                <div class="container-fluid row">
                    <label class="right-align col col-lg-6" for="field">Field</label>
                    <input class="col col-lg-6" name="field" id="field" type="text">
                </div>

                <div class="container-fluid row">
                    <label class="right-align col col-lg-6" for="institute">Institute</label>
                    <input class="col col-lg-6" name="institute" id="institute" type="text">
                </div>

                <div class="container-fluid row">
                    <label class="right-align col col-lg-6" for="graduationDate">Graduation Date</label>
                    <input class="col col-lg-6" name="graduationDate" id="graduationDate" type="date">
                </div>

                <div class="container-fluid row">
                    <label class="right-align col col-lg-6" for="projectTitle">ProjectTitle</label>
                    <input class="col col-lg-6" name="projectTitle" id="projectTitle" type="text">
                </div>

                <div class="container-fluid row">
                    <label class="right-align col col-lg-6" for="average">Average</label>
                    <input class="col col-lg-6" name="average" id="average" type="number">
                </div>



            </div>

            <div class="container col col-lg-3">
                <div class="row center-align">
                    Contract Information
                </div>

                <hr>

                <div class="container-fluid row">
                    <label class="right-align col col-lg-6" for="contractId">Contract ID</label>
                    <input class="col col-lg-6" name="contractId" id="contractId" type="text" value="10101010">
                </div>

                <div class="container-fluid row">
                    <label class="right-align col col-lg-6" for="personalId">Personal ID</label>
                    <input class="col col-lg-6" name="personalId" id="personalId" type="text" value="10101010">
                </div>


                <div class="container-fluid row">
                    <label class="right-align col col-lg-6" for="startDate">Start Date</label>
                    <input class="col col-lg-6" name="startDate" id="startDate" type="date">
                </div>

                <div class="container-fluid row">
                    <label class="right-align col col-lg-6" for="expireDate">Expire Date</label>
                    <input class="col col-lg-6" name="expireDate" id="expireDate" type="date">
                </div>

                <div class="container-fluid row">
                    <label class="right-align col col-lg-6" for="postId">Post</label>
                    <select class="col col-lg-6" name="postId" id="postId">
                        <option value="01">Developer</option>
                        <option value="02">Service</option>
                        <option value="03">Operator</option>
                        <option value="04">High Developer</option>
                        <option value="05">Analyzer</option>
                        <option value="06">High Analyzer</option>
                        <option value="07">Net Engineer</option>
                        <option value="08">Hardware Engineer</option>
                    </select>
                </div>

                <div class="container-fluid row">
                    <label class="right-align col col-lg-6" for="officeId">Office</label>
                    <select class="col col-lg-6" name="officeId" id="officeId">
                        <option value="01">User Interface</option>
                        <option value="02">Back</option>
                        <option value="03">Security</option>
                        <option value="04">Official</option>
                        <option value="05">Android</option>
                    </select>
                </div>


                <div class="container-fluid row">
                    <label class="right-align col col-lg-6" for="managerId">Manager</label>
                    <select class="col col-lg-6" name="managerId" id="managerId">
                        <option value="0">Chief</option>
                        <option value="1">Director</option>
                        <option value="2">Assistant</option>
                        <option value="3">Office Manager</option>
                        <option value="4">Team Header</option>
                    </select>
                </div>


                <div class="container-fluid row">
                    <label class="right-align col col-lg-6" for="contractType">Contract Type</label>
                    <select class="col col-lg-6" name="contractType" id="contractType">
                        <option value="formal">Formal</option>
                        <option value="contractual">Contractual</option>
                        <option value="partTime">Part Time</option>
                    </select>
                </div>



            </div>




            <div class="container-fluid col col-lg-3">
                <div class="row center-align">
                    User Information
                </div>
                <hr>

                <div class="container-fluid row">
                    <label class="right-align col col-lg-6" for="username">Username</label>
                    <input class="col col-lg-6" name="username" id="username" type="text">
                </div>

                <div class="container-fluid row">
                    <label class="right-align col col-lg-6" for="pass">Password</label>
                    <input class="col col-lg-6" name="pass" id="pass" type="password">
                </div>

                <div class="container-fluid row">
                    <label class="right-align col col-lg-6" for="role">Role</label>
                    <select class="col col-lg-6" name="role" id="role">
                        <option value="ceo">Manager</option>
                        <option value="contractorEmployee">Employee</option>
                    </select>
                </div>



            </div>

        </div>

        <hr>

        <div class="container-fluid center-align row">
            <button type="submit">Register</button>
        </div>


        <!--        <div class="row">  </div>-->
    </form>
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



