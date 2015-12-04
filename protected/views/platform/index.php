<?php
/* @var $this PlatformController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Platforms',
);

$this->menu=array(
	array('label'=>'Create Platform', 'url'=>array('create')),
	array('label'=>'Manage Platform', 'url'=>array('admin')),
);
?>

<h1>Platforms</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
