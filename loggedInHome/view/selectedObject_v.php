<h1><?php echo $selectMessage ?></h1>
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
            <td><?php include 'view/selectedObjectButton_v.php';?></td>
        <?php endif; ?>
    </tr>
</table>

