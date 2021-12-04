<?php

require('model/database.php');

$error_msg = filter_input(INPUT_GET, 'error_msg');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'loginOrReportNest';
    }
}

switch ($action) {
    case 'loginOrReportNest':
        include 'view/home_v.php';
        break;
    case 'reportNestView':
        include 'view/reportNest_v.php';
        break;
    case 'reportNest':
        include 'incs/reportNest.inc.php';
        break;
    case 'login_v':
        include 'view/login_v.php';
        break;
    case 'login':
        include 'incs/login.inc.php'; //this then may then include loggedinHome/index or login_v agian with an error message.
        break;
    case 'loginFirstTime_v':
        include 'incs/loginFirstTime_v.inc.php'; //this then may then include loggedinHome/index or login_v agian with an error message.
        break;
    case 'loginFirstTime':
        include 'incs/loginFirstTime.inc.php'; //this then may then include loggedinHome/index or login_v agian with an error message.
        include 'incs/login.inc.php';
        break;
}

