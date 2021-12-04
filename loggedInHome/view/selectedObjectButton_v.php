<form action="index.php" method ="post">
                    <?php if (isset($ReassignTaskTID)): ?>
                    <input type="hidden" name="ReassignTaskTID" value="<?php echo $ReassignTaskTID; ?>">
                    <?php endif; ?>


                    <?php if ($objectType == 'Worker'): ?>
                        <input type="hidden" name="action" value="assign">
                        <input type="hidden" name="WID" value="<?php echo $selectedObject[0]; ?>">
                        <input type="hidden" name="taskType" value="<?php echo $taskType; ?>">
                        <input type="hidden" name="ID" value="<?php echo $ID; ?>">
                        <input type="submit" value="Assign">
                    <?php elseif ($objectType == 'User'): ?>
                        <select name ="manageAction">
                            <option value ="changeType" selected>change type</option>
                            <option value ="deleteUser" >delete user</option>
                        </select>
                            <input type="hidden" name="action" value="alterUser">
                            <input type="hidden" name="ID" value="<?php echo $selectedObject[0]; ?>">
                            <input type="hidden" name="taskType" value="<?php echo $selectedObject[1]; ?>">
                            <input type="submit" value="Update">
                    <?php elseif ($objectType == 'Task'): ?>
                        <?php if ($_SESSION["UTYPE"] == 0): ?>
                            <input type="hidden" name="action" value="completeTask_v">
                            <input type="hidden" name="ID" value="<?php echo $selectedObject[0]; ?>">
                            <input type="hidden" name="taskType" value="<?php echo $selectedObject[1]; ?>">
                            <input type="submit" value="Complete">
                        <?php endif; ?>
                        <?php if ($_SESSION["UTYPE"] == 1): ?>
                            <input type="hidden" name="action" value="reasign_v">
                            <input type="hidden" name="ID" value="<?php echo $selectedObject[0]; ?>">
                            <input type="hidden" name="taskType" value="<?php echo $selectedObject[1]; ?>">
                            <input type="submit" value="Reasign">
                        <?php endif; ?>

                    <?php elseif ($objectType !== 'Worker') : ?>
                        <input type="hidden" name="action" value="assign_v">
                        <input type="hidden" name="ID" value="<?php echo $selectedObject[0]; ?>">
                        <input type="hidden" name="taskType" value="<?php echo $objectType; ?>">
                        <input type="submit" value="Assign">
                    <?php endif; ?>


</form>

