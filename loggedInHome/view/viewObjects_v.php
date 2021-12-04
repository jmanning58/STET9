

<html>
    <head>
        <title>View <?php echo $objectType?>s</title>
    </head>
    <body>
        <main>

            <! --- DISPLAY SELECTED OBJECT --->
            <?php
            if (isset($selectedObject)) {

                include 'selectedObject_v.php';
            }
            ?>
            <! --- LIST OBJECTS --->
            <h1><?php echo $listMessage ?></h1>
            <?php if(isset($emptyList)){exit();}?>
            <?php if ($objectType == 'Report'):?>
            <form action="index.php?action=<?php echo $selectAction;?>" method ="post">
            <select name ="sortBy">
                <?php foreach ($sortByOptions as $option) :?>
                      <option value ="<?php echo $option;?>" selected><?php echo $option;?></option>
                <?php endforeach;?>
            </select>
            <input type="submit" value="Sort">
            </form>
            <?php endif;?>
            <table>
                <tr>
                    <?php for ($i = 0; $i < count($columnNames); $i++): ?>
                        <th><?php echo $columnNames[$i] ?> </th>
                    <?php endfor; ?>
                    <th>&nbsp;</th>

                </tr>
                <?php foreach ($objects as $object) : ?>
                    <tr>
                        <?php for ($i = 0; $i < count($columnNames); $i++): ?>
                            <td><?php echo $object[$i]; ?></td>
                        <?php endfor; ?>

                         <td><?php include 'view/viewObjectsButton_v.php';?></td>

                    </tr>
                <?php endforeach; ?>
            </table>
        </main>
    </body>
</html>