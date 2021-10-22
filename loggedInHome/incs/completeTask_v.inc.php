<?php


$taskType = filter_input(INPUT_POST, 'taskType');
$TID = filter_input(INPUT_POST, 'ID');//TASK ID
if($taskType == 'Report'){
    require('../model/reports_db.php');
    require('../model/tasks_db.php');
    
    $rid = get_rnid_of_task($TID);
    $report = get_report_by_id($rid);
    $description = nl2br($report['description'],false);
    
    include 'view/confirmReport_v.php';
    
} else {
    include 'view/nestCheckUp_v.php';
}


