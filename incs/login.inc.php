<?php
require_once('model/users_db.php');
$key = filter_input(INPUT_POST, 'key');
if(empty($key)){
    $key = $fuserName;
}
$pass = filter_input(INPUT_POST, 'pass');
if(empty($pass)){
    $pass = $fpass;
}
$userInfo = get_userInfo($key);

if(empty($userInfo) || password_verify($pass, $userInfo['passWord']) === false){
    echo'wrong Pass';
    $error_msg ="Username/Email or pass not recognized.";
     header("Location: .?action=login_v&error_msg=$error_msg");
} else {
    session_start();
    $_SESSION["UID"] = $userInfo['UID'];
    $_SESSION["USERNAME"] = $userInfo['userName'];
    $_SESSION["UTYPE"] = $userInfo['userType'];

    header("Location: loggedInHome/index.php");
}



