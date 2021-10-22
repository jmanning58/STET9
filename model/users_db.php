<?php

function get_userInfo($key){
    global $db;
    $query = 'SELECT * FROM `users` WHERE userName = :k OR email = :k';
    $statement = $db->prepare($query);
    $statement->bindValue(':k', $key);
    $statement->execute();
    $userInfo = $statement->fetch();
    $statement->closeCursor();
    return $userInfo;         
}
function get_userInfo_by_uid($UID){
    global $db;
    $query = 'SELECT * FROM `users` WHERE UID = :uid';
    $statement = $db->prepare($query);
    $statement->bindValue(':uid', $UID);
    $statement->execute();
    $userInfo = $statement->fetch();
    $statement->closeCursor();
    return $userInfo;         
}
function updatePass($key, $pass){
    global $db;
    $query = 'UPDATE users SET passWord = :p WHERE userName = :k OR email = :k';
    $statement = $db->prepare($query);
    $statement->bindValue(':k', $key);
    $statement->bindValue(':p', $pass);
    $statement->execute();
    $statement->closeCursor();
}
function matchPass($key, $pass){
    global $db;
    $query = 'SELECT userName FROM `users` WHERE (userName = :k OR email = :k) AND password = :p';
    $statement = $db->prepare($query);
    $statement->bindValue(':k', $key);
    $statement->bindValue(':p', $pass);
    $statement->execute();
    $userInfo = $statement->fetch();
    $statement->closeCursor();
    if(empty($userInfo)){return false;}
    return true;   
}
function getWorkerInfo(){
    global $db;
    $query = 'SELECT UID, username FROM users WHERE userType = 0';
    $statement = $db->prepare($query);
    $statement->execute();
    $userInfo = $statement->fetchAll();
    $statement->closeCursor();
    return $userInfo; 
    
}

