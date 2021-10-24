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
