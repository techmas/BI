<?php
/* @var $this CommodityController */
/* @var $model Commodity */

$this->breadcrumbs=array(
	'Commodities'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Commodity', 'url'=>array('index')),
	array('label'=>'Manage Commodity', 'url'=>array('admin')),
);
?>

<h1>Create Commodity</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>