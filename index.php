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
        case 'partTimeEmp':
        	include_once 'roles/partTimeEmployee.php';
        	break;
        case 'ceo':
        	include_once 'roles/ceo.php';
        	break;
        case 'director':
        	include_once 'roles/director.php';
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