<?php
/**
 * Created by PhpStorm.
 * User: Mohammad
 * Date: 12/26/2015
 * Time: 3:42 PM
 */
include_once 'functions.php';
session_start();
$inputs = file_get_contents('php://input',false);
$inputData = json_decode($inputs,true);


switch($inputData['task']){
    case 'statement':
        include_once 'statement.php';
        break;
    default:
        break;
}




?>