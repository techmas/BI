<?php
/* @var $this CommodityController */
/* @var $model Commodity */

$this->breadcrumbs=array(
	'Commodities'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Commodity', 'url'=>array('index')),
	array('label'=>'Create Commodity', 'url'=>array('create')),
	array('label'=>'Update Commodity', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Commodity', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Commodity', 'url'=>array('admin')),
);
?>

<h1>View Commodity #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'profit',
		'revenue',
		'quantity',
		'sales_id',
		'platform_id',
	),
)); ?>
