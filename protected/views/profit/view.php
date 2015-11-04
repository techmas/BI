<?php
/* @var $this ProfitController */
/* @var $model Profit */

$this->breadcrumbs=array(
	'Profits'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Profit', 'url'=>array('index')),
	array('label'=>'Create Profit', 'url'=>array('create')),
	array('label'=>'Update Profit', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Profit', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Profit', 'url'=>array('admin')),
);
?>

<h1>View Profit #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'date',
		'total',
		'group_id',
	),
)); ?>
