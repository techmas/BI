
<table class="table-data">
    <tr class="table-head">
        <td>Дата</td>
        <td>Номенклатура</td>
        <td>Прибыль</td>
        <td>Выручка</td>
    </tr>
    <?php foreach ($models as $model): ?>
    <tr class="table-data">
        <td><?php echo Sales::model()->findByPk($model->sales_id)->date; ?></td>
        <td><?php echo $model->name; ?></td>
        <td><?php echo $model->profit; ?></td>
        <td><?php echo $model->revenue; ?></td>
    </tr>
<?php endforeach;?>
</table>
