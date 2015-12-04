<?php
/* @var $this PlatformController */
/* @var $model Platform */

$this->breadcrumbs=array(
	'Platforms'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Platform', 'url'=>array('index')),
	array('label'=>'Create Platform', 'url'=>array('create')),
	array('label'=>'View Platform', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Platform', 'url'=>array('admin')),
);
?>

<h1>Update Platform <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>