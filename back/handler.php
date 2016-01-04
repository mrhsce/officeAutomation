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

    case 'personalInfo':
        include_once 'personalInfo.php';
        break;

    case 'allList':
        include_once 'listEmployees.php';
        break;

    case 'salaries':
        include_once 'salaries.php';
        break;

    case 'register':
        include_once 'register.php';
        break;

    case 'logout':
        session_destroy();
        echo json_encode('1');
        break;
    default:
        break;
}




?>