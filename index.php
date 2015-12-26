<?php
/*
 *
 * Created by PhpStorm.
 * Author: Mohammad Eslahi Sani
 * Date: 04/10/1394
 * Time: 8:57 PM
 */
//echo'session is:';
session_start();
//print_r($_SESSION);

include_once 'login.php';

if($_SESSION['login']){
    switch($_SESSION['login']['role']){
        case 'contEmp':
            include_once 'roles/contractorEmployee.php';
            break;
        default:
            include_once 'roles/contractorEmployee.php';

    }
}

?>