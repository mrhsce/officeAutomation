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
    echo '<br />login before';
}
elseif(isset($_POST['username']) && isset($_POST['password'])){
    $u = $_POST['username'];
    $p = $_POST['password'];
    exec("echo username and password are: $u --- $p >> debug.txt");

    $serverName = "MMDES"; //serverName\instanceName

// Since UID and PWD are not specified in the $connectionInfo array,
// The connection will be attempted using Windows Authentication.
    $connectionInfo = array( "Database"=>"officeAutomation");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);

    if( $conn ) {
        echo "Connection established.<br />";
    }else{
        echo "Connection could not be established.<br />";
        die( print_r( sqlsrv_errors(), true));
    }


    $query = "";
    $query = "SELECT *  FROM  sysUser  WHERE  Username='".$u . "'";


    $result = sqlsrv_query( $conn , $query);

    if (!$result)
        die( print_r( sqlsrv_errors(), true));

    $row = sqlsrv_fetch_array($result);
    if( $row['Password'] == $p ){
        echo('login successfully');
        $query2 = "SELECT firstName,lastName,Gender  FROM  Person JOIN Employee on Person.NationalID=Employee.NationalID  WHERE  PersonalID='".$row['PersonalID'] . "'";
        $result2 = sqlsrv_query( $conn , $query2);

        if (!$result2)
            die( print_r( sqlsrv_errors(), true));

        $row2 = sqlsrv_fetch_array($result2);
//        print_r($row2);

        $tempAry=array('username'=>$row['Username'],'role'=>$row['Role'],'personalId'=>$row['PersonalID'],
            'firstName'=>$row2['firstName'],'lastName'=>$row2['lastName'],'gender'=>$row2['Gender']);
        $_SESSION['login'] = $tempAry;

//        print_r($_SESSION);
    }
    else{
        echo('username or password is invalid');
    }

}
else{
?>
<html>

<head>
    <script type="application/javascript" src="js/jquery-2.1.4.js"></script>
    <script type="application/javascript" src="js/main.js"></script>
</head>
<body>
    <form method="post" class="login-form">
        <label>Username</label>
        <input type="text" name="username" class="username-input"><br />

        <label>Password</label>
        <input type="password" name="password" class="password-input"><br />

        <button type="submit" class="submit-button">Login</button>
    </form>
</body>
</html>
<?php } ?>