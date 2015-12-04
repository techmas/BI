<?php
/* @var $this ConversionController */
/* @var $model Conversion */

$this->breadcrumbs=array(
	'Conversions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Conversion', 'url'=>array('index')),
	array('label'=>'Manage Conversion', 'url'=>array('admin')),
);
?>

<h1>Create Conversion</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>