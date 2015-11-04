<?php
/* @var $this VisitsController */
/* @var $model Visits */

$this->breadcrumbs=array(
	'Visits'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Visits', 'url'=>array('index')),
	array('label'=>'Manage Visits', 'url'=>array('admin')),
);
?>

<h1>Create Visits</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>