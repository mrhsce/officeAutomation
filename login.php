<?php
/**
 * Created by PhpStorm.
 * User: Mohammad Eslahi Sani
 * Date: 04/10/1394
 * Time: 9:06 PM
 */

if(isset($_SESSION['login'])){

}
elseif(isset($_POST['username']) && isset($_POST['password'])){
    $u = $_POST['username'];
    $p = $_POST['password'];
    exec("echo username and password are: $u --- $p >> debug.txt");

    $server = 'MMDES';

    // Connect to MSSQL
    $link = mssql_connect($server);

    if (!$link) {
        die('Something went wrong while connecting to MSSQL');
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