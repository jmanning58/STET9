<?php

function add_task($ID, $UID, $type){
    global $db;
    $query = 'INSERT INTO tasks (RNID, UID, type) VALUES (:id, :uid, :t)';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $ID);
    $statement->bindValue(':uid', $UID);
    $statement->bindValue(':t', $type);
    $statement->execute(); 
    $statement->closeCursor();
}
function get_tasks(){
   global $db;
   $query = 'SELECT * FROM tasks';
   $statement = $db->prepare($query);
   $statement->execute(); 
   $tasks = $statement->fetchAll();
   $statement->closeCursor();
   return $tasks;
    
}
function get_tasks_for_worker($WID){
   global $db;
   $query = 'SELECT * FROM tasks WHERE UID = :uid';
   $statement = $db->prepare($query);
   $statement->bindValue(':uid', $WID);
   $statement->execute(); 
   $tasks = $statement->fetchAll();
   $statement->closeCursor();
   return $tasks; 
}
function get_rnid_of_task($TID){
   global $db;
   $query = 'SELECT RNID FROM tasks WHERE TID = :tid';
   $statement = $db->prepare($query);
   $statement->bindValue(':tid', $TID);
   $statement->execute(); 
   $task = $statement->fetch();
   $statement->closeCursor();
   return $task[0]; 
    
    
}