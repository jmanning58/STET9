<?php

require('../model/tasks_db.php');
require('../model/nests_db.php');
require('../model/reports_db.php');
$TID = filter_input(INPUT_POST, 'ID');
$SID = filter_input(INPUT_POST, 'speciesType');
$eggNum = filter_input(INPUT_POST, 'eggNum');

$RID = get_rnid_of_task($TID);
$report = get_report_by_id($RID);

add_nest($RID, $SID, $eggNum);
delete_task_by_tid($TID);
header('Location: .');
