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
    $query = "SELECT *  FROM  getStatement('". $inputData['personalId']. "')";
    $result = sqlsrv_query( $conn , $query);
    echo json_encode($result);
}
else{
    echo json_encode('sqlConnectionError');
}
?>