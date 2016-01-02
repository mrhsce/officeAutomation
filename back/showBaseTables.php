<?php
/**
 * Created by PhpStorm.
 * User: mrhs
 * Date: 1/2/2016
 * Time: 7:33 AM
 * This part shows the info about all the basic yables -- in fact it list all of em
 */

$conn = dbConnect();
if($conn){
    $query = "";
    //TODO write the query for this part
    //$query = "SELECT *  FROM  getSalaries('". $inputData['personalId']. "')";
    $result = sqlsrv_query( $conn , $query);
    $row = sqlsrv_fetch_array($result);

    echo json_encode($row);
}
else{
    echo json_encode('sqlConnectionError');
}
?>