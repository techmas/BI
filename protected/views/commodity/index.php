<?php
/* @var $this CommodityController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Commodities',
);

$this->menu=array(
	array('label'=>'Create Commodity', 'url'=>array('create')),
	array('label'=>'Manage Commodity', 'url'=>array('admin')),
);
?>

<h1>Commodities</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
