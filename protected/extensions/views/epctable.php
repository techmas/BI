<table class="table-data">
    <tr class="table-head">
        <td>Дата </td>
        <td>Выручка</td>
        <td>Посещения </td>
        <td>EPC</td>
    </tr>
    <?php foreach ($models as $model): ?>
        <tr class="table-data">
            <td><?php echo $model[0]; ?></td>
            <td><?php echo $model[1]; ?></td>
            <td><?php echo $model[2]; ?></td>
            <td><?php echo $model[3]; ?></td>
        </tr>
    <?php endforeach;?>
</table>