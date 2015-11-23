<?php
/* @var $this MeasureController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Measures',
);

$this->menu=array(
	array('label'=>'Create Measure', 'url'=>array('create')),
	array('label'=>'Manage Measure', 'url'=>array('admin')),
);
?>

<h1>Measures</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
