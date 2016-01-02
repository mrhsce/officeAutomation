<?php
/**
 * Created by PhpStorm.
 * User: Mohammad Eslahi Sani
 * Date: 04/10/1394
 * Time: 9:06 PM
 */
//dl('php_pdo_sqlsrv_55_ts.dll');


// phpinfo();

if(isset($_SESSION['login'])){

}
elseif(isset($_POST['username']) && isset($_POST['password'])){
    $u = $_POST['username'];
    $p = $_POST['password'];
//    exec("echo username and password are: $u --- $p >> debug.txt");

    $serverName = "MMDES"; //serverName\instanceName

// Since UID and PWD are not specified in the $connectionInfo array,
// The connection will be attempted using Windows Authentication.
    $connectionInfo = array( "Database"=>"officeAutomation");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);

    if( $conn ) {
//        echo "Connection established.<br />";
    }else{
//        echo "Connection could not be established.<br />";
//        die( print_r( sqlsrv_errors(), true));
        exec("echo connection was not established >> debug.txt");

    }


    $query = "";
    $query = "SELECT *  FROM  sysUser  WHERE  Username='".$u . "'";


    $result = sqlsrv_query( $conn , $query);

    if (!$result)
        die( print_r( sqlsrv_errors(), true));

    $row = sqlsrv_fetch_array($result);
    if( $row['Password'] == $p ){
        $query2 = "SELECT firstName,lastName,Gender  FROM  Person JOIN Employee on Person.NationalID=Employee.NationalID  WHERE  PersonalID='".$row['PersonalID'] . "'";
        $result2 = sqlsrv_query( $conn , $query2);

        if (!$result2)
            die( print_r( sqlsrv_errors(), true));

        $row2 = sqlsrv_fetch_array($result2);
//        print_r($row2);

        $tempAry=array('username'=>$row['Username'],'role'=>$row['Role'],'personalId'=>$row['PersonalID'],
            'firstName'=>$row2['firstName'],'lastName'=>$row2['lastName'],'gender'=>$row2['Gender']);
        $_SESSION['login'] = $tempAry;
        header('location: ');

//        print_r($_SESSION);
    }
    else{
        header('location: ?invalid');
        die();
    }

}
elseif (isset($_GET['invalid'])){
    ?>
    <body>

    <div class="container sign-in-container">
        <p class="invalid-text">Invalid username or password,<br> Try again!</p>

        <form method="post" class="form-signin login-form">
            <h2 class="form-signin-heading">Please sign in</h2>
            <label  for="inputEmail" class="sr-only">Username</label>
            <input name="username" type="text" id="inputEmail" class="username-input form-control" placeholder="Username" required autofocus>
            <label for="inputPassword" class="password-input sr-only">Password</label>
            <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
            <button class="submit-button btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </form>

    </div> <!-- /container -->


    </body>
    </html>
    <?php
}
else{
?>

<body>

    <div class="container sign-in-container">

        <form method="post" class="form-signin login-form">
            <h2 class="form-signin-heading">Please sign in</h2>
            <label  for="inputEmail" class="sr-only">Username</label>
            <input name="username" type="text" id="inputEmail" class="username-input form-control" placeholder="Username" required autofocus>
            <label for="inputPassword" class="password-input sr-only">Password</label>
            <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>

            <button class="submit-button btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </form>

    </div> <!-- /container -->


</body>
</html>
<?php } ?>