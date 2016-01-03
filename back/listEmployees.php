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
    $query = "SELECT *  FROM  getAllEmployeeList()";
    $result = sqlsrv_query( $conn , $query);
    $rows = array();

    for($i = 0; ; $i++ ){
        $temp = sqlsrv_fetch_array($result);
        if($temp == '') break;
        $rows[$i] = $temp;
    }

    echo json_encode($rows);
}
else{
    echo json_encode('sqlConnectionError');
}
?>