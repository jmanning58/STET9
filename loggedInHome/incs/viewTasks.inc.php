<?php

require('../model/tasks_db.php');
require('../model/reports_db.php');
require('../model/nests_db.php');
require('../model/users_db.php');
$objectType = 'Task';
$selectAction = 'viewTasks';
$ID = filter_input(INPUT_POST, 'ID'); //of selected task

if ($_SESSION["UTYPE"] == 0) {
    $columnNames = TASK_COLUMNS_FOR_WORKER;
    $tasks = get_tasks_for_worker($_SESSION["UID"]);
} else {
    $columnNames = TASK_COLUMNS;
    $tasks = get_tasks();
}

$objects = makeObjects($objectType, $tasks, $ID);
if (isset($ID)) {
    $selectedObject = array_pop($objects);
}