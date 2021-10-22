<?php

const REPORT_COLUMNS = array('NID', 'City Name', 'Street Address', 'Report Date');

function makeReportObject($report){
    return array($report['NID'], $report['cityName'], $report['streetAddress'], $report['dateTime']);
    
}

const WORKER_COLUMNS = array('UID', 'Username');
function makeWorkerObject($worker){
    return array($worker['UID'], $worker['username']);
    
}
const TASK_COLUMNS_FOR_WORKER = array('TaskID', 'Type', 'City', 'Street Addr.', 'Assigned on');
function makeTaskObjectWorker($task){
    
    if($task['type'] == 1){
       $type = 'Nest';
    } else{
      $type = 'Report';
      $taskData = get_report_by_id($task['RNID']);
    }
    ///////////////////////////DO NOT CHANGE TYPE FROM INDEX 1
    return array($task['TID'], $type, $taskData['cityName'], $taskData['streetAddress'], $task['dateTime']);   
}
const TASK_COLUMNS = array('TaskID', 'Type', 'City', 'Asigned User');
function makeTaskObject($task){
    
    if($task['type'] == 1){
       $type = 'Nest';
    } else{
      $type = 'Report';
      $taskData = get_report_by_id($task['RNID']);
      $userData = get_userInfo_by_uid($task['UID']);
      if(empty($userData)){die("got no user info for UID " . $task['UID']);}
      $username = $userData['userName'];
    }
    ///////////////////////////DO NOT CHANGE TYPE FROM INDEX 1
    return array($task['TID'], $type, $taskData['cityName'], $username);   
}



function makeObjects ($objectType, $fromArray, $ID){
    $objects = array();
    foreach ($fromArray as $entry) {
        switch ($objectType) {
            case 'Worker':$object = makeWorkerObject($entry);break;
            case 'Report':$object = makeReportObject($entry);break;
            case 'Task': $object = taskHandler($entry);break;
            
            default:break;    
        }
        if (isset($ID) && $object[0] == $ID) {
            $selected = $object;
            continue;
        }$objects[] = $object;
    }if (isset($selected)) {
        $objects[] = $selected;
    }return $objects;}
    
function taskHandler($task){
    
    if($_SESSION["UTYPE"] == 0){
        return makeTaskObjectWorker($task);
    } else {
        return makeTaskObject($task);
    }
}