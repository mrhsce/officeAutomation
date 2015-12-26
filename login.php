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
    $query = 'select COUNT(*) as d from sysUser';


    $result = sqlsrv_query( $conn , $query);

    if (!$result)
        die( print_r( sqlsrv_errors(), true));

    while( $row = sqlsrv_fetch_array( $result))
    {
        echo $row['d'];
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