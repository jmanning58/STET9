<html>
    <head>

        <title><?php echo $titleString ?></title>
    </head>
    <main>
        <h1></h1>
        <h1><?php echo $titleString ?></h1>
        <label>Report ID: </label><value><?php echo$report['RID']; ?></value><br>
        <label>Address: </label><value><?php echo($report['streetAddress'] . ', ' . $report['cityName']); ?></value><br>
        <label>Date reported: </label><value><?php echo$report['dateTime']; ?></value><br>
        <label>Description: </label><br><value><?php echo$description; ?></value><br>
        <div class="error">
            <?php
            if (!empty($error_msg)) {
                include 'error.php';
            };
            ?><br>
        </div>
        <?php if (empty($confirmationStatus)): ?>
            <form action="." method="post">
                <input type="radio" name="confirmationStatus" value ="Confirm"> Confirm <br>
                <input type="radio" name="confirmationStatus" value ="Delete"> Delete <br>
                <input type="hidden" name="taskType" value="<?php echo $taskType ?>">
                <input type="hidden" name="ID" value="<?php echo $TID ?>">
                <input type="hidden" name="action" value="completeTask_v">
                <input type="submit" value="Submit">
            </form>
        <?php else : ?>
            <form action="." method="post">
                <label>Species:</label><value>
                    <select name ="speciesType">
                        <?php foreach ($speciesInfo as $species) : ?>
                            <option value ="<?php echo $species['SID'] ?>"> <?php echo $species['name'] ?></option>
                        <?php endforeach; ?>
                    </select></value><br>
                <label>Number of eggs:</label><value><input type="numeric" name="eggNum"></value><be>

                    <input type="hidden" name="taskType" value="<?php echo $taskType ?>">
                    <input type="hidden" name="ID" value="<?php echo $TID ?>">
                    <input type="hidden" name="action" value="createNest">
                    <input type="submit" value="Update">
                    </form>
                <?php endif; ?>
                </main>
                </html>