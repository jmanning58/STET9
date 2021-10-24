<html>
    <head>

        <title>Nest Checkup</title>
    </head>
    <main>
        <h1>Nest checkup</h1><br>
        <p>Have the eggs hatched?</p>
        <form action="." method="post">
            <input type="hidden" name="taskType" value ="<?php echo $taskType ?>">
            <input type="hidden" name="ID" value ="<?php echo $TID ?>">
            <input type="radio" name="confirmationStatus" value ="1"> Yes <br>
            <input type="radio" name="confirmationStatus" value ="0"> No <br>
            <input type="hidden" name="action" value="completeTask_v">
            <input type="submit" value="Submit">
        </form>
    </main>
</html>

