<?php
require_once'model/users_db.php';
require'model/invitations_db.php';
$error_msg = '';
$fpass = filter_input(INPUT_POST, 'pass');
$fuserName = filter_input(INPUT_POST, 'userName');
$passR = filter_input(INPUT_POST, 'passR');
$hash = filter_input(INPUT_POST, 'hash');
if($fpass != $passR){
    $error_msg .= 'Passwords do not match.';
}

if(!empty($error_msg)){
    header("Location: .?action=loginFirstTime_v&hash=$hash&error_msg=$error_msg");
}
update_user(get_invitation_by_hash($hash)['email'], $fuserName, password_hash($fpass, PASSWORD_DEFAULT));
delete_invitation_by_hash($hash);