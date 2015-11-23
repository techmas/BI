<?php
/* @var $this UserviewController */
/* @var $model Userview */

$this->breadcrumbs=array(
	'Userviews'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Userview', 'url'=>array('index')),
	array('label'=>'Create Userview', 'url'=>array('create')),
	array('label'=>'Update Userview', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Userview', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Userview', 'url'=>array('admin')),
);
?>

<h1>View Userview #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'startdate',
		'enddate',
		'chart',
		'table',
		'selection',
		'period_id',
		'user_id',
		'indicator_id',
	),
)); ?>
