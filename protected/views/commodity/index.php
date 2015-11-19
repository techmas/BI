<?php
/* @var $this CommodityController */
/* @var $profit */
/* @var $revenue */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Учетные данные',
);

$this->menu=array(
	array('label'=>'Create Commodity', 'url'=>array('create')),
	array('label'=>'Manage Commodity', 'url'=>array('admin')),
);

$dataProvider->setPagination(false);
$models = $dataProvider->getData();

$list = Commodity::model()->findAll();

?>

<?php if(Yii::app()->user->hasFlash('success')): ?>
    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?>


<h1>Учетные данные</h1>


<?php $this->widget('ChartForm', array(
    'data' => $profit,
    'list' => $list,
    'model' => $profitForm,
    'type' => 'profit',
    'title' => 'Прибыль')); ?>

<?php $this->widget('ChartForm', array(
    'data' => $revenue,
    'list' => $list,
    'model' => $revenueForm,
    'type' => 'revenue',
    'title' => 'Выручка')); ?>

<?php $this->widget('CommodityTable', array(
    'models' => $models,
    'title' => 'Исходные данные')); ?>



