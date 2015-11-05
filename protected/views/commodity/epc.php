<?php
/* @var $this CommodityController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
    'Commodities',
);

$this->menu=array(
    array('label'=>'Create Commodity', 'url'=>array('create')),
    array('label'=>'Manage Commodity', 'url'=>array('admin')),
);

//$dataProvider->setPagination(false);
//$models = $dataProvider->getData();
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
?>


<h1>Учетные данные</h1>

<?php
$this->widget('HzlVisualizationChart', array('visualization' => 'LineChart',
    'data' => $profit,
    'options' => array('title' => 'Прибыль за последний месяц')));

$this->widget('HzlVisualizationChart', array('visualization' => 'LineChart',
    'data' => $revenue,
    'options' => array('title' => 'Выручка за последний месяц')));

?>

