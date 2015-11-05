<?php
/* @var $this ExpencesController */
/* @var $model Expences */

$this->breadcrumbs=array(
	'Expences'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Expences', 'url'=>array('index')),
	array('label'=>'Manage Expences', 'url'=>array('admin')),
);
?>

<h1>Create Expences</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>