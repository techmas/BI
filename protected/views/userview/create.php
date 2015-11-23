<?php
/* @var $this UserviewController */
/* @var $model Userview */

$this->breadcrumbs=array(
	'Userviews'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Userview', 'url'=>array('index')),
	array('label'=>'Manage Userview', 'url'=>array('admin')),
);
?>

<h1>Create Userview</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>