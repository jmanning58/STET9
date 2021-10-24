<?php

require('../model/tasks_db.php');
require('../model/reports_db.php');
$taskType = filter_input(INPUT_POST, 'taskType');
$TID = filter_input(INPUT_POST, 'ID'); //TASK ID
$confirmationStatus = filter_input(INPUT_POST, 'confirmationStatus');
if ($taskType == 'Report') {

    $RID = get_rnid_of_task($TID);
    $report = get_report_by_id($RID);
    $description = nl2br($report['description'], false);

    if ($confirmationStatus == 'Delete') {
        delete_report_by_id($RID);
        delete_task_by_tid($TID);
        header("Location: .");
    } else {
        if (!empty($confirmationStatus)) {
            require('../model/species_db.php');
            $speciesInfo = get_species_data();
            $titleString = 'Update Nest';
        } else {
            $titleString = 'Confirm Report';
        }
        include 'view/confirmReport_v.php';
    }
} else {/////TASK TYPE NEST
    if (empty($confirmationStatus)) {
        include 'view/nestCheckUp_v.php';
    } else {
        require('../model/nests_db.php');
        $NID = get_rnid_of_task($TID);
        if ($confirmationStatus == 1) {///EGGS HAVE HATCHED
            $RID = get_rid_of_nest_by_id($NID);
            //echo'RID: ' . $RID;
            //exit();
            delete_nest_by_id($NID);

            delete_report_by_id($RID);
            header("Location: .");
        } else {
            //////////////////todo delay nesst
        }
        delete_task_by_tid($TID);
    }
}


