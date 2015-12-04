<?php
/* @var $this ExpencesController */
/* @var $model Expences */

$this->breadcrumbs=array(
	'Expences'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Expences', 'url'=>array('index')),
	array('label'=>'Create Expences', 'url'=>array('create')),
	array('label'=>'Update Expences', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Expences', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Expences', 'url'=>array('admin')),
);
?>

<h1>View Expences #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'total',
		'sales_id',
		'platform_id',
	),
)); ?>
