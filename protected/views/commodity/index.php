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

?>

<?php if(Yii::app()->user->hasFlash('success')): ?>
    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?>


<h1>Учетные данные</h1>

<div class="graphic-add">
    <a href="javascript:void(0);" class="show-add-number">Добавить показатель</a>
    <div>
    <a href="javascript:void(0);" class="close-add-number"></a>
            <input type="text" placeholder="Показатель">
            <input type="text" placeholder="Значение">
            <input type="text" placeholder="Переменная">
            <input type="submit" value="Добавить">
    </div>
</div>


<?php

$list = Commodity::model()->findAll();


$this->widget('ChartForm', array(
    'data' => $profit,
    'list' => $list,
    'model' => $profitForm,
    'type' => 'profit',
    'title' => 'Прибыль')); 

$this->widget('ChartForm', array(
    'data' => $revenue,
    'list' => $list,
    'model' => $revenueForm,
    'type' => 'revenue',
    'title' => 'Выручка')); 

$this->widget('CommodityTable', array(
    'models' => $models,
    'title' => 'Исходные данные')); 
?>



