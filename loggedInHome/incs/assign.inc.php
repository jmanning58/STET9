<?php
require '../model/tasks_db.php';
$taskType = filter_input(INPUT_POST, 'taskType');
$ID = filter_input(INPUT_POST, 'ID');
$WID = filter_input(INPUT_POST, 'WID');

$type = 1;//1 for nest 0 for report
if ($taskType == 'Report') {
    $type = 0;
}
add_task($ID, $WID, $type);
