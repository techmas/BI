<?php
/* @var $this PlatformController */
/* @var $model Platform */

$this->breadcrumbs=array(
	'Platforms'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Platform', 'url'=>array('index')),
	array('label'=>'Manage Platform', 'url'=>array('admin')),
);
?>

<h1>Create Platform</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>