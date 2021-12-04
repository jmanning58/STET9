<?php

function get_species_data() {
    global $db;
    $query = 'SELECT * FROM species';
    $statement = $db->prepare($query);
    $statement->execute();
    $speciesInfo = $statement->fetchAll();
    $statement->closeCursor();
    return $speciesInfo;
}
function get_species_days($SID){
    global $db;
    $query = 'SELECT gestationDays FROM species WHERE SID = :sid';
    $statement = $db->prepare($query);
     $statement->bindValue(':sid', $SID);
    $statement->execute();
    $days = $statement->fetch();
    $statement->closeCursor();
    return $days;
}
