<?php

function add_report($cityName, $streetAddress, $accessNum, $description) {
    global $db;
    $query = 'INSERT INTO reports (cityName, streetAddress, accessNum, description) VALUES (:cn, :sa, :an, :des)';
    $statement = $db->prepare($query);
    $statement->bindValue(':cn', $cityName);
    $statement->bindValue(':sa', $streetAddress);
    $statement->bindValue(':an', $accessNum);
    $statement->bindValue(':des', $description);
    $statement->execute();
    $statement->closeCursor();
}

function get_reportst_sorted($sortBy) {
    //echo'hhhh '; echo "SELECT * FROM reports AS r WHERE NOT EXISTS (SELECT * FROM nests AS n WHERE n.RID = r.RID) ORDER BY $sortBy"; exit();
    global $db;
    $query = 'SELECT * FROM reports AS r WHERE NOT EXISTS (SELECT * FROM nests AS n WHERE n.RID = r.RID) ORDER BY cityName';
    $statement = $db->prepare($query);
    $statement->bindValue(':sb', $sortBy);
    $statement->execute();
    $reports = $statement->fetchAll();
    $statement->closeCursor();
    return $reports;
}
function get_reports() {
    global $db;
    $query = 'SELECT * FROM reports AS r WHERE NOT EXISTS (SELECT * FROM nests AS n WHERE n.RID = r.RID)';
    $statement = $db->prepare($query);
    $statement->execute();
    $reports = $statement->fetchAll();
    $statement->closeCursor();
    return $reports;
}

function get_report_by_id($ID) {
    global $db;
    $query = 'SELECT * FROM reports WHERE RID = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $ID);
    $statement->execute();
    $report = $statement->fetch();
    $statement->closeCursor();
    return $report;
}

function delete_report_by_id($ID) {
    global $db;
    $query = 'DELETE FROM reports WHERE RID = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $ID);
    $statement->execute();
    $statement->closeCursor();
}
