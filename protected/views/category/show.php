<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs=array(
	'Categories'=>array('index'),
	$model->name,
);

?>

<h1><?php echo $model->info; ?></h1>

<?php if(Yii::app()->user->hasFlash('success')): ?>
    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?>

<?php

/*
 * $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'info',
	),
));
*/

function getChartData($indicator, $userview) {
    $args = explode(".", $indicator->value);
    $table = $args[0];
    $column = $args[1];

    $sales = DataUtil::getSalesByUserview($userview);
    $period = $userview->period ? $userview->period : Period::model()->findByPk(1);
    $result = array(array($period->name, $indicator->name));

    if ($sales) foreach ($sales as $model) {
        $total = 0;
        foreach ($model->$table as $data) $total += $data->$column;
        array_push($result, array($model->date, $total));
    }
    return $result;
}

$user = User::model()->findByPk(1);
foreach ($model->indicators as $indicator) {
    $userview = DataUtil::getIndicatorUserview($indicator, $user);

    $data = getChartData($indicator, $userview);
    $list = Commodity::model()->findAll();

    $this->widget('ChartForm', array(
        'data' => $data,
        'list' => $list,
        'userview' => $userview,
        'type' => $indicator->id,
        'title' => $indicator->name));

}
?>
