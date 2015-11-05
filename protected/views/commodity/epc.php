<?php

$this->breadcrumbs=array(
    'Доходность',
);

$this->menu=array(
    array('label'=>'Create Commodity', 'url'=>array('create')),
    array('label'=>'Manage Commodity', 'url'=>array('admin')),
);

//$dataProvider->setPagination(false);
//$models = $dataProvider->getData();
$sales = Sales::model()->findAll();

$epc = array(array('Дата', 'EPC'));
$out = array(array('Дата', 'Выручка', 'Посещения', 'EPC'));
foreach ($sales as $model) {
    $total_revenue = 0;
    $total_visits = 0;
    foreach ($model->commodities as $commodity) {
        $total_revenue += $commodity->revenue;
    }
    foreach ($model->visits as $visits) {
        $total_visits += $visits->total;
    }
    $total_epc = ($total_visits != 0) ? $total_revenue / $total_visits : 0;
    array_push($out, array($model->date, $total_revenue, $total_visits, $total_epc));
    array_push($epc, array($model->date, $total_epc));
}
?>


<h1>Доходность</h1>

<?php
$this->widget('HzlVisualizationChart', array('visualization' => 'LineChart',
    'data' => $epc,
    'options' => array('title' => 'Доходность одного клика (EPC)')));

?>

<table>
    <?php foreach ($out as $model): ?>
        <tr>
            <td><?php echo $model[0]; ?></td>
            <td><?php echo $model[1]; ?></td>
            <td><?php echo $model[2]; ?></td>
            <td><?php echo $model[3]; ?></td>
        </tr>
    <?php endforeach;?>
</table>


