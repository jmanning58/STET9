<form action="index.php" method ="post">
    <input type="hidden" name="action" value="<?php echo $selectAction; ?>">
    <?php if (isset($ReassignTaskTID)): ?>
        <input type="hidden" name="ReassignTaskTID" value="<?php echo $ReassignTaskTID; ?>">
    <?php endif; ?>
    <?php if ($objectType == 'Worker'): ?>
        <input type="hidden" name="taskType" value="<?php echo $taskType; ?>">
        <input type="hidden" name="WID" value="<?php echo $object[0]; ?>">
        <input type="hidden" name="ID" value="<?php echo $ID; ?>">
    <?php endif; ?>
    <?php if ($objectType !== 'Worker'): ?>

        <input type="hidden" name="ID" value="<?php echo $object[0]; ?>">

    <?php endif; ?>
    <input type="submit" value="Select">
</form>

