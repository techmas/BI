<?php
/* @var $this MeasureController */
/* @var $model Measure */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'epc'); ?>
		<?php echo $form->textField($model,'epc'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ltv'); ?>
		<?php echo $form->textField($model,'ltv'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'arpu'); ?>
		<?php echo $form->textField($model,'arpu'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'crs'); ?>
		<?php echo $form->textField($model,'crs'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sales_id'); ?>
		<?php echo $form->textField($model,'sales_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->