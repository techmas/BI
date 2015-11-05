<?php
/* @var $this ExpencesController */
/* @var $model Expences */

$this->breadcrumbs=array(
	'Expences'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Expences', 'url'=>array('index')),
	array('label'=>'Create Expences', 'url'=>array('create')),
	array('label'=>'View Expences', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Expences', 'url'=>array('admin')),
);
?>

<h1>Update Expences <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>