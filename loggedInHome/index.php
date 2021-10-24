<?php

session_start();
if (!isset($_SESSION["UID"])) {
    header("Location: ../view/accesDenied.html");
}
require 'objectMakingFunctions.php';
require('../model/database.php');
$error_msg = filter_input(INPUT_GET, 'error_msg');

$action = '';
if (empty($action)) {
    $action = filter_input(INPUT_POST, 'action');
    if (empty($action)) {
        $action = filter_input(INPUT_GET, 'action');
        if (empty($action)) {
            if ($_SESSION["UTYPE"] == 0) {
                $action = 'viewTasks';
            } else {
                $action = 'adminHome';
            }
        }
    }
}


//echo $action;
switch ($action) {
    case 'adminHome':
        include 'view/adminHome_v.php';
        break;
    case 'viewReports':
        include 'incs/viewReports.inc.php';
        include 'view/viewObjects_v.php';
        break;
    case 'assign_v':
        include 'incs/assign_v.inc.php';
        include 'view/viewObjects_v.php';
        break;
    case 'assign':
        include 'incs/assign.inc.php';
        include 'view/adminHome_v.php';
        break;
    case 'viewTasks':
        include 'incs/viewTasks.inc.php';
        include 'view/viewObjects_v.php';
        break;
    case 'completeTask_v':
        include 'incs/completeTask_v.inc.php';
        break;
    case 'createNest':
        include'incs/createNest.php';
        break;
    case 'viewNests':
        include'incs/viewNests.inc.php';
        include 'view/viewObjects_v.php';
        break;
}