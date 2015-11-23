<?php
/* @var $this UserviewController */
/* @var $model Userview */

$this->breadcrumbs=array(
	'Userviews'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Userview', 'url'=>array('index')),
	array('label'=>'Create Userview', 'url'=>array('create')),
	array('label'=>'View Userview', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Userview', 'url'=>array('admin')),
);
?>

<h1>Update Userview <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>