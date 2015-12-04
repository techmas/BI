<?php
/* @var $this ConversionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Conversions',
);

$this->menu=array(
	array('label'=>'Create Conversion', 'url'=>array('create')),
	array('label'=>'Manage Conversion', 'url'=>array('admin')),
);
?>

<h1>Conversions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
