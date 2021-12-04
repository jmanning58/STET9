<?php

function get_hatchTime_by_NID($NID){

    global $db;
    $query = 'SELECT * FROM nesthatchtime WHERE NID = :nid )';
    $statement = $db->prepare($query);
    $statement->bindValue(':nid', $NID);
    $statement->execute();
    $tuple = $statement->fetch();
    $statement->closeCursor();
    return $tuple['hatchTime'];
}
function make_hatchTime($NID, $timeStamp){

    global $db;
    $query = 'INSERT INTO nesthatchtime (NID, hatchTime) VALUES (:nid, :ht)';
    $statement = $db->prepare($query);
    $statement->bindValue(':nid', $NID);
    $statement->bindValue(':ht', $timeStamp);
    $statement->execute();
    $statement->closeCursor();

}

