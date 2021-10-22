<?php

function add_report($cityName, $streetAddress, $accessNum, $description){
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
function get_reports(){
    global $db;
    $query = 'SELECT * FROM reports';
    $statement = $db->prepare($query);
    $statement->execute();
    $reports = $statement->fetchAll();
    $statement->closeCursor();
    return $reports;         
}
function get_report_by_id($ID){
    global $db;
    $query = 'SELECT * FROM reports WHERE NID = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $ID);
    $statement->execute();
    $report = $statement->fetch();
    $statement->closeCursor();
    return $report; 
    
    
}
