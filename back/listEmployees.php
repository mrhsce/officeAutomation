<?php
/**
 * Created by PhpStorm.
 * User: mrhs
 * Date: 1/2/2016
 * Time: 7:20 AM
 */
$conn = dbConnect();
if($conn){
    $query = "";
    //TODO return the list of all the employee under the command of the boss
    //$query = "SELECT *  FROM  getSalaries('". $inputData['personalId']. "')";
    $result = sqlsrv_query( $conn , $query);
    $row = sqlsrv_fetch_array($result);

    echo json_encode($row);
}
else{
    echo json_encode('sqlConnectionError');
}
?>