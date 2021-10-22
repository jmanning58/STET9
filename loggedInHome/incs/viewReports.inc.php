<?php
require('../model/reports_db.php');

$reports = get_reports();
$objectType = 'Report';
$selectAction = 'viewReports';
$ID = filter_input(INPUT_POST, 'ID');
$columnNames = REPORT_COLUMNS;

$objects = makeObjects($objectType, $reports, $ID);
if (isset($ID)) {
  $selectedObject = array_pop($objects);  
} 

