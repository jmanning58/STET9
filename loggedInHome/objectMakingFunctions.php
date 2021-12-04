<?php

const REPORT_COLUMNS = array('RID', 'City Name', 'Street Address', 'Report Date');

function makeReportObject($report) {
    return array($report['RID'], $report['cityName'], $report['streetAddress'], $report['dateTime']);
}

const NEST_COLUMNS = array('NID', 'City Name', 'Street Address', 'Report Date');

function makeNestObject($nest) {
    return array($nest['NID'], $nest['cityName'], $nest['streetAddress'], $nest['dateTime']);
}

const WORKER_COLUMNS = array('UID', 'Username');

function makeWorkerObject($worker) {

    return array($worker['UID'], $worker['username']);
}

const USER_COLUMNS = array('UID', 'Username', 'Type');
function makeUserObject($user) {
    if($user['userType'] == 0){
        $type = 'Worker';
    } else {
        $type = 'Admin';
    }
    if($user['userName'] == NULL){
        $name = explode('@', $user['email'])[0];
    } else{
        $name = $user['userName'];
    }
    return array($user['UID'],$name , $type);
}




const TASK_COLUMNS_FOR_WORKER = array('TaskID', 'Type', 'City', 'Street Addr.', 'Assigned on');

function makeTaskObjectWorker($task) {

    if ($task['type'] == 1) {
        $type = 'Nest';
        $taskData = get_nest_by_id($task['RNID']);
    } else {
        $type = 'Report';
        $taskData = get_report_by_id($task['RNID']);
    }
    ///////////////////////////DO NOT CHANGE TYPE FROM INDEX 1
    return array($task['TID'], $type, $taskData['cityName'], $taskData['streetAddress'], $task['dateTime']);
}

const TASK_COLUMNS = array('TaskID', 'Type', 'City', 'Asigned User');

function makeTaskObject($task) {

    if ($task['type'] == 1) {
        $type = 'Nest';
        $taskData = get_nest_by_id($task['RNID']);
    } else {
        $type = 'Report';
        $taskData = get_report_by_id($task['RNID']);
    }
    $userData = get_userInfo_by_uid($task['UID']);
    $username = $userData['userName'];
    ///////////////////////////DO NOT CHANGE TYPE FROM INDEX 1
    return array($task['TID'], $type, $taskData['cityName'], $username);
}

function makeObjects($objectType, $fromArray, $ID) {
    $objects = array();
    foreach ($fromArray as $entry) {
        switch ($objectType) {
            case 'User':$object = makeUserObject($entry);break;
            case 'Worker':$object = makeWorkerObject($entry);break;
            case 'Report':$object = makeReportObject($entry);break;
            case 'Task': $object = taskHandler($entry);break;
            case 'Nest': $object = makeNestObject($entry);break;
            default:break;
        }
        if (isset($ID) && $object[0] == $ID) {
            $selected = $object;
            continue;
        }$objects[] = $object;
    }if (isset($selected)) {
        $objects[] = $selected;
    }return $objects;
}

function taskHandler($task) {

    if ($_SESSION["UTYPE"] == 0) {
        return makeTaskObjectWorker($task);
    } else {
        return makeTaskObject($task);
    }
}
