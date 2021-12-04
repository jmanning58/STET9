<?php

require '../model/users_db.php';
require('../model/reports_db.php');
require('../model/nests_db.php');
require_once('../model/tasks_db.php');

$selectAction = 'assign_v';///////////needed?

//LIST SELECTED TASK
if(!isset($ID)){
    $ID = filter_input(INPUT_POST, 'ID'); //RNID
}
if(!isset($taskType)){
    $taskType = filter_input(INPUT_POST, 'taskType'); //task object type
}

$selectedObject;
$showAssign = FALSE;
if ($taskType == 'Report') {
    $selectedObject = makeReportObject(get_report_by_id($ID)) ;
    $objectType = 'Report';
    $columnNames = REPORT_COLUMNS;
} else {
    $selectedObject = makeReportObject(get_nest_by_id($ID));
    $objectType = 'Nest';
    $columnNames = NEST_COLUMNS;
}
if(empty($ReassignTaskTID)){$ReassignTaskTID = filter_input(INPUT_POST, 'ReassignTaskTID');}
$selectMessage = (empty($ReassignTaskTID)) ? "$taskType to assign" : "$taskType to re-assign";



include 'view/selectedObject_v.php';
$selectMessage = NULL;



$showAssign = NULL;
$selectedObject = NULL;
//LIST WORKERS

if(empty($ReassignTaskTID)){
    $workers = getWorkerInfo();
} else {
    $workers = getWorkerInfo_exclude_uid(get_uid_of_task($ReassignTaskTID));
}

$objectType = 'Worker';
$columnNames = WORKER_COLUMNS;
$WID = filter_input(INPUT_POST, 'WID');



$objects = makeObjects($objectType, $workers, $WID);
if (isset($WID)) {
    $selectedObject = array_pop($objects);
    $selectMessage = 'Selected worker';
}
if (empty($objects)) {
    if (isset($selectedObject)) {
        $listMessage = 'No more workers';
    } else {
        $listMessage = 'No workers';
    }
    $emptyList = TRUE;
} else {
    $listMessage = 'Worker list';
}

