<?php
function add_user($email, $userType) {
    global $db;
    $query = 'INSERT INTO users (email, userType) VALUES (:e, :t)';
    $statement = $db->prepare($query);
    $statement->bindValue(':e', $email);
    $statement->bindValue(':t', $userType);
    $statement->execute();
    $statement->closeCursor();
}
function delete_user_by_uid($UID) {
    global $db;
    $query = 'DELETE FROM users WHERE UID = :uid';
    $statement = $db->prepare($query);
    $statement->bindValue(':uid', $UID);
    $statement->execute();
    $nest = $statement->fetch();
    $statement->closeCursor();
    return $nest;
}
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
function update_user($email,$userName,$hashedPass){
    global $db;
    $query = 'UPDATE users SET userName =:un, passWord=:pw  WHERE  email = :e';
    $statement = $db->prepare($query);
    $statement->bindValue(':e', $email);
    $statement->bindValue(':un', $userName);
    $statement->bindValue(':pw', $hashedPass);
    $statement->execute();
    $statement->closeCursor();
    return;
}
function set_userType_by_uid($UID, $userType){
    global $db;
    $query = 'UPDATE users SET userType =:t WHERE  UID = :uid';
    $statement = $db->prepare($query);
    $statement->bindValue(':uid', $UID);
    $statement->bindValue(':t', $userType);
    $statement->execute();
    $statement->closeCursor();
    return;
}
function get_UserInfo_exclude($uid){
    global $db;
    $query = 'SELECT * FROM `users` WHERE UID != :k ';
    $statement = $db->prepare($query);
    $statement->bindValue(':k', $uid);
    $statement->execute();
    $users = $statement->fetchAll();
    $statement->closeCursor();
    return $users;

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
    $workerInfo = $statement->fetchAll();
    $statement->closeCursor();
    return $workerInfo;

}

function getWorkerInfo_exclude_uid($UID){
    global $db;
    $query = 'SELECT UID, username FROM users WHERE userType = 0 AND UID != :uid';
    $statement = $db->prepare($query);
    $statement->bindValue(':uid', $UID);
    $statement->execute();
    $userInfo = $statement->fetchAll();
    $statement->closeCursor();
    return $userInfo;

}

