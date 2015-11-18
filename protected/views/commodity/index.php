<?php
/* @var $this CommodityController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Учетные данные',
);

$this->menu=array(
	array('label'=>'Create Commodity', 'url'=>array('create')),
	array('label'=>'Manage Commodity', 'url'=>array('admin')),
);

$sales = Sales::model()->findAll();

$profit = array(array('Дата', 'Прибыль'));
$revenue = array(array('Дата', 'Выручка'));
foreach ($sales as $model) {
    $total_profit = 0;
    $total_revenue = 0;
    foreach ($model->commodities as $commodity) {
        $total_profit += $commodity->profit;
        $total_revenue += $commodity->revenue;
    }
    array_push($profit, array($model->date, $total_profit));
    array_push($revenue, array($model->date, $total_revenue));
}
$dataProvider->setPagination(false);
$models = $dataProvider->getData();

?>

<h1>Учетные данные</h1>
<div class="inbord">
    <a href="#" class="close"></a>
    <?php
    $this->widget('HzlVisualizationChart', array('visualization' => 'LineChart',
        'data' => $profit,
        'options' => array('title' => 'Прибыль за последний месяц')));
    ?>
</div>
<div class="inbord">
    <a href="#" class="close"></a>
    <?php
    $this->widget('HzlVisualizationChart', array('visualization' => 'LineChart',
        'data' => $revenue,
        'options' => array('title' => 'Выручка за последний месяц')));
    ?>
</div>

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
