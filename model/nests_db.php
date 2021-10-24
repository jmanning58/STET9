<?php

function add_nest($RID, $SID, $eggNum) {
    global $db;
    $query = 'INSERT INTO nests (RID, SID, eggNum) VALUES (:r, :s, :e)';
    $statement = $db->prepare($query);
    $statement->bindValue(':r', $RID);
    $statement->bindValue(':s', $SID);
    $statement->bindValue(':e', $eggNum);
    $statement->execute();
    $statement->closeCursor();
}

function get_nests() {
    global $db;
    $query = 'SELECT * FROM (nests NATURAL JOIN reports)';
    $statement = $db->prepare($query);
    $statement->execute();
    $nests = $statement->fetchAll();
    $statement->closeCursor();
    return $nests;
}

function get_rid_of_nest_by_id($NID) {
    global $db;
    $query = 'SELECT RID FROM nests WHERE NID = :nid';
    $statement = $db->prepare($query);
    $statement->bindValue(':nid', $NID);
    $statement->execute();
    $RID = $statement->fetch();
    $statement->closeCursor();
    return $RID[0];
}

function get_nest_by_id($NID) {
    global $db;
    $query = 'SELECT * FROM (nests NATURAL JOIN reports) WHERE NID = :nid';
    $statement = $db->prepare($query);
    $statement->bindValue(':nid', $NID);
    $statement->execute();
    $nest = $statement->fetch();
    $statement->closeCursor();
    return $nest;
}

function delete_nest_by_id($NID) {
    global $db;
    $query = 'DELETE FROM nests WHERE NID = :nid';
    $statement = $db->prepare($query);
    $statement->bindValue(':nid', $NID);
    $statement->execute();
    $nest = $statement->fetch();
    $statement->closeCursor();
    return $nest;
}
