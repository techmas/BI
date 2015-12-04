<?php
/* @var $this ConversionController */
/* @var $model Conversion */

$this->breadcrumbs=array(
	'Conversions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Conversion', 'url'=>array('index')),
	array('label'=>'Create Conversion', 'url'=>array('create')),
	array('label'=>'View Conversion', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Conversion', 'url'=>array('admin')),
);
?>

<h1>Update Conversion <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>