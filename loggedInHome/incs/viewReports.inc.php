<?php
require('../model/reports_db.php');


$objectType = 'Report';
$selectAction = 'viewReports';
$sortByOptions = array();
$sortByOptions[] = 'city';
$sortByOptions[] = 'date';
$ID = filter_input(INPUT_POST, 'ID');
$columnNames = REPORT_COLUMNS;

$sortBy = filter_input(INPUT_POST, 'sortBy');
if(empty($sortBy)){
    $reports = get_reports();
} else {

    switch($sortBy){
        case 'city':

            $reports = get_reportst_sorted('cityname');
            break;
        case 'date':
            $reports = get_reportst_sorted('datetime');
            break;
    }
}

$objects = makeObjects($objectType, $reports, $ID);
if (isset($ID)) {
  $selectedObject = array_pop($objects);
  $selectMessage = 'Selected report';
}
if (empty($objects)) {
    if (isset($selectedObject)) {
        $listMessage = 'No more reports';
    } else {
        $listMessage = 'No reports';
    }
    $emptyList = TRUE;
} else {
    $listMessage = 'Report list';
}

