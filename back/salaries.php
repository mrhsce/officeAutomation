<?php
/**
 * Created by PhpStorm.
 * User: Mohammad
 * Date: 12/26/2015
 * Time: 3:50 PM
 */
$conn = dbConnect();
if($conn){
    $query = "";
    $query = "SELECT *  FROM  getSalaries('". $inputData['personalId']. "')";
    $result = sqlsrv_query( $conn , $query);
    $row = sqlsrv_fetch_array($result);

    echo json_encode($row);
}
else{
    echo json_encode('sqlConnectionError');
}
?>