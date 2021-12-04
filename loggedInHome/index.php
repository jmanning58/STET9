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
    case 'reasign_v':
        require('../model/tasks_db.php');
        $ReassignTaskTID = filter_input(INPUT_POST, 'ID');
        $taskType = filter_input(INPUT_POST, 'taskType');
        $ID = get_rnid_of_task($ReassignTaskTID);
        include 'incs/assign_v.inc.php';
        include 'view/viewObjects_v.php';
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
    case 'manageUsers':
        include'incs/manageUsers.inc.php';
        echo'<a href="index.php?action=addUser_v">Add User</a>';
        include 'view/viewObjects_v.php';
        break;
    case 'addUser_v':
        include'view/addUser_v.php';
        break;
    case 'addUser':
        include'incs/inviteUser.inc.php';
        header('Location: .?action=manageUsers');
        break;
    case 'alterUser':
        include'incs/alterUser.inc.php';
        header('Location: .?action=manageUsers');
        break;
}