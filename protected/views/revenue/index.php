<?php
/* @var $this RevenueController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Выручка по дням',
);

$this->menu=array(
	array('label'=>'Create Revenue', 'url'=>array('create')),
	array('label'=>'Manage Revenue', 'url'=>array('admin')),
);
?>

<h1>Выручка по дням</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
