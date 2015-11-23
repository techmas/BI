<?php
/* @var $this UserviewController */
/* @var $model Userview */

$this->breadcrumbs=array(
	'Userviews'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Userview', 'url'=>array('index')),
	array('label'=>'Create Userview', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#userview-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Userviews</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'userview-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'startdate',
		'enddate',
		'chart',
		'table',
		'selection',
		/*
		'period_id',
		'user_id',
		'indicator_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
