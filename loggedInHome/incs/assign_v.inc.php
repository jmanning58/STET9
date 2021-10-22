<?php
require '../model/users_db.php';
require('../model/reports_db.php');

$selectAction = 'assign_v';
//LIST SELECTED TASK TOOOOOOODOOOOOOOOOOOOOOO
$ID = filter_input(INPUT_POST, 'ID');//TASK ID 
$taskType = filter_input(INPUT_POST, 'taskType');//task object type

//LIST WORKERS
$workers = getWorkerInfo();
$objectType = 'Worker';
$columnNames = WORKER_COLUMNS;
$WID = filter_input(INPUT_POST, 'WID');

$objects = makeObjects($objectType, $workers, $WID);
if (isset($WID)) {
    //echo' WID is: '. $WID;
  $selectedObject = array_pop($objects);  
} 

