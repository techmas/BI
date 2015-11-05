<?php
/* @var $this CommodityController */
/* @var $model Commodity */

$this->breadcrumbs=array(
	'Commodities'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Commodity', 'url'=>array('index')),
	array('label'=>'Create Commodity', 'url'=>array('create')),
	array('label'=>'View Commodity', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Commodity', 'url'=>array('admin')),
);
?>

<h1>Update Commodity <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>