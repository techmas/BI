<?php
/* @var $this VisitsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Веб-аналитика',
);


$this->menu=array(
	array('label'=>'Create Visits', 'url'=>array('create')),
	array('label'=>'Manage Visits', 'url'=>array('admin')),
);

$dataProvider->setPagination(false);
$models = $dataProvider->getData();

$visits = array(array('Дата', 'Визиты'));
$dates = array();
foreach ($models as $model) {
    array_push($visits, array(Sales::model()->findByPk($model->sales_id)->date, intval($model->total)));
}
?>


<h1>Веб-Аналитика</h1>

<?php $this->widget('ChartForm', array(
    'data' => $visits,
    'title' => 'Посещения за последний месяц')); ?>

