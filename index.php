<?php
/*
 *
 * Created by PhpStorm.
 * Author: Mohammad Eslahi Sani
 * Date: 04/10/1394
 * Time: 8:57 PM
 */
ini_set('display_errors','Off');
session_start();
//print_r($_SESSION);

?>

<html>

<head>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">

    <script type="application/javascript" src="js/jquery-2.1.4.js"></script>
    <script type="application/javascript" src="js/main.js"></script>
</head>


<?php
include_once 'login.php';
//print_r(session_save_path());
//ini_set();
if($_SESSION['login']){
    switch($_SESSION['login']['role']){
        case 'contEmp':
            include_once 'roles/contractorEmployee.php';
            break;
        case 'partTimeEmp':
        	include_once 'roles/partTimeEmployee.php';
        	break;
        case 'ceo':
        	include_once 'roles/ceo.php';
        	break;
        case 'director':
        	include_once 'roles/manager.php';
        	break;
        case 'humanRes':
        	include_once 'roles/humanResource.php';
        	break;
        case 'officialEmp':
        	include_once 'roles/officialEmployee.php';
        	break;
        case 'sysAdmin':
        	include_once 'roles/sysAdmin.php';
        	break;					
        default:
            include_once 'roles/contractorEmployee.php';

    }
}

?>