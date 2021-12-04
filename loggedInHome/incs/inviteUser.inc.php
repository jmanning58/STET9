<?php
require '../phpMailer/emailFuncitons.php';
require '../model/users_db.php';
require '../model/invitations_db.php';


$email = $_POST['email'];
$userType = $_POST['userType'];




$seed = str_split('abcdefghijklmnopqrstuvwxyz'
                 .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                 .'0123456789!@#$%^&*()'); // and any other characters
shuffle($seed); // probably optional since array_is randomized; this may be redundant
$rand = '';
foreach (array_rand($seed, 7) as $k){
  $rand .= $seed[$k];
}

$hash = password_hash($rand, PASSWORD_DEFAULT);






add_user($email, $userType);
add_invitation($email, $hash);

$link = "http://www.localhost/STET9/index.php?action=loginFirstTime_v&hash=$hash";



$recipiants = array();
$recipiants[]= $email;
$subject = 'Create Account';
$body = 'Please click the following link to create your account: '.$link;
send_email($recipiants, $subject, $body);
