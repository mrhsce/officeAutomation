<?php
/**
 * Created by PhpStorm.
 * User: Mohammad
 * Date: 1/4/2016
 * Time: 11:58 AM
 */

include_once "functions.php";

$conn = dbConnect();
if($conn){
    file_put_contents('debug.txt',print_r('connected to database, ready for registering',true),FILE_APPEND);

    $query = "";
    //TODO return the list of all the employee under the command of the boss
    $query =
    "EXEC  addEmployee '". $inputData['firstName']. "',"
    ."'".$inputData['lastName']."',"
    ."'".$inputData['nationalId']."',"
    ."'".$inputData['birthDate']."',"
    ."'".$inputData['sodoorPlace']."',"
    ."'".$inputData['maritalStatus']."',"
    ."'".$inputData['gender']."',"
    ."".$inputData['childrenNumber'].","
    ."'".$inputData['contractId']."',"
    ."'".$inputData['startDate']."',"
    ."'".$inputData['expireDate']."',"
    ."'".$inputData['postId']."',"
    ."'".$inputData['officeId']."',"
    ."'".$inputData['contractType']."',"
    ."'".$inputData['eduLevel']."',"
    ."'".$inputData['field']."',"
    ."'".$inputData['institute']."',"
    ."'".$inputData['graduationDate']."',"
    ."'".$inputData['projectTitle']."',"
    ."".$inputData['average'].","
    ."'".$inputData['personalId']."',"
    ."'".$inputData['managerId']."',"
    ."'".$inputData['username']."',"
    ."'".$inputData['pass']."',"
    ."'".$inputData['role']."';";
    exec('echo # >> debug.txt');
    file_put_contents('debug.txt',print_r($query,true),FILE_APPEND);


    $result = sqlsrv_query( $conn , $query);
    $rows = sqlsrv_fetch_array($result);
    exec('echo # >> debug.txt');
    file_put_contents('debug.txt',print_r('ANS OF REGISTERING',true),FILE_APPEND);
    exec('echo # >> debug.txt');
    file_put_contents('debug.txt',print_r($rows,true),FILE_APPEND);
    exec('echo # >> debug.txt');

    if($rows=='')  echo json_encode(0);
    echo json_encode($rows);
}
else{
    echo json_encode('sqlConnectionError');
}
?>