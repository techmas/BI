<?php
/* @var $this CommodityController */
/* @var $model Commodity */
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
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'profit'); ?>
		<?php echo $form->textField($model,'profit'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'revenue'); ?>
		<?php echo $form->textField($model,'revenue'); ?>
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