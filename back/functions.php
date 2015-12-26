<?php
/**
 * Created by PhpStorm.
 * User: Mohammad
 * Date: 12/26/2015
 * Time: 3:51 PM
 */



function dbConnect(){
    $serverName = "MMDES"; //serverName\instanceName

// Since UID and PWD are not specified in the $connectionInfo array,
// The connection will be attempted using Windows Authentication.
    $connectionInfo = array( "Database"=>"officeAutomation");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);

    return $conn;
}










?>