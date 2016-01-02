<?php
/**
 * Created by PhpStorm.
 * User: mrhs
 * Date: 1/2/2016
 * Time: 7:47 AM
 */
$conn = dbConnect();
if($conn){
    $query = "";
    //TODO shows the list of all the manager titles
    //$query = "SELECT *  FROM  getSalaries('". $inputData['personalId']. "')";
    $result = sqlsrv_query( $conn , $query);
    $row = sqlsrv_fetch_array($result);

    echo json_encode($row);
}
else{
    echo json_encode('sqlConnectionError');
}
?>