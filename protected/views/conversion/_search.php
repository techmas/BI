<?php
/* @var $this ConversionController */
/* @var $model Conversion */
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
		<?php echo $form->label($model,'total'); ?>
		<?php echo $form->textField($model,'total',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'target_id'); ?>
		<?php echo $form->textField($model,'target_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'platform_id'); ?>
		<?php echo $form->textField($model,'platform_id'); ?>
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