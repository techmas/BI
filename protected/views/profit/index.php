<?php
/* @var $this ProfitController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Прибыль по дням',
);

$this->menu=array(
	array('label'=>'Create Profit', 'url'=>array('create')),
	array('label'=>'Manage Profit', 'url'=>array('admin')),
);
?>

<h1>Прибыль по дням</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
