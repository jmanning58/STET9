<h1>Selected <?php echo $objectType ?></h1>
<table>

    <tr>
        <?php for ($i = 0; $i < count($columnNames); $i++): ?>
            <th><?php echo $columnNames[$i] ?> </th>
        <?php endfor; ?>

        <th>&nbsp;</th>
    </tr>
    <tr>
        <?php for ($i = 0; $i < count($columnNames); $i++): ?>

            <td><?php echo $selectedObject[$i]; ?></td>

        <?php endfor; ?>
        <?php if (!isset($showAssign)) : ?>
            <td><form action="index.php" method ="post">


                    <?php if ($objectType == 'Worker'): ?>
                        <input type="hidden" name="action" value="assign">
                        <input type="hidden" name="WID" value="<?php echo $selectedObject[0]; ?>">
                        <input type="hidden" name="taskType" value="<?php echo $taskType; ?>">
                        <input type="hidden" name="ID" value="<?php echo $ID; ?>">
                        <input type="submit" value="Assign">
                    <?php endif; ?>

                    <?php if ($objectType == 'Task'): ?>
                        <?php if ($_SESSION["UTYPE"] == 0): ?>
                            <input type="hidden" name="action" value="completeTask_v">
                            <input type="hidden" name="ID" value="<?php echo $selectedObject[0]; ?>">
                            <input type="hidden" name="taskType" value="<?php echo $selectedObject[1]; ?>">
                            <input type="submit" value="Complete">
                        <?php endif; ?>
                        <?php if ($_SESSION["UTYPE"] == 1): ?>
                            <input type="hidden" name="action" value="reasign_v">
                            <input type="hidden" name="ID" value="<?php echo $selectedObject[0]; ?>">
                            <input type="hidden" name="taskType" value="<?php echo $objectType; ?>">
                            <input type="submit" value="Reasign">
                        <?php endif; ?>

                    <?php elseif ($objectType !== 'Worker') : ?>
                        <input type="hidden" name="action" value="assign_v">
                        <input type="hidden" name="ID" value="<?php echo $selectedObject[0]; ?>">
                        <input type="hidden" name="taskType" value="<?php echo $objectType; ?>">
                        <input type="submit" value="Assign">
                    <?php endif; ?>


                </form></td>
        <?php endif; ?>
    </tr>
</table>

