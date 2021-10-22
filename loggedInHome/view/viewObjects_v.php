<?php>

<html>
    <head>
        <title>View <?php echo $objectType ?>s</title>
    </head>
    <body>
        <main>
           
        <! --- DISPLAY SELECTED OBJECT --->
        <?php if (isset($selectedObject)){
            
            include 'selectedObject_v.php'; 
        }
        ?>
         <! --- LIST OBJECTS --->
        <h1><?php echo $objectType ?> List</h1>
    
        <table>
            <tr>
            <?php for($i =0; $i < count($columnNames);$i++):?>
                
                <th><?php echo $columnNames[$i] ?> </th>
                
            <?php endfor; ?>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($objects as $object) : ?>
            <tr>
               
                <?php for($i =0; $i < count($columnNames);$i++):?>
                           
                    <td><?php echo $object[$i]; ?></td>
                    
                <?php endfor; ?>
                <td><form action="index.php" method ="post">
                <input type="hidden" name="action" value="<?php echo $selectAction;?>">
                
                <?php if ($objectType == 'Worker'):?>
                    <input type="hidden" name="taskType" value="<?php echo $taskType;?>">
                    <input type="hidden" name="WID" value="<?php echo $object[0];?>">
                    <input type="hidden" name="ID" value="<?php echo $ID;?>">
                <?php endif; ?>
                <?php if ($objectType !== 'Worker'):?>
                    
                    <input type="hidden" name="ID" value="<?php echo $object[0];?>">
                   
                <?php endif; ?>
                <input type="submit" value="Select">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
    
    
    </main>
    </body>
</html>