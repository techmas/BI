<?php
/* @var $this UserviewController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Userviews',
);

$this->menu=array(
	array('label'=>'Create Userview', 'url'=>array('create')),
	array('label'=>'Manage Userview', 'url'=>array('admin')),
);
?>

<h1>Userviews</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
