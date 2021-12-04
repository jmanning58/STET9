<?php

require('../model/nests_db.php');

$nests = get_nests();
$objectType = 'Nest';
$selectAction = 'viewNests';
$ID = filter_input(INPUT_POST, 'ID');
$columnNames = NEST_COLUMNS;

$objects = makeObjects($objectType, $nests, $ID);
if (isset($ID)) {
    $selectedObject = array_pop($objects);
    $selectMessage = 'Selected nest';
}
if (empty($objects)) {
    if (isset($selectedObject)) {
        $listMessage = 'No more nests';
    } else {
        $listMessage = 'No nests';
    }
    $emptyList = TRUE;
} else {
    $listMessage = 'Nest list';
}
