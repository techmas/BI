<?php
/* @var $this ConversionController */
/* @var $model Conversion */

$this->breadcrumbs=array(
	'Conversions'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Conversion', 'url'=>array('index')),
	array('label'=>'Create Conversion', 'url'=>array('create')),
	array('label'=>'Update Conversion', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Conversion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Conversion', 'url'=>array('admin')),
);
?>

<h1>View Conversion #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'total',
		'target_id',
		'platform_id',
		'sales_id',
	),
)); ?>
