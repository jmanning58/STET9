<?php
require 'model/invitations_db.php';
$hash = filter_input(INPUT_GET, 'hash');
if($hash == NULL){
    $hash = filter_input(INPUT_POST, 'hash');
}
if(get_invitation_by_hash($hash) == NULL){
    die('You have a fishy hash.');
}
include 'view/loginFirstTime_v.php';
