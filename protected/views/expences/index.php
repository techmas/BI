<?php
/* @var $this ExpencesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Expences',
);

$this->menu=array(
	array('label'=>'Create Expences', 'url'=>array('create')),
	array('label'=>'Manage Expences', 'url'=>array('admin')),
);
?>

<h1>Expences</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
