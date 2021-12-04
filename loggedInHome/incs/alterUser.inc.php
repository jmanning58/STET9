<?php
require'../model/users_db.php';
require'../model/tasks_db.php';
require'../model/invitations_db.php';
$UID = filter_input(INPUT_POST, 'ID');
$manageAction = filter_input(INPUT_POST, 'manageAction');

$user = get_userInfo_by_uid($UID);

if($manageAction == deleteUser){
    delete_user_by_uid($UID);
    delete_invitation_by_email($user['email']);
} else {

    if($user['userType'] == 0){
        delete_tasks_for_worker($UID);
        $type = 1;
    } else {
        $type = 0;
    }
    set_userType_by_uid($UID, $type);
}

