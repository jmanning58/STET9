<?php

require('../model/users_db.php');
$selectAction = 'manageUsers';
$users = get_UserInfo_exclude($_SESSION["UID"]);
$objectType = 'User';
$ID = filter_input(INPUT_POST, 'ID');
$columnNames = USER_COLUMNS;

$objects = makeObjects($objectType, $users, $ID);
if (isset($ID)) {
  $selectedObject = array_pop($objects);
  $selectMessage = 'Selected user';
}
if (empty($objects)) {
    if (isset($selectedObject)) {
        $listMessage = 'No more users';
    } else {
        $listMessage = 'No other users';
    }
    $emptyList = TRUE;
} else {
    $listMessage = 'User list';
}


