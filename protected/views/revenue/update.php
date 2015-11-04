<?php
/* @var $this RevenueController */
/* @var $model Revenue */

$this->breadcrumbs=array(
	'Revenues'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Revenue', 'url'=>array('index')),
	array('label'=>'Create Revenue', 'url'=>array('create')),
	array('label'=>'View Revenue', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Revenue', 'url'=>array('admin')),
);
?>

<h1>Update Revenue <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>